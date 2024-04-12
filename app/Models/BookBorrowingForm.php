<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BookBorrowingForm extends Model
{
    use HasFactory;
    protected $table = 'book_borrowing_forms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'create_user_id',
        'customer_name',
        'customer_phone',
        'customer_email',
        'customer_address',
        'usage_period_from',
        'usage_period_to',
        'status',
        'deposit',
        'total_price',
    ];

    /**
     * @return HasMany
     */
    public function details(): HasMany
    {
        return $this->hasMany(BookBorrowingFormDetails::class, 'book_borrowing_form_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'create_user_id', 'id');
    }
}
