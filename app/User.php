<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function profit_and_loss()
    {
        return $this->hasMany(ProfitAndLoss::class);
    }
    
    public function deduction()
    {
        return $this->hasMany(Deduction::class);
    }
    
    
    public function is_pl($userId, $year, $month)
    {
        // 損益レコードの中に 条件に合致するレコードが存在するか
        return $this->profit_and_loss()
            ->where('user_id', $userId)
            ->where('year', $year)
            ->where('month', $month)
            ->exists();
    }
    
}
