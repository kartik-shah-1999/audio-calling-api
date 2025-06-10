<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request) {
    return User::where('id', '!=', $request->user()->id)
                ->when($request->search, fn($q) => $q->where('name', 'like', "%{$request->search}%"))
                ->get();
    }

}
