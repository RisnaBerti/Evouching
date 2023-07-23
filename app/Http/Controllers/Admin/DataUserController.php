<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Twilio\Rest\Client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Console\View\Components\Alert;

class DataUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.data-user', [
            'users' => $users,
            'title' => 'Data User',
            'active' => 'Data User'
        ]);
    }

    // public function cek()
    // {
    //     $user = Auth::user();
    //     var_dump($user);
    // }

    //fungsi add user
    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'no_hp' => 'required|numeric|digits_between:10,13',
            'divisi' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required',
        ]);

        
        User::create(
            [
                'id' => str_replace('-', '', Str::uuid()),
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt(12345678),
                'no_hp' => $request->no_hp,
                'divisi' => $request->divisi,
                'jabatan' => $request->jabatan,
                'alamat' => $request->alamat,
                'is_active' => 1,
                'role_id' => 4,
            ]
        );

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        return response()->json('success');

        // return "success";
        // return redirect()->route('datauser')->with(['success' => 'User berhasil ditambahkan']);
    }

    //fungsi edit user
    public function edit(Request $request)
    {
        if (!$request->id == Auth::id()) {

            $request->validate([
                'email' => 'required|email|unique:users,email'
            ]);
        }

        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->divisi = $request->divisi;
        $user->jabatan = $request->jabatan;
        $user->alamat =  $request->alamat;
        $user->update();

        return "success";
    }

    //fungsi active user
    public function active($id)
    {
        // Find the user with the provided ID.
        $user = User::find($id);

        // Check if the user exists.
        if (!$user) {
            return redirect()->route('datauser')->with(['error' => 'User tidak ditemukan']);
        }

        $user->is_active = "1";
        $user->update();

        // Call the sendWhatsAppNonActive function to send a WhatsApp message.
        $this->sendWhatsAppActive($user);

        return redirect()->route('datauser')->with(['success' => 'User berhasil diaktifkan']);
    }

    private function sendWhatsAppActive($user)
    {
        $curl = curl_init();
        $token = "gvbDmLUMUkrsoRuWelzKZU9J88zhHbu0PJizx5QTlCRkda2s7Ne5BoGsApUZ4SI3";
        $phone = $user->no_hp;

        $message = "*SISTEM INFORMASI E-VOUCHING GSC*
==============================
Nama                    : " . $user->name . "
Jabatan                 : " . $user->jabatan . "
Divisi                  : " . $user->divisi . "
==============================
*AKUN E-VOUCHING ANDA SUDAH DI AKTIFKAN*
Terimakasih
==============================";

        $encodedMessage = urlencode($message);
        $url = "https://solo.wablas.com/api/send-message?phone=$phone&message=$encodedMessage&token=$token";

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($curl);
        curl_close($curl);

        return true;
    }


    public function nonactive($id)
    {
        // Find the user with the provided ID.
        $user = User::find($id);

        // Check if the user exists.
        if (!$user) {
            return redirect()->route('datauser')->with(['error' => 'User tidak ditemukan']);
        }

        // Update the is_active attribute to "0" to deactivate the user.
        $user->is_active = "0";
        $user->update();

        // Call the sendWhatsAppNonActive function to send a WhatsApp message.
        $this->sendWhatsAppNonActive($user);

        // Redirect back to the datauser route with a success message.
        return redirect()->route('datauser')->with(['success' => 'User berhasil diaktifkan']);
    }

    private function sendWhatsAppNonActive($user)
    {
        $curl = curl_init();
        $token = "gvbDmLUMUkrsoRuWelzKZU9J88zhHbu0PJizx5QTlCRkda2s7Ne5BoGsApUZ4SI3";
        $phone = $user->no_hp;

        $message = "*SISTEM INFORMASI E-VOUCHING GSC*
==============================
Nama                    : " . $user->name . "
Jabatan                 : " . $user->jabatan . "
Divisi                  : " . $user->divisi . "
==============================
*AKUN E-VOUCHING ANDA SUDAH DI NON-AKTIFKAN*
Terimakasih
==============================";

        $encodedMessage = urlencode($message);
        $url = "https://solo.wablas.com/api/send-message?phone=$phone&message=$encodedMessage&token=$token";

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($curl);
        curl_close($curl);

        return true;
    }


    // public function destroy(Request $request)
    // {
    //     //delete post
    //     User::where('id', $request->id_hapus)->delete();
    //     //redirect to index
    //     return redirect()->route('datauser')->with(["success"]);
    // }
}
