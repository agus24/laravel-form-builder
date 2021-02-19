<?php
namespace Gustiawan\FormBuilder\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreateForm extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:form {name : The Name of the Form}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Form';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $file = File::get(__DIR__."/form.stub");
        $name_argument = $this->argument('name');
        $name_arguments = explode("/", $name_argument);

        $name = $name_arguments[count($name_arguments) - 1];
        unset($name_arguments[count($name_arguments) - 1]);

        $str = Str::of($file)->replaceFirst("{name}", $name);

        if (count($name_arguments) > 0) {
            $str = Str::of($str)->replaceFirst("{namespace}", "\\".implode("\\", $name_arguments));
        } else {
            $str = Str::of($str)->replaceFirst("{namespace}", "");
        }

        $path = base_path("app/Form");
        $folders = explode("/", $name_argument);
        unset($folders[count($folders) - 1]);
        $folder = implode("/", $folders);

        if(!File::exists($path."/".$folder)) {
            File::makeDirectory($path."/".$folder, $mode = 0755, true, true);
        }

        if (File::exists($path."/".$name_argument.".php")) {
            $this->info("File already exists!");
            return;
        }

        File::put($path."/".$name_argument.".php", $str);
        $this->info('Form was created!');
    }
}
