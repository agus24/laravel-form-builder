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

        if ($this->app->runningInConsole()) {
            $this->commands([
                CreateForm::class
            ]);
        }
    }
}
