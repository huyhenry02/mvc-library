<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public const ROLE_TYPE_ADMIN = "admin";
    public const ROLE_TYPE_EMPLOYEE = "employee";
    public const ROLE_TYPES = [
        self::ROLE_TYPE_ADMIN => "Quản lý",
        self::ROLE_TYPE_EMPLOYEE => "Nhân viên",
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'role_type',
        'address',
        'phone',
        'email',
        'password',
        'age',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * @return HasMany
     */
    public function bookBorrowingForms(): HasMany
    {
        return $this->hasMany(BookBorrowingForm::class, 'create_user_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function bookPurchaseForms(): HasMany
    {
        return $this->hasMany(BookPurchaseForm::class, 'create_user_id', 'id');
    }

}
