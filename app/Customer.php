<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Customer extends Model
{
    //Fillable Examble it mean if the attribute find on this array you can add it
//    protected $fillable =  ['name','email','phoneNumber','active'];
//////
/// Guarded
/// quz we validate all feild on controller we can go a head

    protected $guarded=[];
    protected $attributes=[
        'active'=>'active'
    ];

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function path()
    {
        return url("/customers/{$this->username}");
        //.Str::slug($this->username)
    }

    public function scopeActive($query){
        return $query->where('active', 'active');
    }
    public function scopeInactive($query){
        return $query->where('active', 'inactive');
    }
    public  function company(){
        return $this->belongsTo(Company::class);
    }
/*
 * This Function To change what inside Attribute*/
    public function getActiveAttribute($attribute)
    {

        return $this->activeOption()[$attribute];
    }

    public function activeOption()
    {
        return [
            'active' =>"Active",
            'inactive' =>"Inactive"
            ,'In-progress'=>'In-progress',


        ];
    }

}
