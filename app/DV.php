<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Carbon\Carbon;
use Auth;

class DV extends Model{


    protected $table = 'dv';
    public $timestamps = false;
    use Sluggable;
    protected $dates = ['created_at', 'updated_at'];


    protected $fillable = [
        'slug',
        'doc_no',
        'dv_project_id',
        'dv_no', 
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
        'dv_project_id' => null,
        'dv_no' => null,
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




    public function sluggable(){
        return [
            'slug' => [
                'source' => [ 'dv_proj_code', 'HashedSlug']
            ]
        ];
    }




    public function search($key, $paginate){
        return $this->where('doc_no', 'LIKE', '%'. $key .'%')
                    ->where('user_id', Auth::user()->user_id)
                    ->orderBy('updated_at', 'desc')
                    ->paginate($paginate);
    }




    public function hunt($slug){
        return $this->where('slug', $slug)->firstOrFail();
    }




    public function sanitize( $string = null ) {
        $chars = array(" ", "+");
        $string = str_replace($chars, "", $string);
        $string = preg_replace('/[^a-z0-9]/i', '', $string);
        $string = htmlspecialchars($string);
        $string = strip_tags($string);
        return $string;
    }




    public function getHashedSlugAttribute(){
        return md5(microtime());
    }




    public function getRouteKeyName(){
        return 'slug';
    }




    public static function getCreatedDefaultsAttribute(){
        return array(
            'doc_no' => 'DV' . rand(1000000, 9999999),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'machine_created' => gethostname(),
            'machine_updated' => gethostname(),
            'ip_created' => request()->ip(), 
            'ip_updated' => request()->ip(), 
            'user_id' => Auth::user()->user_id,
        );
    }




    public static function getUpdatedDefaultsAttribute(){
        return array(
            'updated_at' => Carbon::now(),
            'machine_updated' => gethostname(),
            'ip_updated' => request()->ip(),
        );
    }



}
