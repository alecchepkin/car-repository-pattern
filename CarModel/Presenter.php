<?php namespace Auto\Repositories\CarModel;

use Auto\Repositories\PresenterCatalogAbstract;

class Presenter extends PresenterCatalogAbstract
{

    public function url()
    {
        if(count($this->subModels)>1){
            return '/catalog/' . $this->brand->slug . '/' .$this->slug;
        }
        return '/catalog/' . $this->brand->slug . '/' .$this->slug . '/' . $this->slug;
    }


}