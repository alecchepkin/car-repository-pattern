<?php namespace Auto\Repositories\CarBrand;

use Auto\Repositories\PresenterCatalogAbstract;

class Presenter extends PresenterCatalogAbstract
{
    public function logo()
    {
        return '/images/brands/' . $this->slug . '.png';

    }


    public function url()
    {

    }



}