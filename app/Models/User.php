<?php






/*
 * @author pwcreturn.com <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\Models;

use App\Models\PromoCode;
use Illuminate\Support\Facades\Auth;
use hrace009\PerfectWorldAPI\API;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use Search;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'ID';


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'ID',
        'name',
        'email',
        'phonenumber',
        'passwd',
        'passwd2',
        'qq',
        'truename',
        'answer',
        'creatime',
        'referral_code',
        'invite_code',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'passwd',
        'passwd2',
        'qq',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be mutated to date.
     *
     * @var array
     */
    protected $dates = ['creatime'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * @var array|string[]
     */
    protected array $searchable = [
        'name',
        'email',
        'truename'
    ];

    /**
     * The attributes that should be mutated to password.
     *
     * @return string
     */
    public function getAuthPassword(): string
    {
        return $this->passwd;
    }

    /**
     * The attributes that should be mutated users locale.
     *
     * @return string
     */
    public function getUserLocale(): string
    {
        return $this->language;
    }

    /**
     * The attributes that should be mutated users balance.
     *
     * @return string
     */
    public function getBalance(): string
    {
        return number_format($this->money, 0);
    }

    /**
     * The attributes that should be mutated users bonuses.
     *
     * @return string
     */
    public function getBonuses(): string
    {
        return number_format($this->bonuses, 0);
    }

    /**
     * The attributes that should be mutated online users.
     *
     * @return string
     */
    public function online(): string
    {
        return DB::table('point')->where('uid', $this->ID)->where('zoneid', 1)->exists();
    }

    /**
     * The attributes to get characters.
     *
     * @return array
     */
    public function roles(): array
    {
        $api = new API();
        $roles = $api->getRoles($this->ID);
        return $roles['roles'] ?? [];
    }

    /**
     * @param $value
     * @return string
     */
    public function getRoleAttribute($value): string
    {
        return ucwords($value);
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function characterId()
    {
        return session()->get('character_id');
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function characterName()
    {
        return session()->get('character_name');
    }

    /**
     * @return bool
     */
    public function isAdministrator(): bool
    {
        return $this->role === 'Administrator';
    }

    /**
     * @return bool
     */
    public function isGamemaster(): bool
    {
        return $this->role === 'Gamemaster';
    }

    /**
     * @return bool
     */
    public function isPlayer(): bool
    {
        return $this->role === 'Player';
    }

    public function isStreamer(): bool
    {
        return $this->streamer === 'y';
    }

    public function voucher_logs(): HasMany
    {
        return $this->hasMany('App\Models\VoucherLog');
    }

    public function referrals()
    {
        return $this->hasMany(User::class, 'referral_code', 'invite_code');
    }
    
    public function promoCode(): string
    {
        $promoCode = DB::table('promo_codes')
            ->where('streamer_id', Auth::user()->ID)
            ->value('promo_code');

        return $promoCode ?: ''; // Provide a default value if no promo code is found
    }
    public function countPromo()
    {
        $promoCode = DB::table('pwp_ipaymu')
            ->where('status_code', 1)
            ->where('status','berhasil')
            ->where('promo_code', Auth::user()->promoCode())
            ->count();

        return $promoCode ?: ''; // Provide a default value if no promo code is found
    }
    
}
