<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\ChildSchedule;
use App\Models\Schedule;
use App\Models\Vaccines;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Expr\Cast\String_;

class ChildController extends Controller
{
    protected function getAge($birthdate)
    {
        $birthdate = new DateTime($birthdate);
        $now = new DateTime();
        $age = $now->diff($birthdate);

        return [
            'years' => $age->y,
            'months' => $age->m
        ];
    }
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
        $schedules = Schedule::all();
        $vaccines = Vaccines::all();
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
            return view('dashboard', ['childs' => $childs_with_age], compact('vaccines', 'schedules'));
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
        $data = [
            'name' => $request->name,
            'date_of_birth' => $request->date,
            'gender' => $request->gender,
            'id_parent' => $user->id_parent
        ];

        $childId = Child::create($data);
        // dd($data);
        if ($childId) {
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
        $events = [];
        $children = Child::all();
        $immunizationSchedules = Schedule::all();

        foreach ($children as $child) {
            $age = $this->getAge($child->date_of_birth);
            $childTotalMonths = ($age['years'] * 12) + $age['months'];

            foreach ($immunizationSchedules as $schedule) {
                $scheduleTotalMonths = ($schedule->year * 12) + $schedule->month;

                if ($scheduleTotalMonths >= $childTotalMonths) {
                    $eventDate = (new DateTime($child->date_of_birth))->modify("+{$scheduleTotalMonths} months");
                    $events[] = [
                        'title' => 'Imunisasi ' . $child->name,
                        'start' => $eventDate->format('Y-m-d'),
                        'allDay' => true
                    ];
                }
            }
        }

        return response()->json($events);
    }
    public function events2()
    {
        $events = [];

        $idParent = auth()->guard('parent')->id();

        $events = [];
        // $childSchedules = ChildSchedule::with(['child', 'schedule'])->get();
        $childSchedules = ChildSchedule::with(['child', 'schedule'])
            ->whereHas('child', function ($query) use ($idParent) {
                $query->where('id_parent', $idParent)->where('status', 'belum');
            })
            ->get();
        // $childSchedules = ChildSchedule::with(['child', 'schedule'])->get();

        foreach ($childSchedules as $childSchedule) {
            $child = $childSchedule->child;
            $schedule = $childSchedule->schedule;

            $vaccines = Vaccines::where('id_schedule', $schedule->id_schedule)->get();
            $vaccineTypes = array_map(function ($vaccine) {
                return $vaccine['type_vaccine'];
            }, $vaccines->toArray());

            if ($child && $schedule && $vaccines) {
                // Hitung umur anak
                $age = $this->getAge($child->date_of_birth);
                $totalMonths = ($age['years'] * 12) + $age['months'];

                // Hitung tanggal imunisasi berdasarkan schedule
                $immunizationDate = (new DateTime($child->date_of_birth))
                    ->modify("+{$schedule->year} years")
                    ->modify("+{$schedule->month} months");
                // ->setTime(00, 00);


                // Tambahkan event ke array
                $events[] = [
                    'id_child'    => $child->id,
                    'id_schedule'    => $schedule->id_schedule,
                    'title' => 'Imunisasi ' . $child->name,
                    'start' => $immunizationDate->format('Y-m-d'),
                    'allDay' => true,
                    'status' => $childSchedule->status,
                    'vaccines' => $vaccineTypes, // Add vaccines data here
                ];
                // // Hitung tanggal notifikasi (5 hari sebelum tanggal imunisasi)
                // $notificationDate = (clone $immunizationDate)->modify('-1 days');
                // $currentDateTime = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
                // // Hitung tanggal notifikasi (3 hari sebelum tanggal imunisasi)
                // $notificationDate = $immunizationDate;
                // $notificationDate->setTime(15, 30, 00);

                // dd($notificationDate->format('Y-m-d H:i'), $currentDateTime->format('Y-m-d H:i'));
                // // Kirim notifikasi jika tanggal notifikasi adalah hari ini
                // if ($immunizationDate->format('Y-m-d H:i') == $currentDateTime->format('Y-m-d H:i')) {
                //     $this->sendWhatsAppNotification($child, $immunizationDate);
                // } else {
                //     dd("Notif not today");
                // }
            }
        }

        return response()->json($events);
    }
    private function sendWhatsAppNotification($child, $immunizationDate)
    {
        $decryptNoWa = Crypt::decryptString($child->parent->no_wa);
        $phoneNumber = $decryptNoWa; // Asumsikan ada kolom no_wa di tabel child
        // dd($phoneNumber);
        $message = "Reminder: Anak Anda, {$child->name}, memiliki jadwal imunisasi pada tanggal {$immunizationDate->format('Y-m-d')}(5 hari lagi)😊.";

        // $notificationDate->setTime(00, 37, 0);
        // Mengonversi tanggal notifikasi menjadi UNIX timestamp
        // $scheduleTimestamp = $notificationDate->getTimestamp();
        // dd($notificationDate->format('Y-m-d H:i:s'));
        $data = [
            'target' => $phoneNumber,
            'message' => $message,
            // 'schedule' => $scheduleTimestamp,
            'countryCode' => '62', // Optional
        ];
        $response = Http::withHeaders([
            'Authorization' => env('FONNTE_API_TOKEN'), // Ambil token dari environment
        ])->post('https://api.fonnte.com/send', $data);

        if ($response->successful()) {
            return "Notifikasi terkirim: " . $response->body();
        } else {
            return "Gagal mengirim notifikasi: " . $response->body();
        }
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
