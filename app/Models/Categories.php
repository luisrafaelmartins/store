<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Categories extends Model{
    protected $table = 'category';
    public $timestamps = false;
    public $dates = ['created_at'];
    public $fillable = ['name'];

}