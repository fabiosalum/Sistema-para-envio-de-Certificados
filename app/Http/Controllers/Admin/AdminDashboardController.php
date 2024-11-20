<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificates;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class AdminDashboardController extends Controller
{
    function index(){
        $totalCertificates = Certificates::count();
        $certificates = Certificates::with('user')->orderBy('created_at', 'desc')->paginate(10);
    
        return view('admin.dashboard.index', compact('totalCertificates', 'certificates'));
        
    }
    
}
