<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AffinityGroups extends Model
{
    protected $table = 'affinitygroups';
    public $timestamps = false;

    protected $primaryKey = 'id';

    public function users() {
        return $this->belongsToMany('App\User');
    }
}
