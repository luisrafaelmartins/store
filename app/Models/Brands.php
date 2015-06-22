<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Brands extends Model{
    protected $table = 'brand';
    public $timestamps = false;
    public $dates = ['created_at'];
    public $fillable = ['name'];

}