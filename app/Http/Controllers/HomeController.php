<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlasmaDonor;
use App\Models\RequestPlasma;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [];
        $donors_count = PlasmaDonor::count();
        $requests_count = RequestPlasma::count();

        $data = ['donors_count' => $donors_count, 'requests_count' => $requests_count];

        // $all_data = PlasmaDonor::with('request_plasmas')->get();
        $donors = PlasmaDonor::all();
        $requests = RequestPlasma::all();

        $donors = $donors->map(function ($donors) {
                        $donors['user_type'] = 'Donor';
                        return $donors;
                  });

        $requests = $requests->map(function ($requests) {
                        $requests['user_type'] = 'Requester';
                        return $requests;
                    });

        $collectionA = collect($donors->toArray());

        $collectionB = collect($requests->toArray());

        $all_data = $collectionA->concat($collectionB);
        // dd($all_data);

        return view('home')->with(compact('data', 'all_data'));
    }
}
