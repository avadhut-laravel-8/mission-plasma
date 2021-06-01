<?php

namespace App\Http\Controllers;

use App\Models\PlasmaDonor;
use App\Models\City;
use Illuminate\Http\Request;

class PlasmaDonorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donors = PlasmaDonor::latest()->get();

        return view('donors.index', compact('donors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = City::select('city_state')->distinct()->get();

        return view('donors.create',compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'blood_group' => 'required',
            'positive_date' => 'required',
            'negative_date' => 'required',
            'state' => 'required',
            'city' => 'required',
            'phone_number' => 'required',
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        PlasmaDonor::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'age' => $request->age,
            'blood_group' => $request->blood_group,
            'positive_date' => $request->positive_date,
            'negative_date' => $request->negative_date,
            'state' => $request->state,
            'city' => $request->city,
            'phone_number' => $request->phone_number,
        ]);

        return redirect()->route('donors.index')
            ->with('success', 'Donor added successfully.');
    }


    public function getCities(Request $request){
        // dd( $request['state_id']);
        $data['cities'] = City::select('city_id', 'city_name')->where('city_state', $request['state_id'] )->get();
        return response()->json($data);
    }
}
