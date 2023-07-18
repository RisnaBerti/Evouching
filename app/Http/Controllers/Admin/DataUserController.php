<?php

namespace App\Http\Controllers\Admin;

use Twilio\Rest\Client;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
            'email' => 'required|email|unique:users,email',
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

        // return "success";
        return redirect()->route('datauser')->with(['success' => 'User berhasil ditambahkan']);
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
        $user = User::find($id);
        $user->is_active = "1";
        $user->update();

        $sid    = "AC3b9deb3c57406702247d878eddb287da";
        $token  = "0b3bc836b58827ec36b6ce397249001c";
        $twilio = new Client($sid, $token);

        $message = $twilio->messages
        ->create(
            "whatsapp:+6285155456806", // to
            array(
                "from" => "whatsapp:+14155238886",
                "body" => "*GERAK SEDEKAH CILACAP*" .
                    "\n============================".
                    "\nHallo!!".
                    "\nAkun E-Vouching Anda Sudah Diaktifkan" .
                    "\nTerima Kasih" .
                    "\n============================"

            )
        );

        return redirect()->route('datauser')->with(['success' => 'User berhasil diaktifkan']);
    }

    //fungsi active user
    public function nonactive($id)
    {
        $user = User::find($id);
        $user->is_active = "0";
        $user->update();

        $sid    = "AC3b9deb3c57406702247d878eddb287da";
        $token  = "0b3bc836b58827ec36b6ce397249001c";
        $twilio = new Client($sid, $token);

        $message = $twilio->messages
        ->create(
            "whatsapp:+6285155456806", // to
            array(
                "from" => "whatsapp:+14155238886",
                "body" => "*GERAK SEDEKAH CILACAP*" .
                    "\n============================".
                    "\nHallo!!".
                    "\nAkun E-Vouching Anda Di Nonaktifkan" .
                    "\nTerimakasih" .
                    "\n============================"

            )
        );
        return redirect()->route('datauser')->with(['success' => 'User berhasil diaktifkan']);
    }

    public function destroy(Request $request)
    {
        //delete post
        User::where('id', $request->id_hapus)->delete();
        //redirect to index
        return redirect()->route('datauser')->with(["success"]);
    }
}
