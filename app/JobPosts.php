<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobPosts extends Model
{
    protected $table = 'jobpostings';

    protected $primaryKey = 'id';

    protected $fillable = [
        'companyname', 'jobtitle', 'salary', 'description', 'city'
    ];

    public function users() {
        return $this->belongsToMany('App\User');
    }
}
