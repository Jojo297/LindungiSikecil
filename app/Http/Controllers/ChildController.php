<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\ChildSchedule;
use App\Models\Schedule;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\String_;

class ChildController extends Controller
{


    public function calculateAge($birthDate)
    {
        $today = new DateTime();
        $birthDate = DateTime::createFromFormat('Y-m-d', $birthDate);
        $interval = $today->diff($birthDate);

        $years = $interval->y;
        $months = $interval->m;
        $days = $interval->d;

        if ($years < 1) {
            if ($months < 1) {
                return $days . ' hari';
            } else {
                return '0 tahun ' . $months . ' bulan';
            }
        } else {
            return $years . ' tahun ' . $months . ' bulan';
        }
    }

    public function index()
    {
        $auth = Auth::guard('parent')->check();
        // $child = Child::first(); // Ambil data anak pertama
        if ($auth) {
            // dd($auth);
            $parent = Auth::guard('parent')->user()->id_parent;
            // dd($parent);
            $childs = Child::where('id_parent', $parent)->get();
            $childs_with_age = [];
            foreach ($childs as $child) {
                $id_child = $child->id;
                $birthDate = $child->date_of_birth;
                $age = $this->calculateAge($birthDate);
                $childs_with_age[] = ['child' => $child, 'age' => $age, 'id_child' => $id_child];
            }
            return view('dashboard', ['childs' => $childs_with_age]);
        } else {
            return route('login.user');
        }
    }

    public function childSchedule()
    {

        // Ambil semua data anak
        $children = Child::all();

        // Iterasi setiap anak
        foreach ($children as $child) {
            // Hitung umur anak
            $birthday = new DateTime($child->date_of_birth);
            $today = new DateTime();
            $interval = $today->diff($birthday);
            $years = $interval->y;
            $months = $interval->m;

            // Ambil jadwal imunisasi yang sesuai
            $schedule = Schedule::where('year', $years)->where('month', $months)->first();

            // Jika jadwal imunisasi ditemukan, simpan ke tabel child_schedule
            if ($schedule) {
                ChildSchedule::create([
                    'id_child' => $child->id,
                    'id_schedule' => $schedule->id_schedule,
                    'status' => 'belum'
                ]);
            }
        }
    }

    public function addChild(Request $request)
    {
        $user = Auth::guard('parent')->user();

        $data = Child::create([
            'name' => $request->name,
            'date_of_birth' => $request->date,
            'gender' => $request->gender,
            'id_parent' => $user->id_parent
        ]);
        if ($data->save()) {
            // redirect
            return redirect()->route('user.dashboard')->with('success', 'Data berhasil ditambahkan');
        } else {
            toastr()->error('Data gagal ditambahkan', 'Gagal');
            return redirect()->back()->with([
                'error' => 'Data gagal disimpan!'
            ]);
        }
    }
    public function events()
    {
        $events = Child::all();

        return response()->json($events);
    }
    public function indexChildProfile(String $id)
    {
        $child = Child::find($id);
        $birthDate = $child->date_of_birth;
        $age = $this->calculateAge($birthDate);
        return view('child-profile', compact('child', 'age'));
    }
    public function childDelete(String $id)
    {
        $child = Child::find($id);
        if ($child->delete()) {
            return redirect()->route('user.dashboard')->with('success', 'Data berhasil di hapus');
        } else {
            return redirect()->back()->with('error', 'Data gagal di hapus');
        }
    }
    public function childEdit(String $id)
    {
        $child = Child::find($id);
        return view('edit-child', compact('child'));
    }
    public function childUpdate(Request $request, String $id)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required|date',
            'gender' => 'in:Laki-laki,Perempuan',
        ], [
            'name.required' => 'Masukkan nama anak!',
            'date.required' => 'Masukkan tanggal lahir anak!',
            'gender.required' => 'Masukkan gender anak!',
        ]);

        $inputData = Child::where('id', $id)->update([
            'name' => $request->name,
            'date_of_birth' => $request->date,
            'gender' => $request->gender
        ]);

        if ($inputData) {
            return redirect()->route('user.child.profile', ['id' => $id])->with('success', 'Data berhasil di ubah');
        } else {
            return redirect()->back()->with('error', 'Data gagal di ubah');
        }
    }
}
