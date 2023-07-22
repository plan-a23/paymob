<?php

namespace Orchestra\Canvas\Core\Contracts;

interface GeneratesCodeListener
{
    /**
     * Code already exists.
     *
     * @return mixed
     */
    public function codeAlreadyExists(string $className);

    /**
     * Code successfully generated.
     *
     * @return mixed
     */
    public function codeHasBeenGenerated(string $className);

    /**
     * Get the stub file for the generator.
     */
    public function getPublishedStubFileName(): ?string;

    /**
     * Get the stub file for the generator.
     */
    public function getStubFile(): string;

    /**
     * Get the default namespace for the class.
     */
    public function getDefaultNamespace(string $rootNamespace): string;

    /**
     * Get the desired class name.
     */
    public function generatorName(): string;

    /**
     * Generator options.
     */
    public function generatorOptions(): array;
}
