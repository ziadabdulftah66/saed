<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\models\Order;
use Illuminate\Http\Request;

class adminDashboard extends Controller
{

    public function index(){

        return view('dashboard.index');
    }
}
