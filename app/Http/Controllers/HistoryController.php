<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\ChildSchedule;
use App\Models\History;
use App\Models\Schedule;
use App\Models\Vaccines;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
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
    public function indexHistory()
    {
        $auth = Auth::guard('parent')->check();
        if ($auth) {
            $parent = Auth::guard('parent')->user()->id_parent;
            $childs = Child::where('id_parent', $parent)->get();
            $childs_with_data = [];

            foreach ($childs as $child) {
                $id_child = $child->id;
                $birthDate = $child->date_of_birth;
                $age = $this->calculateAge($birthDate);
                $history = History::where('id_child', $id_child)->get();
                $vaccines = Vaccines::all();

                $histories_with_vaccines = [];
                foreach ($history as $entry) {
                    $schedule = Schedule::with('vaccines')->where('id_schedule', $entry->id_schedule)->first();
                    $entry->schedule = $schedule;  // Attach schedule with vaccines to the history entry
                    $histories_with_vaccines[] = $entry;
                }

                $childs_with_data[] = [
                    'child' => $child,
                    'age' => $age,
                    'id_child' => $id_child,
                    'history' => $histories_with_vaccines,
                    'vaccines' => $vaccines
                ];
            }

            return view('history-immunization', ['childs' => $childs_with_data]);
        }
    }

    public function insertHistory(Request $request)
    {
        // dd($request->all());
        $inserData = History::create([
            'immunization_date' => $request->date,
            'id_child' => $request->id_child,
            'id_schedule' => $request->id_schedule
        ]);

        if ($inserData) {
            // Update status pada tabel ChildSchedule
            ChildSchedule::where('id_schedule', $request->id_schedule)
                ->where('id_child', $request->id_child)
                ->update(['status' => 'sudah']);

            // Kembali ke view dengan pesan sukses
            return redirect()->route('user.history')->with('success', 'Data dimasukkan ke riwayat imunisasi');
        } else {
            // Jika penyimpanan gagal, kembali dengan pesan error
            return redirect()->back()->with('error', 'Gagal memasukkan data ke riwayat imunisasi');
        }
    }
}
