<?php namespace Auto\Repositories;


abstract class PresenterAbstract implements PresenterInterface
{


    protected $attributes = [];
    /**
     * @var array
     */
    protected $relations;

    function __construct(array $attributes = [], array $relations = [])
    {
        $this->attributes = $attributes;
        $this->relations = $relations;
    }


    /**
     * @param array $attributes
     * @param array $relations
     * @return mixed
     */
    public function make(array $attributes, array $relations = [])
    {
        return new $this($attributes, $relations);

    }

    function __get($name)
    {
        if (isset($this->attributes[$name])) {
            return $this->attributes[$name];
        }
        if (isset($this->relations[$name])) {
            return $this->relations[$name];
        }
    }



    /**
     * @param $key
     * @param $value
     * @internal param array $relations
     */
    public function setRelation($key, $value)
    {
        $this->relations[$key] = $value;
    }

}