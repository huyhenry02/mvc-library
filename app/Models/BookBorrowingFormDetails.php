<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookBorrowingFormDetails extends Model
{
    use HasFactory;
    protected $table = 'book_borrowing_form_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'book_borrowing_form_id',
        'book_id',
        'amount',
        'price',
    ];

    /**
     * @return BelongsTo
     */
    public function bookBorrowingForm(): BelongsTo
    {
        return $this->belongsTo(BookBorrowingForm::class, 'book_borrowing_form_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }
}
