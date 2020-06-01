<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deduction extends Model
{
    protected $guarded = [
        'id', 'user_id', 'year', 'created_at', 'updated_at'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
