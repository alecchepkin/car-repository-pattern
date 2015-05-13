<?php namespace Auto\Repositories;

interface PresenterInterface
{
    /**
     * Fabric method, init and create presenter
     *
     * @param array $attributes
     * @return new $this
     */
    public function make(array $attributes);

    public function url();
}