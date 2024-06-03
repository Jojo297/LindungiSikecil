<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Vaccines;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function indexSchedule(): View
    {
        $schedules = Schedule::with('vaccines')->orderBy('year', 'asc')->orderBy('month', 'asc')->get();
        // Ambil semua vaksin yang berelasi dengan schedule
        $vaccines = Vaccines::all();
        // $vaccines = Schedule::with('vaccines')->get();
        // dd($schedules);
        return view('admin.schedule', compact('schedules', 'vaccines'));
    }
    public function insertSchedule(Request $request)
    {
        // dd($request->all());
        $vaksin = $request->input('faksin');
        // dd($vaksin);
        $year = $request->year;
        $month = $request->month;
        $admin = Auth::guard('admin')->user();

        // Create a new immunization schedule
        $immunizationSchedule = Schedule::create([
            'year' => $year,
            'month' => $month,
            'id_admin' => $admin->id
        ]);

        if (!empty($vaksin)) {
            $vaccinesData = [];
            foreach ($vaksin as $vaksin_value) {
                Vaccines::create([
                    'type_vaccine' => $vaksin_value,
                    'id_schedule' => $immunizationSchedule->id
                ]);
                // $vaccinesData[] = [
                //     'type_vaccine' => $vaksin_value,
                //     'id_schedule' => $immunizationSchedule->id
                // ];
            }
            // Vaccines::create($vaccinesData);
            return redirect()->route('admin.schedule')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->back()->with([
                'error' => 'Data gagal ditambahkan !'
            ]);
        }
    }
    public function destroyAll(string $id)
    {
        $schedule = Schedule::where('id_schedule', $id);

        if ($schedule->delete()) {
            return redirect('admin/schedule')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->back()->with([
                'notifikasi' => 'Data gagal dihapus !',
                'type' => 'error',
            ]);
        }
    }
    public function destroyVaccine(string $id)
    {

        $vaccine = Vaccines::where('id_vaccine', $id);
        if ($vaccine) {
            $vaccine->delete();
            return response()->json(['success' => 'Vaccine deleted successfully']);
        }

        return response()->json(['error' => 'Vaccine not found'], 404);
    }
    public function editSchedule(Request $request, $id)
    {
        // dd($request->all());

        // $vaccines = $request->input('faksin1');
        // dd($vaccines);
        $year = $request->year;
        $month = $request->month;
        $admin = Auth::guard('admin')->user();

        // update immunization schedule
        $immunizationSchedule = Schedule::where('id_schedule', $id)->update([
            'year' => $year,
            'month' => $month,
            'id_admin' => $admin->id
        ]);

        if (!empty($immunizationSchedule)) {
            return redirect()->route('admin.schedule')->with('success', 'Data berhasil diubah');
        } else {
            return redirect()->back()->with('error', 'Data gagal ditambahkan !');
        }
    }
    public function insertVaccine(Request $request)
    {
        $vaccine = Vaccines::create([
            'type_vaccine' => $request->type_vaccine,
            'id_schedule' => $request->id_schedule
        ]);

        return response()->json(['success' => true, 'id_vaccine' => $vaccine->id]);
    }
}
