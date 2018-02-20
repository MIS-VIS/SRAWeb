<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FundSource extends Model{
    
    	
	protected $table = 'fund_source';
    public $timestamps = false;


    protected $attributes = [
        'fund_source_id' => null,
        'fund_source_name' => null,
    ];


}
