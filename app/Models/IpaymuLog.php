<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IpaymuLog extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pwp_ipaymu';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['trx_id', 'user_id', 'amount', 'money', 'status', 'status_code', 'sid', 'reference_id', 'promo_code'];

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'trx_id';

    /**
     * @var string
     */
    protected $keyType = 'string';

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
