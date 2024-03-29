<?php

namespace App\Http\Controllers;

use APP\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {

            $usertype = Auth()->user()->usertype;

            if ($usertype == 'user') {
                return view('petugas.petugashome');
            } else if ($usertype == 'admin') {
                return view('admin.adminHome');
            } else {
                return redirect()->back();
            }
        }
    }
}
