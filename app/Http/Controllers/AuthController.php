<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login', [
            'title' => 'Sign In',
            'active' => 'Sign In'
        ]);
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            //cek user active atau tidak
            $user = Auth::user();
            if ($user->is_active == 1) {
                // cek role
                if ($user->role_id == '1') {
                    return redirect()->route('dashboard-bendahara');
                } else if ($user->role_id == '2') {
                    return redirect()->route('dashboard-manajer');
                } else if ($user->role_id == '3') {
                    return redirect()->route('dashboard-pemeriksa');
                } else if ($user->role_id == '4') {
                    return redirect()->route('dashboard-pemohon');
                }
            } else {
                // return redirect()->route('auth-login')->with('status', 'Akun anda tidak aktif, silahkan hubungi admin!');
                //buatkan kembali ke halaman eror dan tinggalkan pesan error
                return redirect()->route('auth-login')->with('error', 'Akun anda tidak aktif, silahkan hubungi admin!');
            }
        }
        return redirect()->route('auth-login')->with('status', 'Email atau kata sandi Anda salah!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function forgot_password()
    {
        return view(
            'auth.forgot-password',
            ['title' => 'Forgot Password']
        );
    }

    public function action_forgot_password(Request $request)
    {
        $title = 'Forgot Password';
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
        $user = User::where('email', $request->email)->first();
        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        // Kirim Email
        // Mail::send('auth.email-reset-password', ['token' => $token], function ($message) use ($request) {
        //     $message->to($request->email);
        //     $message->subject('Reset Password');
        // });

        //Kirim WhatsApp
        $kirim = $this->sendWhatsApp($user->no_hp, $token);
        if ($kirim) {
            return back()->with('message', 'Kami telah mengirimkan tautan setel ulang kata sandi Anda melalui WhatsApp!');
        } else {
            return back()->with('error', 'Kami gagal mengirimkan tautan setel ulang kata sandi Anda melalui WhatsApp!');
        }
    }

    public function reset_password($token)
    {
        return view(
            'auth.reset-password',
            [
                'title' => 'Reset Password',
                'token' => $token
            ]
        );
    }

    public function action_reset_password(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|same:password'
        ]);

        $updatePassword = DB::table('password_resets')
            ->where([ 
                'token' => $request->token
            ])
            ->first();

        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Token tidak valid!');
        }

        $email =  $updatePassword->email;

        User::where('email', $email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $email])->delete();

        return redirect()->route('auth-login')->with('status', 'Kata sandi Anda telah diubah!');
    }
    
    function sendWhatsApp($phone=null, $tokenpassword=null)
    {
        $curl = curl_init();
        $token = "gvbDmLUMUkrsoRuWelzKZU9J88zhHbu0PJizx5QTlCRkda2s7Ne5BoGsApUZ4SI3";
        $message = "*Reset Kata Sandi*\n\nAnda dapat mengatur ulang kata sandi dari tautan di bawah ini:\n\n[Reset Kata Sandi]\n\nhttps://evouching.pncapps.site/reset-password/" . $tokenpassword . "\n\nTerima Kasih";
        $encodedMessage = urlencode($message);
        $url = "https://solo.wablas.com/api/send-message?phone=$phone&message=$encodedMessage&token=$token";

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($curl);
        curl_close($curl);

        return true;
    }
}
