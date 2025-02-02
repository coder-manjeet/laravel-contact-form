@component('mail::message')
# Thank You for Contacting Us

Dear {{ $contact->name }},

We have successfully received your contact enquiry with the following details:

@component('mail::panel')
**Subject:** {{ $contact->subject }}

**Your Message:**  
{{ $contact->message }}
@endcomponent

We have received your message and will get back to you as soon as possible. Our team typically responds within 24-48 business hours.

If you need to add any information to your enquiry, please submit a new contact form with reference to this submission.

@if(config('contact-form.support_url'))
@component('mail::button', ['url' => config('contact-form.support_url')])
Visit Support Center
@endcomponent
@endif

Best regards,<br>
{{ config('app.name') }}

@endcomponent