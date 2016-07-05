<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'charge_id','charge_account','fee','user_id',
        'type','subject','transaction_no'
    ];

    public function scopeToday($query)
    {
        return $query->where('created_at','>=',Carbon::today())
            ->where('created_at','<',Carbon::tomorrow());
    }

    public function scopeLastWeek($query)
    {
        return $query->where('created_at','>',Carbon::now()->subDays(7));
    }
}
