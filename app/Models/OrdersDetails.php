<?php namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class OrdersDetails extends Model{
    protected $table = 'orders_details';
    public $timestamps = false;
    public $dates = ['created_at', 'deleted_at'];
    public $fillable = [];
    use SoftDeletes;

    public function products(){
        return $this->belongsTo('\App\Models\Products','product_id','id');
    }

}