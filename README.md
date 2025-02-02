# Laravel Contact Form

A simple and customizable Laravel package to handle contact forms. This package allows you to easily manage contact form submissions, send emails, and store inquiries in the database.

## Table of Contents
- [Installation](#installation)
- [Configuration](#configuration)
- [Customization](#customization)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)


## Installation
You can install the package via Composer. Run the following command in your terminal:
```bash
composer require coder-manjeet/laravel-contact-form
```


After installing the package, you need to publish the configuration file and run the migration to create the necessary database table.

## Publish Configuration
To publish the configuration file, run the following Artisan command:
```bash
php artisan vendor:publish --provider="CoderManjeet\\LaravelContactForm\\ContactFormServiceProvider" --tag="contact-form-config"
```
This will create a `contact-form.php` file in your `config` directory, where you can customize the package settings.
## Run Migrations

Next, run the migration to create the `contacts` table in your database:

```bash
php artisan migrate
```
This will create the table where contact form submissions will be stored.

### Add Service Provider (Optional for Laravel 5.5+)

If you are using Laravel 5.5 or above, the package will automatically register the service provider. For older versions, you need to manually add the service provider in your `config/app.php` file
```php
'providers' => [
    // Other service providers...
    CoderManjeet\LaravelContactForm\ContactFormServiceProvider::class,
],
```
### Add Routes
Finally, ensure that the package routes are loaded by adding the following line to your `routes/web.php` file:
```php
CoderManjeet\LaravelContactForm\ContactFormServiceProvider::routes();
```
This will register the necessary routes for the contact form.

## Configuration
After publishing the configuration file, you can customize the package settings by editing the `config/contact-form.php` file. This file contains various options such as email settings, form fields, and validation rules.

### Example Configuration
Here is an example of how you might configure the `config/contact-form.php` file:

```php
return [
    'emails' => [
        'admin_email' => env('CONTACT_FORM_ADMIN_EMAIL', 'test@example.com'),
        'disable_admin_mail' => env('CONTACT_FORM_DISABLE_ADMIN_EMAIL', false),
        'disable_user_mail' => env('CONTACT_FORM_DISABLE_USER_EMAIL', false),
        'disable_mail_queue' => env('CONTACT_FORM_EMAIL_QUEUEUE', false)
    ],
    'validation_rules' => [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|string|max:255',
        'message' => 'required|string|max:1000',
    ]
];
```

## Customization
### Views
The package includes default Blade views for the contact form and email templates. You can customize these views by publishing them to your application's `resources/views/vendor/contact-form` directory:

```bash
php artisan vendor:publish --provider="CoderManjeet\\LaravelContactForm\\ContactFormServiceProvider" --tag="contact-form-views"
```
### Mailables
The package includes mailables for sending emails when a contact form is submitted. You can customize these mailables by publishing them to your application's `app/Mail` directory:

```bash
php artisan vendor:publish --provider="CoderManjeet\\LaravelContactForm\\ContactFormServiceProvider" --tag="contact-form-mailables"
```
### Controller
If you need to customize the logic for handling form submissions, you can publish the ContactFormController to your application's `app/Http/Controllers` directory:

```bash
php artisan vendor:publish --provider="CoderManjeet\\LaravelContactForm\\ContactFormServiceProvider" --tag="contact-form-controller"
```
### Migrations
The package includes a migration to create the contacts table. You can customize this migration by publishing it to your application's `database/migrations` directory:

```bash
php artisan vendor:publish --provider="CoderManjeet\\LaravelContactForm\\ContactFormServiceProvider" --tag="contact-form-migrations"
```
### Usage
To use the contact form in your application, simply include the form in one of your views:

```blade
@include('laravel-contact-form::contact')
```
This will render the contact form. When the form is submitted, the data will be stored in the contacts table, and an email will be sent to the configured recipient.

### Customizing Form Fields
You can customize the form fields by editing the published views. The default form includes fields for name, email, subject, and message. You can add or remove fields as needed.

### Validation
The package includes default validation rules for the form fields. You can customize these rules by editing the `config/contact-form.php` file.

### Email Notifications
When a form is submitted, an email notification is sent to the configured recipient. You can customize the email template by editing the published views in `resources/views/vendor/contact-form/mail`.

### Contributing
Contributions are welcome! Please feel free to submit a pull request or open an issue on GitHub.

### License
This package is open-source software licensed under the [MIT license.](https://opensource.org/licenses/MIT)