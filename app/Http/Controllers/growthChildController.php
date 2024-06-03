<?php

namespace App\Http\Controllers;

use App\Models\Child;
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

        // Get the chart data from database based on the childId
        $chartData = Child::where('id', $childId)->get();

        $responseData = [
            'name' => $child->name,
            'chartData' => $chartData,
        ];

        // Return the response data as JSON response
        return response()->json($responseData);
    }
}
