<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AliadosEstrategicos extends Model
{
    protected $table = 'aliados_estrategicos';
    protected $fillable = ['nombre','descripcion','logo','created_at'];
    //protected $guarded = [];

    //Scope

    public function scopeName($query , $created_at)
    {
        if($created_at)
        return $query->whereBetween('created_at', [, ]);
    } 
    

}
