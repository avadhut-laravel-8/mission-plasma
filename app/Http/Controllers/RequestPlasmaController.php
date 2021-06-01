<?php

namespace App\Http\Controllers;

use App\Models\RequestPlasma;
use App\Models\City;
use Illuminate\Http\Request;

class RequestPlasmaController extends Controller
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
        $requests = RequestPlasma::latest()->get();

        return view('requests.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = City::select('city_state')->distinct()->get();

        return view('requests.create',compact('states'));
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

        RequestPlasma::create([
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

        return redirect()->route('requests.index')
            ->with('success', 'Request added successfully.');
    }

}
