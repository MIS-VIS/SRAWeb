<?php
 
namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\DV\DVRepository;

use App\Repositories\Chainable;

 
class DVService{
	

	protected $dv_repo;  



    public function __construct(DVRepository $dv_repo){

        $this->dv_repo = $dv_repo;
    
    }



    public function getAll_SNF(Request $request){
   		$test = new Chainable($this->dv_repo);
        return $test->fetchAllPaginate(10);

    }




}