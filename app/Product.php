<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //protected $table = 'Product';
    protected $guarded = [];
    public function category(){
        return $this->belongsTo("App\Category");
}


public static function boot(){
    parent::boot();
    static::saving(function($model){
        $model->slug = $model->slugGenerator(Str::slug($model->name));
    });
 }



public function slugGenerator($slug){
    while(!Product::select('slug')->where('slug','like',$slug.'%')->get()->isEmpty()){
        $slug = Str::slug($slug, '_');
    }
    return $slug;
 }
}
 
