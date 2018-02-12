<?php

namespace App\ViewComposers;

use View;
use App\Signatories;

class SignatoriesComposer{
   

    public function compose($view){

    	$adminSignatory = Signatories::where('type', '1')->first();
    	$accountingSignatory = Signatories::where('type', '2')->first();

    	$data = array(
            'adminSignatory'  => $adminSignatory,
            'accountingSignatory' => $accountingSignatory,
        );

    	$view->with($data);
    	
    }


}