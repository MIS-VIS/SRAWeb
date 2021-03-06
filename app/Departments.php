<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model{
    
    protected $table = 'department';
    public $timestamps = false;


    protected $attributes = [
        'dept_id' => '',
        'dept_unit' => '',
        'dept_desc' => '',
        'created_at' => '',
        'created_by' => '',
    ];
}
