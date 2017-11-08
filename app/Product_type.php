<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_type extends Model
{
    protected $primaryKey='id';
    protected $table='product_types';
    protected $fillable=['name'];
    public $timestamps = false;
    protected $rules=['name'=>['required','max:100','unique']];
}
