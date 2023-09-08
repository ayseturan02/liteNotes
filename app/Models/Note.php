<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $table="notes";

    //protected $fillable -> mass assignment yazılabilen alanlar
    //protected $quarded -> mass assignment yapılamayacak alanlar

    protected $fillable =[
        "user_id",
        "title",
        "content",
        "uui_d"
    ];
    public function getUser(){

        return $this->belongsTo(User::class,"user_id","id");

    }
   public function getRouteKeyName(){
        return "uui_d";
   }
}
