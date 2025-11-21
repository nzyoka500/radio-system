<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Models\Admin\SetupPage;
use App\Models\Admin\BasicSettings;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $page_section = SetupPage::where('slug', 'home')->with(['sections' => function($q){
            $q->where('status',true);
        }])->first();
        if($page_section->status == false) return redirect()->route('index'); 
        $basic_settings = BasicSettings::first();
        $page_title = ($basic_settings->site_name ?? 'Home') . ' - ' . ($basic_settings->site_title ?? 'Home');
        return view('frontend.index',compact("page_title","page_section"));
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('user.login');
    }
}
