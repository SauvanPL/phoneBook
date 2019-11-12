<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class contact extends Model
{


    protected $fillable = ['name', 'number'];
    //protected $quarded = [];

   /* public function scopeSearch($query){
        $search = request('search');
        return $query->where('name','like', '%'.$search.'%');
    }
   */
   public function user(){
    $this->belongsTo(User::class);
}

}
