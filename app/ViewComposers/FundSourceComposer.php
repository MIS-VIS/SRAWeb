<?php

namespace App\ViewComposers;

use View;
use App\FundSource;


class FundSourceComposer{
   


    public function compose($view){

        $fundSource = FundSource::select('fund_source_name')->get();
        $view->with('fundSource', $fundSource);

    }



}