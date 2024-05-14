<?php

namespace App\Http\Controllers;

use App\Models\Parents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ParentController extends Controller
{
    public function index()
    {
        return view('user.dashboard');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username'  => 'required',
            'email' => 'required|email|unique:parents,email',
            // 'noWa'  => 'required|unique:parents,no_wa',
            'password'  => 'required|min:8',
            'password2' => 'required|same:password'
        ], [
            'username.required' => 'Masukkan nama pengguna!',
            'email.email' => 'Masukkan email dengan benar!',
            'email.unique' => 'Email yang anda masukkan sudah dimiliki',
            // 'noWa.unique' => 'Nomer whatsaap yang anda masukkan sudah dimiliki',
            'email.required' => 'Masukkan email anda!',
            // 'noWa.required' => 'Masukkan nomer whatsaap anda!',
            // 'noWa.integer' => 'Masukkan angka!',
            'password.required' => 'Masukkan kata sandi!',
            // 'password.confirmed' => 'Kata sandi yang anda masukkan berbeda',
            'password.min' => 'Kata sandi minimal 8 karakter',
            'password2.same' => 'Kata sandi yang anda masukkan berbeda',
            'password2.required' => 'Masukkan konfirmasi kata sandi!'
        ]);

        //Simpan data username, email, dan password ke dalam sesi
        session(['register_data' => [
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ]]);
        // $register_data = [
        //     'username' => $request->username,
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ];

        // Redirect ke halaman verifikasi OTP
        return redirect()->route('user.wa');
    }

    public function sendOtp(Request $request)
    {
        $request->validate([
            'noWa'  => 'required|unique:parents,no_wa|min:10',
            'check' => 'required'

        ], [
            'noWa.unique' => 'Nomer yang anda masukkan sudah terdaftar',
            'noWa.required' => 'Masukkan nomer whatsaap anda!',
            'noWa.min' => 'Masukkan minimal 10 angka!',
            'check.required' => 'Harap lengkapi data diatas'
        ]);
        // enkripsi
        $encryptedNoWa = bcrypt($request->noWa);

        $inputData = [
            'no_wa' => $encryptedNoWa,
        ];

        // Simpan data wa ke database
        Parents::create($inputData);

        session(['no_wa' => $encryptedNoWa]);
        // Kirim OTP ke nomor whatsapp pengguna
        $nomor = $request->noWa;
        $otp = rand(100000, 999999);
        Parents::where('no_wa', $encryptedNoWa)->update(['otp' => $otp]);
        $data = [
            'target' => $nomor,
            'message' => "OTP anda : " . $otp
        ];
        $response = Http::withHeaders([
            'Authorization' => env('FONNTE_API_TOKEN')
        ])->post('https://api.fonnte.com/send', $data);

        return redirect()->route('user.otp');
    }

    public function virifyOtp(Request $request)
    {
        // Ambil data username, email, dan password dari sesi
        $registerData = session('register_data');

        // ambil data no whatsaap dari sesi
        $nomor = session('no_wa');
        // dd($nomor);
        // Validasi OTP
        $otp = implode('', $request->otp);

        $validOtp = Parents::where('no_wa', $nomor)->where('otp', $otp)->first();
        if ($validOtp) {

            // Hapus data username, email, dan password dari sesi
            session()->forget('register_data');

            // Simpan data username, email, dan password ke dalam database
            $inputData = [
                'username' => $registerData['username'],
                'email' => $registerData['email'],
                'password' => bcrypt($registerData['password']),
            ];
            Parents::where('no_wa', $nomor)->update($inputData);
            // Redirect ke halaman selanjutnya
            return redirect()->route('login')->with('success', 'Akun anda Berhasil dibuat👌');
        } else {
            // Redirect ke halaman verifikasi OTP kembali

            return redirect()->route('user.otp')->with('error', 'OTP yang anda masukkan salah!');
        }
    }

    public function sendAgain()
    {
        // ambil data no whatsaap dari sesi
        $nomor = session('no_wa');

        if ($nomor) {
        }
    }

    public function indexSchedule()
    {
        return view('user-schedule');
    }

    // public function register(Request $request)
    // {
    //     // dd($request);
    //     $request->validate([
    //         'username'  => 'required',
    //         'email' => 'required|email|unique:parents,email',
    //         // 'noWa'  => 'required|unique:parents,no_wa',
    //         'password'  => 'required|min:8',
    //         'password2' => 'required|same:password'
    //     ], [
    //         'username.required' => 'Masukkan nama pengguna!',
    //         'email.email' => 'Masukkan email dengan benar!',
    //         'email.unique' => 'Email yang anda masukkan sudah dimiliki',
    //         // 'noWa.unique' => 'Nomer whatsaap yang anda masukkan sudah dimiliki',
    //         'email.required' => 'Masukkan email anda!',
    //         // 'noWa.required' => 'Masukkan nomer whatsaap anda!',
    //         // 'noWa.integer' => 'Masukkan angka!',
    //         'password.required' => 'Masukkan kata sandi!',
    //         // 'password.confirmed' => 'Kata sandi yang anda masukkan berbeda',
    //         'password.min' => 'Kata sandi minimal 8 karakter',
    //         'password2.same' => 'Kata sandi yang anda masukkan berbeda',
    //         'password2.required' => 'Masukkan konfirmasi kata sandi!'
    //     ]);

    //     // $data = Parents::create([
    //     //     'username' => $request->username,
    //     //     'email' => $request->username,
    //     //     'no_wa' => $request->noWa,
    //     //     'password' => bcrypt($request->password),
    //     // ]);
    //     $nomor = $request->noWa;

    //     $inputData = [
    //         'username' => $request->username,
    //         'email' => $request->email,
    //         'no_wa' => $nomor,
    //         'password' => bcrypt($request->password),
    //     ];
    //     // mengirim otp
    //     if ($nomor) {
    //         DB::table('parents')->where('no_wa', $nomor)->update(['otp' => null]);
    //         $otp = rand(100000, 999999);
    //         // $password = bcrypt($request->password);
    //         Parents::create([
    //             // 'username' => $request->username,
    //             // 'email' => $request->email,
    //             'no_wa' => $nomor,
    //             // 'password' => $password,
    //             'otp' => $otp,
    //         ]);
    //         $data = [
    //             'target' => $nomor,
    //             'message' => "udah diem aja 😜 : " . $otp
    //         ];
    //         $response = Http::withHeaders([
    //             'Authorization' => env('FONNTE_API_TOKEN')
    //         ])->post('https://api.fonnte.com/send', $data);
    //         return redirect()->to(route('user.otp'));
    //     }
    // }

    // public function CheckOtp(Request $request)
    // {


    //     if ($request->isMethod('post') && $request->has('submit-login')) {
    //         $otp = $request->input('otp');
    //         $nomor = $request->input('nomor');
    //         $otp_record = DB::table('parents')->where('nomor', $nomor)->where('otp', $otp)->first();
    //         if ($otp_record) {
    //             $expiry_time = $otp_record->waktu + 300;
    //             if (time() <= $expiry_time) {
    //                 echo "otp benar";
    //             } else {
    //                 echo "otp expired";
    //             }
    //         } else {
    //             echo "otp salah";
    //         }
    //     }
    // }
}
