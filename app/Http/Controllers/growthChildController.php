<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\ChildGrowth;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class growthChildController extends Controller
{
    public function indexGrowthChart()
    {
        $childController = new ChildController();
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
                $age = $childController->calculateAge($birthDate);
                $childs_with_age[] = ['child' => $child, 'age' => $age, 'id_child' => $id_child];
            }
            return view('growth-child', ['childs' => $childs_with_age]);
        }
    }
    public function show($childId)
    {
        // Get the child data from database based on the childId
        $child = Child::find($childId);

        // Get the growth data from the database based on the childId
        $growthData = ChildGrowth::where('id_child', $childId)->orderBy('age')->get();

        $chartData = $growthData->map(function ($growth) {
            return [
                'age' => $growth->age,
                'weight' => $growth->weight,
                'body_length' => $growth->body_length,
                'head_circumference' => $growth->head_circumference,
            ];
        });

        $responseData = [
            'id_child' => $childId,
            'name' => $child->name,
            'chartData' => $chartData,
            'gender' => $child->gender,
        ];

        // Return the response data as JSON response
        return response()->json($responseData);
    }
    public function manageGrowth($id_child)
    {
        $childs = ChildGrowth::where('id_child', $id_child)->get();
        $name = Child::find($id_child)->name;
        $id = Child::find($id_child)->id;
        // dd($name);

        return view('manage-growth', compact('childs', 'name', 'id'));
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
                return $months . ' bulan';
            }
        } else {
            return $years . ' tahun ' . $months . ' bulan';
        }
    }
    public function manageGrowthInsert(Request $request)
    {
        // Mengambil semua ID anak dari input hidden
        $childId = $request->child_id;
        $weight = $request->weight;
        $height = $request->height;
        $head = $request->head;
        // dd($childId);
        $child = Child::where('id', $childId)->first();
        // dd($child);
        // if ($child) {
        //     $age = $this->calculateAge($child->date_of_birth);
        //     // dd($age);
        //     ChildGrowth::create([
        //         'id_child' => $childId,
        //         'age' => $age,
        //         'weight' => $weight,
        //         'body_length' => $height,
        //         'head_circumference' => $head,
        //     ]);
        if ($child) {
            $age = $this->calculateAge($child->date_of_birth);

            // Periksa apakah ada data dengan usia yang sama untuk anak yang sama
            $existingGrowth = ChildGrowth::where('id_child', $childId)
                ->where('age', $age)
                ->first();

            if ($existingGrowth) {
                return redirect()->back()->with('error', 'Anda memasukkan data anak dengan umur yang sama, silahkan ubah saja datanya!');
            }

            ChildGrowth::create([
                'id_child' => $childId,
                'age' => $age,
                'weight' => $weight,
                'body_length' => $height,
                'head_circumference' => $head,
            ]);

            return redirect()->back()->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Anak dengan ID ' . $childId . ' tidak ditemukan.');
        }
    }
    public function manageGrowthDelete($id)
    {
        $childGrowth = ChildGrowth::find($id);

        if (!$childGrowth) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        if ($childGrowth->delete()) {
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Data gagal dihapus');
        }
    }
    public function manageGrowthEdit($id)
    {
        // dd($id);
        // Jika hubungan sudah didefinisikan dalam model ChildGrowth
        $childGrowth = ChildGrowth::where('Id_growth', $id)->first();
        $id_child = $childGrowth->child->id;
        // dd($id_child);

        return view('edit-growth', compact('id_child', 'childGrowth'));
    }
    public function manageGrowthUpdate(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'head' => 'required|numeric',
        ], [
            'weight.required' => 'Masukkan berat badan',
            'weight.numeric' => 'Berat badan harus berupa angka!',
            'height.required' => 'Masukkan panjang/tinggi badan',
            'height.numeric' => 'Panjang/tinggi badan harus berupa angka!',
            'head.required' => 'Masukkan lingkar kepala',
            'head.numeric' => 'Lingkar kepala harus berupa angka!',
        ]);

        $childGrowth = ChildGrowth::where('Id_growth', $id)->update([
            'weight' => $request->weight,
            'body_length' => $request->height,
            'head_circumference' => $request->head,
        ]);
        $childGrowth = ChildGrowth::where('Id_growth', $id)->first();
        $id_child = $childGrowth->child->id;

        if ($childGrowth) {
            return redirect()->route('user.manage.growth', $id_child)->with('success', 'Data berhasil diubah');
        } else {
            return redirect()->back()->with('error', 'Data gagal diubah');
        }
    }
}
