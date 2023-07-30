<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $id = Auth::user()->id;
        $data = User::find($id);
        $username = $data->name;

        $request->session()->regenerate();
        $notification = array(
            'message' => 'Pengguna '.$username. ' Berhasil Login',
            'alert-type' => 'success',
        );
        $url = '';
        if ($request->user()->role === 'admin') {
            $url = 'admin/dashboard';
        }elseif ($request->user()->role === 'guru') {
            $url = 'guru/dashboard';
        }elseif ($request->user()->role === 'siswa') {
            $url = 'siswa/dashboard';
        }else{
            $url = '/dashboard';
        }

        return redirect()->intended($url)->with($notification);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $username = $data->name;
        $request->authenticate();
        
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $notification = array(
            'message' => 'Pengguna '.$username. ' Berhasil Login',
            'alert-type' => 'success',
        );

        return redirect('/login')->with($notification);
    }
}
