<?php

namespace CoderManjeet\LaravelContactForm\Http\Controllers;

use App\Http\Controllers\Controller;
use CoderManjeet\LaravelContactForm\Mail\ContactEnquiryRecieved;
use CoderManjeet\LaravelContactForm\Mail\ContactEnquirySubmitted;
use CoderManjeet\LaravelContactForm\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    /**
     * Displays all contact form entries.
     *
     * @return \Illuminate\View\View  Returns a view with all contact form entries.
     */
    public function index()
    {
        $entries = Contact::all();
        return view('laravel-contact-form::entries', compact('entries'));
    }

    /**
     * Display the contact form.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        return view('laravel-contact-form::contact');
    }


    /**
     * Stores the contact form data, validates the request, sends email notifications
     * and redirects back with a success message.
     *
     * @param  \Illuminate\Http\Request  $request  The request object containing the contact form data.
     * @return \Illuminate\Http\RedirectResponse  Redirects back with a success message.
     */
    public function store(Request $request) {

        // Validate request data
        $request->validate(config('contact-form.validation_rules'));

        // Save contact form data to database
        $contact            = new Contact();
        $contact->name      = $request->name;
        $contact->email     = $request->email;
        $contact->subject   = $request->subject;
        $contact->message   = $request->message;
        $contact->save();

        // Send email notification to admin
        if(!config('contact-form.emails.disable_admin_mail')){
            if(config('contact-form.emails.disable_mail_queue')) {
                Mail::send(new ContactEnquirySubmitted($contact));
            }
            else {
                Mail::queue(new ContactEnquirySubmitted($contact));
            }
        }

        // Send email notification to user
        if(!config('contact-form.emails.disable_user_mail')) {
            if(config('contact-form.emails.disable_mail_queue')) {
                
                Mail::send(new ContactEnquiryRecieved($contact));
            }
            else {
                Mail::queue(new ContactEnquiryRecieved($contact));
            }
        }

        // Redirect back with success message
        return redirect()->back()->with('success', 'Your message has been sent successfully.');
    }

    /**
     * Display the specified contact form entry.
     *
     * @param  int  $id  The ID of the contact form entry to be displayed.
     * @return \Illuminate\View\View  Returns a view with the contact form entry details.
     */
    public function destroy($id)
    {
        $entry = Contact::findOrFail($id);
        $entry->delete();
        return redirect()->route('contact.index')->with('success', 'Entry deleted successfully.');
    }
}
