<?php

return [
    'emails' => [
        'admin_email' => env('CONTACT_FORM_ADMIN_EMAIL', 'test@example.com'),
        'disable_admin_mail' => env('CONTACT_FORM_DISABLE_ADMIN_EMAIL', false),
        'disable_user_mail' => env('CONTACT_FORM_DISABLE_USER_EMAIL', false),
        'disable_mail_queue' => env('CONTACT_FORM_EMAIL_QUEUEUE', false)
    ],
    'validation_rules' => [
        'name' =>'required|string|max:255',
        'email' =>'required|email|max:255',
        'subject' =>'required|string|max:255',
        'message' =>'required|string|max:1000',
    ]
];