<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function authenticated(Request $request, $user)
    {
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'customer') {
            return redirect()->route('customer.dashboard');
        } elseif ($user->role === 'joki') {
            return redirect()->route('joki.dashboard');
        } else {
            Auth::logout(); // jika role tidak dikenali
            return redirect('/login')->withErrors(['role' => 'Role tidak dikenali.']);
        }
    }
}
