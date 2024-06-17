<?php

namespace App\Http\Controllers;

use App\Models\InformationVaccine;
use App\Models\Parents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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

        // Ambil semua entri no_wa dari database
        $parents = Parents::all('no_wa');
        foreach ($parents as $parent) {
            $decryptedNoWa = Crypt::decryptString($parent->no_wa);
            if ($decryptedNoWa == $request->noWa) {
                return redirect()->back()->with('error', 'Nomor yang Anda masukkan sudah terdaftar');
            }
        }
        // enkripsi
        $encryptedNoWa = Crypt::encryptString($request->noWa);

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
        $passwordHash = Hash::make($registerData['password']);
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
                'password' => $passwordHash,
            ];
            Parents::where('no_wa', $nomor)->update($inputData);
            // Redirect ke halaman selanjutnya
            return redirect()->route('login')->with('success', 'Akun anda Berhasil dibuat👌');
        } else {
            // Redirect ke halaman verifikasi OTP kembali

            return redirect()->route('user.otp')->with('error', 'OTP yang anda masukkan salah!');
        }
    }
    public function sendAgainIndex()
    {
        return view('change-wa');
    }

    public function changeNoWa(Request $request)
    {
        $request->validate([
            'noWa'  => 'required|unique:parents,no_wa|min:10',
            'check' => 'required'
        ], [
            'noWa.unique' => 'Nomor yang anda masukkan sudah terdaftar',
            'noWa.required' => 'Masukkan nomor WhatsApp anda!',
            'noWa.min' => 'Masukkan minimal 10 angka!',
            'check.required' => 'Harap lengkapi data diatas'
        ]);

        // Enkripsi nomor WhatsApp baru
        $encryptedNoWa = Crypt::encryptString($request->noWa);

        // Simpan nomor WhatsApp baru ke dalam database
        Parents::where('no_wa', session('no_wa'))->update(['no_wa' => $encryptedNoWa]);

        // Simpan nomor WhatsApp baru ke dalam session
        session(['no_wa_change' => $encryptedNoWa]);

        // Kirim OTP baru ke nomor WhatsApp baru
        $otp = rand(100000, 999999);
        Parents::where('no_wa', $encryptedNoWa)->update(['otp' => $otp]);

        // Kirim OTP via API
        $data = [
            'target' => $request->noWa,
            'message' => "OTP anda : " . $otp
        ];
        $response = Http::withHeaders([
            'Authorization' => env('FONNTE_API_TOKEN')
        ])->post('https://api.fonnte.com/send', $data);

        return redirect()->route('user.otp.change');
    }

    public function verifyOtpAgain(Request $request)
    {
        // Ambil data username, email, dan password dari sesi
        $registerData = session('register_data');
        $passwordHash = Hash::make($registerData['password']);

        // Ambil nomor WhatsApp baru dari session
        $nomor = session('no_wa_change');

        // Validasi OTP
        $otp = implode('', $request->otp);

        // Periksa kecocokan OTP
        $validOtp = Parents::where('no_wa', $nomor)->where('otp', $otp)->first();

        if ($validOtp) {
            // Hapus data username, email, dan password dari sesi
            session()->forget('register_data');

            // Simpan data username, email, dan password ke dalam database
            $inputData = [
                'username' => $registerData['username'],
                'email' => $registerData['email'],
                'password' => $passwordHash,
            ];
            Parents::where('no_wa', $nomor)->update($inputData);

            // Redirect ke halaman login setelah berhasil
            return redirect()->route('login')->with('success', 'Akun anda Berhasil dibuat👌');
        } else {
            // Redirect ke halaman verifikasi OTP dengan pesan error
            return redirect()->route('user.otp')->with('error', 'OTP yang anda masukkan salah!');
        }
    }
    public function indexSchedule()
    {
        return view('user-schedule');
    }

    public function indexInformationVaccine()
    {
        $information = InformationVaccine::paginate(10);
        return view('informasi', compact('information'));
    }
    public function showInformation(string $id)
    {
        $detail = InformationVaccine::where('id_information', $id)->first();
        if (!$detail) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        return view('detail-informasi', compact('detail'));
    }

    public function profile()
    {
        $parent = Auth::guard('parent')->user();
        $decryptNoWa = Crypt::decryptString($parent->no_wa);
        return view('profile', compact('decryptNoWa'));
    }

    public function searchInformation(Request $request)
    {
        $query = $request->input('query');
        $information = InformationVaccine::where('heading', 'LIKE', "%$query%")
            ->orWhere('body', 'LIKE', "%$query%")
            ->paginate(10);

        return view('search-result', compact('information'));
    }

    public function editProfile()
    {
        $parent = Auth::guard('parent')->user();
        $decryptNoWa = Crypt::decryptString($parent->no_wa);
        return view('edit-profile', compact('decryptNoWa', 'parent'));
    }

    public function updateProfile(Request $request)
    {
        $data = [];
        $id_parent = Auth::guard('parent')->user()->id_parent;
        $inputData = Parents::where('id_parent', $id_parent)->update([
            'email' => $request->email,
            'username' => $request->name,
            'no_wa' => Crypt::encryptString($request->noWa),
        ]);

        if ($inputData) {
            return redirect()->route('user.profile')->with('success', 'Data berhasil diubah');
        } else {
            return redirect()->back()->with('error', 'Data gagal diubah');
        }
    }

    public function indexchangePassword()
    {
        return view('change-password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password1' => [
                'required',
                'min:8',
                function ($attribute, $value, $fail) {
                    $user = Auth::user();
                    $hashedPassword = $user->password;
                    if (!Hash::check($value, $hashedPassword)) {
                        $fail('Kata sandi yang lama salah!, silahkan coba lagi!');
                    }
                },
            ],
            'password2' => 'required|min:8',
            'password3' => 'required|same:password2',
        ], [
            'password1.required' => 'Masukkan kata sandi yang lama!',
            'password2.required' => 'Masukkan kata sandi yang baru!',
            'password2.min' => 'Kata sandi minimal 8 karakter',
            'password3.same' => 'Kata sandi yang anda masukkan berbeda',
            'password3.required' => 'Masukkan konfirmasi kata sandi!'
        ]);

        $user = Auth::guard('parent')->user();
        $id_parent = $user->id_parent;

        $inputData = Parents::where('id_parent', $id_parent)->update([
            'password' => Hash::make($request->password2),
        ]);
        if ($inputData) {
            return redirect()->route('user.profile')->with('success', 'Kata sandi anda Berhasil diubah👌');
        } else {
            return redirect()->back()->with('error', 'Kata sandi anda gagal diubah');
        }
    }
}
