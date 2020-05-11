<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table='posts'; // table name
    public $primarykey='id';  // primary key
    public $timestamps=true;  // time stamps
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
