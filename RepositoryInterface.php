<?php namespace Auto\Repositories;

interface RepositoryInterface
{
    /**
     * @param array $with
     * @return mixed
     */
    public function all($with = []);

    /**
     * @param $attribute
     * @param $value
     * @param array $with
     * @return mixed
     */
    public function findBy($attribute, $value, $with = []);

    /**
     * @param $attribute
     * @param $value
     * @param array $with
     * @return mixed
     */
    public function getBy($attribute, $value, $with = []);
}