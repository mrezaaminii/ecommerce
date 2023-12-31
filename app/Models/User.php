<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Admin\Market\Address;
use App\Models\Admin\Market\Payment;
use App\Models\Admin\Ticket\Ticket;
use App\Models\Admin\Ticket\TicketAdmin;
use App\Models\Admin\User\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'mobile',
        'status',
        'user_type',
        'activation',
        'national_code',
        'profile_photo_path',
        'email_verified_at',
        'mobile_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function getFullNameAttribute(){
        return "{$this->first_name} {$this->last_name}";
    }

    public function ticketAdmin(){
        return $this->hasOne(TicketAdmin::class);
    }

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }

    public function addresses(){
        return $this->hasMany(Address::class);
    }
}
