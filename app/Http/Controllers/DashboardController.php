<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\products;
use App\Models\variants;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // return view('dashboard');
        $userCount = User::count();
        $productCount = products::count();
        $variantCount = variants::count();

        return view('dashboard', compact('userCount', 'productCount', 'variantCount'));
    }
}
