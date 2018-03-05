<?php
 
namespace App\Services;

use App;
use Illuminate\Http\Request;
use App\Repositories\DV\DVRepository;


 
class DVService{
	

	protected $dv_repo;


    public function __construct(DVRepository $dv_repo){

        $this->dv_repo = $dv_repo;

    }



    public function getAll_SNF(){

       	$wew = new $this->dv_repo;

       	dd($wew);

    }




}