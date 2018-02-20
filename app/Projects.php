<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model{

	protected $table = 'projects';
    public $timestamps = false;


    protected $attributes = [
        'project_id' => null,
        'project_desc' => null,
        'color' => null,
        'is_active' => null,
        'project_address' => null,
    ];
    
}
