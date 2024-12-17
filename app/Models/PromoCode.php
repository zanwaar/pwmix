<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class PromoCode extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'promo_codes';
    protected $fillable = ['promo_code', 'streamer_name', 'streamer_id', 'status'];

    public function promoCounters($promo_code)
    {
        $counters = IpaymuLog::where('promo_code', $promo_code)->where('status_code','1')->count();
        return $counters;
    }
    public function promoCountersSingle($promo_code,$id)
    {
        $counters = IpaymuLog::where('promo_code', $promo_code)->where('status_code','1')->where('streamer_id',$id)->count();
        return $counters;
    }

    public function getStreamer()
    {
        $data = User::with('PromoCode')->get();
        return $data;
    }

       // Relasi ke User
       public function user()
       {
           return $this->belongsTo(User::class, 'streamer_id');
       }

}
