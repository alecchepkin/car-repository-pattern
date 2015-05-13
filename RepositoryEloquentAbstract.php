<?php namespace Auto\Repositories;

use Auto\Eloquents\BaseEloquent;
use Illuminate\Support\Collection;

abstract class RepositoryEloquentAbstract implements RepositoryInterface
{
    /**
     * @var
     */
    private $eloquent;
    /**
     * @var PresenterInterface
     */
    private $presenter;


    /**
     * @param BaseEloquent $eloquent
     * @param PresenterInterface $presenter
     */
    function __construct(BaseEloquent $eloquent, PresenterInterface $presenter)
    {
        $this->eloquent = $eloquent;
        $this->presenter = $presenter;
    }

    /**
     * @param array $with
     * @return mixed
     * @internal param array $columns
     */

    public function all($with = [])
    {
        $eloquent = $this->eloquent->with($with)->get();
        return $this->makeCollection($eloquent, $with);

    }


    /**
     * @param $attribute
     * @param $value
     * @param array $with
     * @return mixed
     */
    public function findBy($attribute, $value, $with = [])
    {
        $eloquent = $this->eloquent->where($attribute, '=', $value)->with($with)->first();
        return $this->makePresenter($eloquent, $with);


    }

    /**
     * @param $attribute
     * @param $value
     * @param array $with
     * @return mixed
     */
    public function getBy($attribute, $value, $with = [])
    {
        $eloquents = $this->eloquent->where($attribute, '=', $value)->with($with)->get();
        return $this->makeCollection($eloquents, $with);
    }


    /**
     * Make Collection for View from Presenter
     *
     * @param $eloquents
     * @param array $with
     * @param null $presenter
     * @return static
     */
    protected function makeCollection($eloquents, $with = [], $presenter = null)
    {
        $_presenter = $presenter ?: $this->presenter;
        $collection = Collection::make();
        foreach ($eloquents as $eloquent) {
            $presenter = $this->makePresenter($eloquent, $with, $_presenter);
            $collection->push($presenter);
        }
        return $collection;
    }

    /**
     * Make Presenter for View
     * @param $eloquent
     * @param array $with
     * @param null $presenter
     * @return Presenter|void
     */
    protected function makePresenter($eloquent, $with = [], $presenter = null)
    {
        if (!$eloquent) {
            return;
        }

        if (!is_array($with)) {
            $with = [$with];
        }

        $_presenter = $presenter ?: $this->presenter;

        $relations = [];
        foreach ($with as $name) {
            $relation = $eloquent->$name;
            d($eloquent);
            dd($relation);
            $relations[$name] = $this->makeRelation($relation, $_presenter);
        }
        $presenter = $_presenter->make($eloquent->getAttributes(), $relations);
        return $presenter;

    }

    private function makeRelation($relation)
    {
        $result = null;


        if (empty($relation)) {
            return $result;
        }

        if ($relation instanceof \Illuminate\Database\Eloquent\Collection) {

            $presenter = $this->createPresenter(get_class($relation[0]));
            $result = $this->makeCollection($relation, [], $presenter);

        } else {
            $presenter = $this->createPresenter(get_class($relation));
            $result = $this->makePresenter($relation, [], $presenter);
        }
        return $result;
    }

    private function createPresenter($class)
    {
        $reflectionClass = new \ReflectionClass($class);

        $class = '\Auto\Repositories\\' . $reflectionClass->getShortName() . '\Presenter';

        return new $class;

    }
}
