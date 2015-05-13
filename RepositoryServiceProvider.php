<?php namespace Auto\Repositories;

use Auto\Eloquents\CarBrand;
use Auto\Repositories\CarBrand\RepositoryEloquent as CarBrandRepositoryEloquent;
use Auto\Repositories\CarBrand\Presenter as CarBrandPresenter;


use Auto\Eloquents\CarImage;
use Auto\Repositories\CarImage\RepositoryEloquent as CarImageRepositoryEloquent;
use Auto\Repositories\CarImage\Presenter as CarImagePresenter;


use Auto\Eloquents\CarModel;
use Auto\Repositories\CarModel\RepositoryEloquent as CarModelRepositoryEloquent;
use Auto\Repositories\CarModel\Presenter as CarModelPresenter;


use Auto\Eloquents\CarModify;
use Auto\Repositories\CarModify\RepositoryEloquent as CarModifyRepositoryEloquent;
use Auto\Repositories\CarModify\Presenter as CarModifyPresenter;


use Auto\Eloquents\CarParam;
use Auto\Repositories\CarParam\RepositoryEloquent as CarParamRepositoryEloquent;
use Auto\Repositories\CarParam\Presenter as CarParamPresenter;


use Auto\Eloquents\CarParamGroup;
use Auto\Repositories\CarParamGroup\RepositoryEloquent as CarParamGroupRepositoryEloquent;
use Auto\Repositories\CarParamGroup\Presenter as CarParamGroupPresenter;


use Auto\Eloquents\CarParamName;
use Auto\Repositories\CarParamName\RepositoryEloquent as CarParamNameRepositoryEloquent;
use Auto\Repositories\CarParamName\Presenter as CarParamNamePresenter;


use Auto\Eloquents\CarSubModel;
use Auto\Repositories\CarSubModel\RepositoryEloquent as CarSubModelRepositoryEloquent;
use Auto\Repositories\CarSubModel\Presenter as CarSubModelPresenter;

use Illuminate\Support\ServiceProvider;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;

        $app->bind('Auto\Repositories\CarBrand\RepositoryInterface', function () {
            return new CarBrandRepositoryEloquent(new CarBrand, new CarBrandPresenter);
        });
        
        $app->bind('Auto\Repositories\CarImage\RepositoryInterface', function () {
            return new CarImageRepositoryEloquent(new CarImage, new CarImagePresenter);
        });
        
        $app->bind('Auto\Repositories\CarModel\RepositoryInterface', function () {
            return new CarModelRepositoryEloquent(new CarModel, new CarModelPresenter);
        });
        
        $app->bind('Auto\Repositories\CarModify\RepositoryInterface', function () {
            return new CarModifyRepositoryEloquent(new CarModify, new CarModifyPresenter);
        });
        
        $app->bind('Auto\Repositories\CarParam\RepositoryInterface', function () {
            return new CarParamRepositoryEloquent(new CarParam, new CarParamPresenter);
        });
        
        $app->bind('Auto\Repositories\CarParamGroup\RepositoryInterface', function () {
            return new CarParamGroupRepositoryEloquent(new CarParamGroup, new CarParamGroupPresenter);
        });

        $app->bind('Auto\Repositories\CarParamName\RepositoryInterface', function () {
            return new CarParamNameRepositoryEloquent(new CarParamName, new CarParamNamePresenter);
        });

        $app->bind('Auto\Repositories\CarSubModel\RepositoryInterface', function () {
            return new CarSubModelRepositoryEloquent(new CarSubModel, new CarSubModelPresenter);
        });
        


    }

}

