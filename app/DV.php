<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

class DV extends Model{



    protected $table = 'dv';
    protected $dates = ['created_at', 'updated_at'];
    public $timestamps = false;



    protected $fillable = [
        'slug',
        'doc_no',
        'dv_no', 
        'dv_date', 
        'dv_project_id',
        'dv_fund_source',
        'dv_mop',
        'dv_payee',
        'dv_address',
        'dv_tin',
        'dv_bur_no',
        'dv_dept_code',
        'dv_unit_code',
        'dv_proj_code',
        'dv_explanation',
        'dv_amount',
        'dv_certified_by',
        'dv_certified_by_position',
        'dv_certified_by_sig_date',
        'dv_approved_by',
        'dv_approved_by_position',
        'dv_approved_by_sig_date',
        'created_at',
        'updated_at',
        'machine_created',
        'machine_updated',        
        'ip_created',
        'ip_updated',
        'user_id'
    ];  





    protected $attributes = [
        'slug' => null ,
        'doc_no' => null,
        'dv_no' => null,
        'dv_date' => null,
        'dv_project_id' => null,
        'dv_fund_source' => null,
        'dv_mop' => null,
        'dv_payee' => null,
        'dv_address' => null,
        'dv_tin' => null,
        'dv_bur_no' => null,
        'dv_dept_code' => null,
        'dv_unit_code' => null,
        'dv_proj_code' => null,
        'dv_explanation' => null,
        'dv_amount' => null,
        'dv_certified_by' => null,
        'dv_certified_by_position' => null,
        'dv_certified_by_sig_date' => null,
        'dv_approved_by' => null,
        'dv_approved_by_position' => null,
        'dv_approved_by_sig_date' => null,
        'created_at' => null,
        'updated_at' => null,
        'machine_created' => null,
        'machine_updated' => null,
        'ip_created' => null,
        'ip_updated' => null,
        'user_id' => null,
    ];





    public function user(){
        return $this->hasOne('App\User', 'user_id', 'user_id');
    }




    public function getRouteKeyName(){

        return 'slug';

    }




    /** SCOPES **/


    public function scopeSearch($query, $key){

        $query->where(function ($query) use ($key) {
            $query->where('dv_payee', 'LIKE', '%'. $key .'%')
                 ->orwhere('dv_no', 'LIKE', '%'. $key .'%')
                 ->orwhere('doc_no', 'LIKE', '%'. $key .'%')
                 ->orwhere('dv_dept_code', 'LIKE', '%'. $key .'%')
                 ->orwhere('dv_unit_code', 'LIKE', '%'. $key .'%')
                 ->orwhere('dv_proj_code', 'LIKE', '%'. $key .'%')
                 ->orwhere('dv_fund_source', 'LIKE', '%'. $key .'%');
        });

    }





    public function scopeFilters($query, $array = []){

        foreach ($array as $key => $value) {
            
            if(!$value == null){

                return $query->where($key, $value);

            }

        }

    }
    




    public function scopeBetweenDvDate($query, $from, $to){

        $from = Carbon::parse($from)->format('Y-m-d');

        $to = Carbon::parse($to)->format('Y-m-d');

        return $query->whereBetween('dv_date', [$from, $to]);

    }





    public function scopePopulate($query){

        return $query->orderBy('created_at', 'DESC')->paginate(1);

    }




    public function scopeGetByUser($query){

        return $query->whereUserId(Auth::user()->user_id);

    }




    public function scopeGetByIncomings($query){

        return $query->whereDate('dv_date', Carbon::now()->format('Y-m-d'));

    }



    public function scopeFindSlug($query ,$slug){

        return $query->where('slug', $slug)->firstOrFail();

    }





    /** SETTERS **/


    public function setDvAmountAttribute($value){

        $this->attributes['dv_amount'] = str_replace(',', '', $value);

    }




    public function setDvPayeeAttribute($value){

        $this->attributes['dv_payee'] = strtoupper($value);

    }





}
