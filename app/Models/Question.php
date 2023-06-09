<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $guarded =  [];

    protected $appends= ['replies'];

    protected static function boot(){
        parent::boot();
        static::creating(function($question){
            $question->slug = str_slug($question->title);
        });
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function replies(){
        return $this->hasMany(Replay::class)->latest();
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function getRouteKeyName(){
        return 'slug';
    }

    public function getPathAttribute(){
        return $this->slug;
    }


}
