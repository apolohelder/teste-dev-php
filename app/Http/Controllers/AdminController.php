<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;

class AdminController extends Controller{
    public function index() {
        $suppliers = Supplier::all();
        return view('auth.admin', compact('suppliers'));
    }
}
