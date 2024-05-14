<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\ChildSchedule;
use App\Models\Schedule;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
                $birthDate = $child->date_of_birth;
                $age = $this->calculateAge($birthDate);
                $childs_with_age[] = ['child' => $child, 'age' => $age];
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
}
