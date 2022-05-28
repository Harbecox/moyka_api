<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Pack;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index(){
        $data['companies_count'] = Company::query()->count();
        $data['sub_count'] = Subscription::query()->count();
        $data['users_count'] = User::query()->count();
        $data['packs_count'] = Pack::query()->count();
        return view("dashboard.index",$data);
    }
}
