<?php

namespace App\Http\Controllers;

use App\Models\MealType;
use App\Models\Track;
use App\Models\User;
use Illuminate\Http\Request;

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
        $users = User::role('user')->orderBy('id','desc')->get();
        $meals = MealType::orderBy('id','asc')->get();
        return view('home', compact('users', 'meals'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function track(Request $request)
    {
        $request->validate([
            'meal' => 'required',
        ]);
        $attributes = $request->post();
        $data = [];
        foreach ($attributes['meal'] as $user => $meal) {
            $data['user_id'] = $user;
            $data['breakfast_count'] = (isset($meal[0]) && $meal[0] == 1) ? 1 : 0;
            $data['lunch_count'] = (isset($meal[1]) && $meal[1] == 2) ? 1 : 0;
            $data['dinner_count'] = (isset($meal[2]) && $meal[2] == 3) ? 1 : 0;
            Track::updateOrCreate(['user_id' => $data['user_id']], $data);
        }

        return redirect()->route('users.index')->with('success','Track has been updated successfully.');
    }
}
