<?php namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
class Promotions extends Model{
    protected $table = 'promotions';
    public $timestamps = false;
    public $dates = ['created_at', 'deleted_at'];
    public $fillable = ['name','designation','thumb_path','img_path','start_at','end_at',
        'discount','discount_type'];
    use SoftDeletes;

    public function products(){
        return $this->belongsToMany('\App\Models\Products','promotions_products','promotions_id','products_id');
    }
}