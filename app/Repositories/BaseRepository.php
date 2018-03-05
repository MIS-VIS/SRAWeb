<?php

namespace App\Repositories;

abstract class BaseRepository {

    protected $model;


    function __construct($model)
    {
        $this->model = $model;
    }

    public function query(){

        return $this->model->newQuery();

    }


} 