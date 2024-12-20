<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripayLog extends Model
{
    use HasFactory;

    // The name of the table associated with the model.
    protected $table = 'pwp_tripay';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['trx_id', 'user_id', 'amount', 'money', 'status', 'status_code', 'reference_id', 'promo_code'];

    public static function trxDone()
    {
        $count = self::where('status', 'berhasil')->count();
        return $count;
    }
    public static function sumTrx()
    {
        $sum = self::where('status', 'berhasil')->sum('money');
        return $sum;
    }
    public static function allTrx()
    {
        $sum = self::all()->whereNotNull('trx_id')->count();
        return $sum;
    }
    public static function sumAllTrx()
    {
        $sum = self::whereNotNull('trx_id')->sum('money');
        return $sum;
    }
    public static function allFailedTrx()
    {
        $sum = self::where('status','<>', 'berhasil')->whereNotNull('trx_id')->count();
        return $sum;
    }
    public static function sumAllFailedTrx()
    {
        $sum = self::where('status','<>', 'berhasil')->whereNotNull('trx_id')->sum('money');
        return $sum;
    }
}
