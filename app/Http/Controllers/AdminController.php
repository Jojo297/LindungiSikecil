<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function indexSchedule(): View
    {
        $schedules = Schedule::orderBy('year', 'asc')->orderBy('month', 'asc')->get();
        return view('admin.schedule', compact('schedules'));
    }
    public function dataTable()
    {
        $schedules = Schedule::select(['id_schedule', 'type_vaccines', 'year', 'month']);

        return DataTables::of($schedules)
            ->addColumn('action', function ($schedule) {
                return '<a href="' . route('admin.schedules.edit', $schedule->id_schedule) . '" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit</a>';
            })
            ->make(true); // set to false to disable server-side processing
    }

    public function insertSchedule(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'vaccins' => 'required',
        //     'year'    => 'required',
        //     'month'   => 'required',
        // ], [
        //     'vaccins.required' => 'Masukkan jenis vaksin!',
        //     'year.required' => 'Masukkan tahun!',
        //     'month.required' => 'Masukkan bulan!',
        // ]);

        // if ($validator->fails()) {
        //     return response()->json([
        //         'errors' => $validator->errors(),
        //     ]);
        // }

        // If the validation passes, save the data to the database
        // ...
        $admin = Auth::guard('admin')->user();

        $data = Schedule::create([
            'type_vaccines' => $request->vaccins,
            'year' => $request->year,
            'month' => $request->month,
            'id_admin' => $admin->id,
        ]);

        if ($data->save()) {
            // redirect
            return redirect()->route('admin.schedule')->with('success', 'Data berhasil ditambahkan');
        } else {
            toastr()->error('Data gagal ditambahkan', 'Gagal');
            return redirect()->back()->with([
                'error' => 'Data gagal disimpan!'
            ]);
        }
    }

    public function destroy(string $id)
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
}
