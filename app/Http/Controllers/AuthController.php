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

        return redirect()->route('auth-login')->with('status', 'Your email or password is incorrect!');
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
        //$token = '123000';

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
            // 'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|same:password'
        ]);

        $updatePassword = DB::table('password_resets')
            ->where([
                //   'email' => $request->email, 
                'token' => $request->token
            ])
            ->first();

        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $email =  $updatePassword->email;

        User::where('email', $email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $email])->delete();

        return redirect()->route('auth-login')->with('message', 'Your password has been changed!');
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


    // function sendMail()
    // {
    //     require base_path("vendor/autoload.php");
    //     $mail = new PHPMailer(true);     // Passing `true` enables exceptions

    //     try {
    //         // Email server settings
    //         // Send using SMTP
    //         $mail->isSMTP();
    //         $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
    //         $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    //         $mail->Username   = 'gabudbanget@gmail.com';                   // SMTP username
    //         $mail->Password   = 'G4bud#123';      // sender password
    //         $mail->SMTPSecure = 'ssl';                  // encryption - ssl/tls
    //         $mail->Port = 465;                          // port - 587/465


    //         $mail->setFrom('gabudbanget@gmail.com', 'Bendahara');
    //         $mail->addAddress('grizenzioorchivillando@gmail.com', 'Grizenzio Orchivillando');
    //         // $mail->addCC($request->emailCc);
    //         // $mail->addBCC($request->emailBcc);

    //         // $mail->addReplyTo('sender@example.com', 'SenderReplyName');

    //         if (isset($_FILES['emailAttachments'])) {
    //             for ($i = 0; $i < count($_FILES['emailAttachments']['tmp_name']); $i++) {
    //                 $mail->addAttachment($_FILES['emailAttachments']['tmp_name'][$i], $_FILES['emailAttachments']['name'][$i]);
    //             }
    //         }


    //         $mail->isHTML(true);
    //         $token = Str::random(64);
    //         // DB::table('password_resets')->insert([
    //         //     'email' => $request->email,
    //         //     'token' => $token,
    //         //     'created_at' => Carbon::now()
    //         // ]);              // Set email content format to HTML

    //         $mail->Subject = 'Reset Password';
    //         $mail->Body    = '<h3>Lupa Kata Sandi Email</h3> Anda dapat mengatur ulang kata sandi dari tautan di bawah ini: <a href="' . route('auth-reset-password', $token) . '">Reset Password</a>';

    //         // $mail->AltBody = plain text version of email body;

    //         if (!$mail->send()) {
    //             //return back()->with("failed", "Email not sent.")->withErrors($mail->ErrorInfo);
    //             echo 'Message could not be sent.';
    //         } else {
    //             //return back()->with("success", "Email has been sent.");
    //             echo 'Message has been sent';
    //         }
    //     } catch (Exception $e) {
    //         //return back()->with('error', 'Message could not be sent.');
    //         echo 'Message could not be sent.';
    //     }
    // }

   
}
