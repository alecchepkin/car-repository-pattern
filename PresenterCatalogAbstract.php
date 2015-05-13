<?php namespace Auto\Repositories;


abstract class PresenterCatalogAbstract extends  PresenterAbstract
{


    /**
     * Интервал производства автомобиля
     * @return string
     */
    public function intervalYears(){
        $from = isset($this->release_from)? $this->release_from : null;
        $to = isset($this->release_to)? $this->release_to: null;
        $to = $to ? :'н.в.';

        if($from && $to){
            return $from . '&nbsp;–&nbsp;'. $to;
        }

    }

    /* Thumb */
    public function getImage($size = null, $options = ['crop'])
    {
        return $this->thumb($this->image, $size, $options);
    }

    public function getImages($size = null)
    {
        $arr = [];
        foreach ($this->images as $image) {
            $arr[] = $this->thumb($image, $size, $options);
        }
        return $arr;

    }

    public function thumb($image, $size, $options)
    {
        if (strpos($size, 'x')) {
            $size = explode('x', $size);
            if ($image) {

                return \Thumb::url($image->url(), $size[0], $size[1], $options);
            }
        } else return $image->url();
    }
}