<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model{

	protected $table = 'projects';
    public $timestamps = false;


    protected $attributes = [
        'project_id' => '',
        'project_desc' => '',
        'color' => '',
        'is_active' => '',
        'project_address' => '',
    ];
    
}
