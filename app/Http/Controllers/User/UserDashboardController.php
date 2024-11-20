<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Certificates;
use Auth;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    function index(){
        
        $userId = Auth::id();
        $certificates = Certificates::where('user_id', $userId)->paginate(10);
        $certificatesCount = Certificates::where('user_id', $userId)->count();
        
        return view('user.dashboard.index', compact('certificatesCount','certificates') );
        
    }
}
