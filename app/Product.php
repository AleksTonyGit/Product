<?php

namespace App;

use \Esensi\Model\Model;


class Product extends Model
{
    protected $primaryKey='id';
    protected $table='products';
    public    $timestamps = false;
    protected $fillable=['product_type_id','category_id','name','description','image'];
    protected $rules=[
                        'product_type_id' =>['required'],
                        'category_id'     =>['required'],
                        'name'            =>['required','max:100','unique'],
                        'description'     =>['required'],
                        'image'           =>['required']

    ];
}
