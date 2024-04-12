<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class BookPurchaseFormController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;
}
