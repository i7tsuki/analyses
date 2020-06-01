<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfitAndLoss extends Model
{
    protected $guarded = [
        'id', 'user_id', 'year', 'month', 'type', 'created_at', 'updated_at'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
