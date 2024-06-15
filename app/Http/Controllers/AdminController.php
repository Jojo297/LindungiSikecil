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
        // $body = str_replace('&nbsp;', "\r\n\r\n", strip_tags($request->body));
        $body = $request->body;

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
        // $body = str_replace('&nbsp;', "\r\n\r\n", strip_tags($request->body));
        $body = $request->body;

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
