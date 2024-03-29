<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'price',
        'photo'
    ];
    public function scopeFilter($query ,$filter){
        // dd($query);
        if($filter->has('q')){
        $searchValue=$filter->get("q");
        return $query->where('name','like',"%$searchValue%")->orWhere("price","LIKE","%$searchValue%");
        };
    }
}
