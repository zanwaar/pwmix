<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    use HasFactory;
    public function counterRef($invite_code)
    {
        $count = User::where('referral_code', $invite_code)->count();
        return $count;
    }
}
