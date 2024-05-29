<?php

namespace App\Http\Controllers;

use App\Models\InformationVaccine;
use App\Models\Schedule;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Html\Options\Languages\Paginate;

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

    public function indexInformationVaccine()
    {
        $information = InformationVaccine::paginate(10);
        return view('admin.informasi', compact('information'));
    }

    public function showInformation(string $id)
    {
        $detail = InformationVaccine::where('id_information', $id)->first();
        if (!$detail) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        return view('admin.detail-informasi', compact('detail'));
    }

    public function indexInformasi()
    {
        return view('admin.add-informasi');
    }

    public function createInformation(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'body'    => 'required',
        ], [
            'heading.required' => 'Masukkan Judul!',
            'body.required' => 'Masukkan isi!',
        ]);

        $admin = Auth::guard('admin')->user();
        $body = str_replace('&nbsp;', "\r\n\r\n", strip_tags($request->body));

        $data = InformationVaccine::create([
            'heading' => $request->heading,
            'body' => $body,
            'id_admin' => $admin->id,
        ]);

        if ($data->save()) {
            // redirect
            return redirect()->route('admin.information-vaccine')->with('success', 'Data berhasil ditambahkan');
        } else {
            toastr()->error('Data gagal ditambahkan', 'Gagal');
            return redirect()->back()->with([
                'error' => 'Data gagal disimpan!'
            ]);
        }
    }

    public function destroyInformation(string $id)
    {
        $information = InformationVaccine::where('id_information', $id);

        if ($information->delete()) {
            return redirect('admin/information-vaccine')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->back()->with([
                'notifikasi' => 'Data gagal dihapus !',
                'type' => 'error',
            ]);
        }
    }

    public function editInformation(string $id)
    {
        $information = InformationVaccine::where('id_information', $id)->first();
        if (!$information) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
        return view('admin.edit-informasi', compact('information'));
    }

    public function updateInformation(Request $request, string $id)
    {
        $request->validate([
            'heading' => 'required',
            'body'    => 'required',
        ], [
            'heading.required' => 'Masukkan Judul!',
            'body.required' => 'Masukkan isi!',
        ]);

        $admin = Auth::guard('admin')->user();
        $body = str_replace('&nbsp;', "\r\n\r\n", strip_tags($request->body));

        $data = InformationVaccine::where('id_information', $id)->update([
            'heading' => $request->heading,
            'body' => $body,
            'id_admin' => $admin->id,
        ]);

        if ($data) {
            // redirect
            return redirect()->route('admin.information-vaccine')->with('success', 'Data berhasil diubah');
        } else {
            toastr()->error('Data gagal diubah', 'Gagal');
            return redirect()->back()->with([
                'error' => 'Data gagal disimpan!'
            ]);
        }
    }

    public function searchInformation(Request $request)
    {
        $query = $request->input('query');
        $information = InformationVaccine::where('heading', 'LIKE', "%$query%")
            ->orWhere('body', 'LIKE', "%$query%")
            ->paginate(10);

        return view('admin.search-result', compact('information'));
    }
}
