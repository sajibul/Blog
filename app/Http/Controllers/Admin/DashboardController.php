<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
class DashboardController extends Controller
{
  public function dashboard()
  {
    return view('admin.home');
  }


}
