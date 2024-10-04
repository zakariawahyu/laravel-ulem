<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthContoller extends Controller
{
    /**
     * Function to handle login page. 
     *
     * @param   collection      $request    User's Request
     * @return  void
     */
    public function index() 
    {
        return view('backend.pages.auth.index');
    }

    public function login(AuthRequest $request)
    {
        $data = $request->validated();

        $admin = Admin::firstWhere('username', $data['username']);
        
        if ($admin) {
            if (Hash::check($data['password'], $admin['password'])) {
                $userDetail = [
                    'id' => $admin['id'],
                    'username' => $admin['username'],
                ];
    
                session(['user_detail' => $userDetail]);

                return redirect(route('dashboard'));
            } else {
                return redirect()->back()->with('error-login', 'Password not match!');
            }
        } else {
            return redirect()->back()->with('error-login', 'User not registered!');
        }
    }

    /**
     * Function to handle logout page. 
     *
     * @param   collection      $request    User's Request
     * @return  void
     */
    public function logout(Request $request) 
    {   
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
}
