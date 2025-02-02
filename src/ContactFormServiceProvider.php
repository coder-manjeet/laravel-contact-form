<?php

namespace CoderManjeet\LaravelContactForm;

use Illuminate\Support\ServiceProvider;

class ContactFormServiceProvider extends ServiceProvider
{
    /**
     * This function is responsible for bootstrapping the ContactFormServiceProvider.
     * It loads routes, views, and optionally migrations for the package.
     *
     * @return void
     */
    public function boot()
    {
        // Load routes, views, migrations
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/views', 'laravel-contact-form');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        

        // Publish components
        $this->publishes([
            __DIR__ . '/views/components' => resource_path('views/components/contact-form'),
        ], 'contact-form-components');

        // Publish config
        $this->publishes([
            __DIR__ . '/config/contact-form.php' => config_path('contact-form.php'),
        ], 'contact-form-config');

        // Publish mailables
        $this->publishes([
            __DIR__ . '/Mail' => app_path('Mail'),
            __DIR__ . '/views/mail' => resource_path('views/vendor/contact-form/mail'),
        ], 'contact-form-mails');

        // Publish controller
        $this->publishes([
            __DIR__ . '/Http/Controllers/ContactFormController.php' => app_path('Http/Controllers/ContactFormController.php'),
        ], 'contact-form-controller');

        // Publish migrations
        $this->publishes([
            __DIR__ . '/database/migrations' => database_path('migrations'),
        ], 'contact-form-migrations');

        // Publish all assets at once
        $this->publishes([
            __DIR__ . '/components' => resource_path('views/components/contact-form'),
            __DIR__ . '/views/mail' => resource_path('views/vendor/contact-form/mail'),
            __DIR__ . '/config/contact-form.php' => config_path('contact-form.php'),
            __DIR__ . '/Mail' => app_path('Mail'),
            __DIR__ . '/Http/Controllers/ContactFormController.php' => app_path('Http/Controllers/ContactFormController.php'),
            __DIR__ . '/database/migrations' => database_path('migrations'),
        ], 'contact-form-all');
    }


    public function register() {
        $this->mergeConfigFrom(
            __DIR__ . '/config/contact-form.php', 'contact-form'
        );
    }
}
