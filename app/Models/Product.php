<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Symfony\Component\Translation\t;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'options_id', 'price', 'description'

    ];

    public function option()
    {
        return $this->belongsTo(Option::class, 'options_id', 'id');

    }

//    protected static function boot()
//    {
//        parent::boot();
//        static::deleting(function ($product) {
//
//            $product->option->delete();
//        });
//    }

    public function getColumnsName()
    {

        return $this->fillable;
    }


}
