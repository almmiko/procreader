<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'user_id'
    ];

    protected $hidden = [
        'user_id', 'deleted_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
