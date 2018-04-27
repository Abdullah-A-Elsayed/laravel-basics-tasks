<?php

namespace App\Http\Controllers;

use App\Country;
use App\contenent;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Country::all();
        return view('country.index',['conts'=>$all,'single'=>false]);
        //return Response($all);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conts = contenent::all();
        return view('country.create',['all_conts'=>$conts]);//select menu
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
            'name' => 'required|unique:countries|max:255',
            'contenent_id'=>'exists:contenents,id',
            ]);
        Country::create(Request()->all());
        $all = Country::all();
        return redirect("/country");
        //return view('country.index',['conts'=>$all,'single'=>false]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\contenent  $contenent
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        return view('country.index'
            ,['conts'=>$country,'single'=>true]);
        //return Response($contenent);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\contenent  $contenent
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
         $conts = contenent::all();
         return view("country.edit",['contr'=>$country,'all_conts'=>$conts]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\contenent  $contenent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        $request->validate([
            'name' => ['required',
                        'max:255',
                        Rule::unique('countries')->ignore($country->id),
                        ],
            'contenent_id'=>'exists:contenents,id',
            ]);
        $country->name = $request->input('name');
        $country->contenent_id = $request->input('contenent_id');
        $country->save();
        return redirect("/country");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\contenent  $contenent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        //return "d e l e t i n g ...";
        $country->delete();
        return redirect("/country");
    }
}
