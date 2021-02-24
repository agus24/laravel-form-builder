<?php

namespace Gustiawan\FormBuilder;

use Gustiawan\FormBuilder\Components\Form;
use Gustiawan\FormBuilder\Commands\CreateForm;
use Illuminate\Support\ServiceProvider;

class FormBuilderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewComponentsAs('form-generator', [
            Form::class,
        ]);

        $this->loadViewsFrom(__DIR__.'/views', 'form-generator');

        $this->mergeConfigFrom(
            __DIR__.'/config/form_generator.php', 'form_generator'
        );

        $this->publishes([
            __DIR__.'/config/form_generator.php' => config_path('form_generator.php'),
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
                CreateForm::class
            ]);
        }
    }
}
