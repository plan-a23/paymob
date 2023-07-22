<?php

namespace Orchestra\Canvas\Commands;

use Orchestra\Canvas\Processors\GeneratesExceptionCode;
use Symfony\Component\Console\Input\InputOption;

/**
 * @see https://github.com/laravel/framework/blob/9.x/src/Illuminate/Foundation/Console/ExceptionMakeCommand.php
 */
#[\Symfony\Component\Console\Attribute\AsCommand(name: 'make:exception')]
class Exception extends Generator
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:exception';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new custom exception class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Exception';

    /**
     * Generator processor.
     *
     * @var string
     */
    protected $processor = GeneratesExceptionCode::class;

    /**
     * Get the stub file for the generator.
     */
    public function getStubFile(): string
    {
        return $this->getStubFileFromPresetStorage($this->preset, $this->getStubFileName());
    }

    /**
     * Get the stub file name for the generator.
     */
    public function getStubFileName(): string
    {
        if ($this->option('render')) {
            return $this->option('report')
                ? 'exception-render-report.stub'
                : 'exception-render.stub';
        }

        return $this->option('report')
            ? 'exception-report.stub'
            : 'exception.stub';
    }

    /**
     * Get the default namespace for the class.
     */
    public function getDefaultNamespace(string $rootNamespace): string
    {
        return $rootNamespace.'\Exceptions';
    }

    /**
     * Get the console command options.
     *
     * @return array<int, array>
     */
    protected function getOptions()
    {
        return [
            ['force', 'f', InputOption::VALUE_NONE, 'Create the class even if the exception already exists'],
            ['render', null, InputOption::VALUE_NONE, 'Create the exception with an empty render method'],
            ['report', null, InputOption::VALUE_NONE, 'Create the exception with an empty report method'],
        ];
    }
}
