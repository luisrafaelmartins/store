<?php namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
class Products extends Model{
    protected $table = 'products';
    public $timestamps = false;
    public $dates = ['created_at', 'deleted_at'];
    public $fillable = ['name','designation','thumb_path','img_path','category_id','type_id','brand_id','available','stock'];
    use SoftDeletes;

}