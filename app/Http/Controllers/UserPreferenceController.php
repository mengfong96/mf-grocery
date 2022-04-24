<?php

namespace App\Http\Controllers;

use App\Models\UserPreference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPreferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preference = UserPreference::select('user_pax', 'meal_num')
            ->where('user_id', Auth::user()->id)
            ->first();

        return view('home', compact('preference'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $preference = UserPreference::query()
            ->where('user_id', Auth::user()->id)
            ->first();

        return view('preference.create', compact('preference'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->user()->id;
        $validated = $request->validate([
            'user_pax' => 'required',
            'meal_num' => 'required',
        ]);

        $userPreference = new UserPreference;
        $userPreference->user_pax = $validated['user_pax'];
        $userPreference->meal_num = $validated['meal_num'];
        $userPreference->user_id = $user;
        $userPreference->save();

        return redirect(route('home'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserPreference  $userPreference
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserPreference $userPreference)
    {
        // do validation
        $validated = $request->validate([
            'user_pax' => 'required',
            'meal_num' => 'required',
        ]);

        $userPreference->update([
            'user_pax' => $request->user_pax,
            'meal_num' => $request->meal_num
        ]);
        return redirect(route('home'));
    }

}
