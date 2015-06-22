<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Types extends Model{
    protected $table = 'type';
    public $timestamps = false;
    public $dates = ['created_at'];
    public $fillable = ['name'];

}