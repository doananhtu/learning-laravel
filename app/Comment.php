<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = ['id'];
    protected $table = 'comments';

    public function ticket()
    {
        return $this->belongsTo('App\Ticket');
    }
}
