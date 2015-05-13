<?php namespace Auto\Repositories\CarImage;

use Auto\Repositories\PresenterCatalogAbstract;

class Presenter extends PresenterCatalogAbstract
{
    public $dir_url = '/media/cars/catalog';

    public function url()
    {
        return $this->dir_url . '/' . $this->name;
    }


}