<?php
namespace App\Repositories;


class Chainable {


    private $instance = null;
    private $_returns = [];


    public function __construct(){
        $pars = func_get_args();
        $this->instance = is_object($obj=array_shift($pars))?$obj:new $obj($pars);
    }




    

 // Retrieve the returned value from last
 // chained method

public function _get_return(&$var){
    $var = count($this->_returns)?
              array_pop($this->_returns):null;
    return $this;
}

// Clear the returned value cache
public function _reset(){
    $this->_returns = [];
    return $this;
}

// Redefine call proxy for saving returned values
public function __call($name,$pars){
    ($r=call_user_func_array([$this->instance,$name],$pars))?$this->_returns[]=$r:null;
    return $this;
}

}