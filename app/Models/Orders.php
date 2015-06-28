<?php namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
class Orders extends Model{
    protected $table = 'orders';
    public $timestamps = false;
    public $dates = ['created_at', 'deleted_at'];
    public $fillable = ['name','user_id','total','address','postal_code','phone','fax','tax','shipname',
        'shipemail','shipped','shipped_at','order_number','obs'];
    use SoftDeletes;

    public function details(){
        return $this->hasMany('\App\Models\OrdersDetails','order_id');
    }
}