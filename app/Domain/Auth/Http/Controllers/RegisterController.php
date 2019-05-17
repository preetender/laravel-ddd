<?php

namespace App\Domain\Auth\Http\Controllers;

use App\Units\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        return $request->all();
    }
}
