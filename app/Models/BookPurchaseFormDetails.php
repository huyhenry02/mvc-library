<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookPurchaseFormDetails extends Model
{
    use HasFactory;

    protected $table = 'book_purchase_form_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'book_purchase_form_id',
        'book_id',
        'amount',
        'price',
    ];

    /**
     * @return BelongsTo
     */
    public function bookPurchaseForm(): BelongsTo
    {
        return $this->belongsTo(BookPurchaseForm::class, 'book_purchase_form_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }
}
