@component('mail::message')
# New Contact Enquiry

A new contact enquiry has been submitted. Details are as follows:

@component('mail::panel')
**Name:** {{ $contact->name }}  
**Email:** {{ $contact->email }}  
**Subject:** {{ $contact->subject }}  

**Message:**  
{{ $contact->message }}

**Submitted at:** {{ $contact->created_at->format('Y-m-d H:i:s') }}
@endcomponent

Please respond to this enquiry within your standard response time.

Thanks,<br>
{{ config('app.name') }}

@endcomponent