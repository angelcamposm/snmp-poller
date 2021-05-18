<?php

namespace Acamposm\SnmpPoller\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class MakeCustomPollerCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:poller {name} {table=replace-with-table-name} {--is-table} {--f|force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Custom Poller';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Custom Poller';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return  base_path().'/vendor/acamposm/snmp-poller/src/Stubs/make.poller.stub';
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the CustomPoller.'],
            ['table', InputArgument::REQUIRED, 'The name of the snmp table.']
        ];
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Pollers';
    }

    /**
     * Execute the console command.
     *
     * @return bool|null
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function handle()
    {
        if ($this->isReservedName($this->getNameInput())) {
            $this->error('The name "'.$this->getNameInput().'" is reserved by PHP.');

            return false;
        }

        $name = $this->qualifyClass($this->getNameInput());

        $path = $this->getPath($name);

        // Next, We will check to see if the class already exists. If it does, we don't want
        // to create the class and overwrite the user's code. So, we will bail out so the
        // code is untouched. Otherwise, we will continue generating this class' files.
        if ((! $this->hasOption('force') ||
                ! $this->option('force')) &&
            $this->alreadyExists($this->getNameInput())) {
            $this->error($this->type.' already exists!');

            return false;
        }

        // Next, we will generate the path to the location where this class' file should get
        // written. Then, we will build the class and make the proper replacements on the
        // stub files so that it gets the correctly formatted namespace and class name.
        $this->makeDirectory($path);

        $this->files->put($path, $this->sortImports($this->buildClass($name)));

        $this->replaceStringInFile($path, 'SnmpTableName', $this->argument('table'));

        $this->replaceStringInFile($path, 'IsTable', $this->option('is-table') ? 'true' : 'false');

        $this->info($this->type.' created successfully.');

        return 0;
    }


    private function replaceStringInFile($filename, $string_to_replace, $replace_with): void
    {
        $content = file_get_contents($filename);
        $content_chunks = explode($string_to_replace, $content);
        $content = implode($replace_with, $content_chunks);
        file_put_contents($filename, $content);
    }

    /**
     * Replace the class name for the given stub.
     *
     * @param $stub
     * @param $name
     *
     * @return string
     */
    protected function replaceClass($stub, $name): string
    {
        $stub = parent::replaceClass($stub, $name);

        return str_replace('CustomPollerClassName', $this->argument('name'), $stub);
    }
}
