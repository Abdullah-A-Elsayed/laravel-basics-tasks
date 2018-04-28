<?php

namespace App\Http\Controllers;

use App\contenent;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ContenentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $all = contenent::all();
        return view('contenent.index',['conts'=>$all,'single'=>false]);
        //return Response($all);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //1:user,  2:admin
        if (auth()->user()->type == 1) {
           return redirect()->back();
        }
        return view('contenent.create');
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
            'name' => 'required|unique:contenents|max:255',
            ]);
        $cont = contenent::create(Request()->all());
        $all = contenent::all();

        return redirect("/contenent");
        //return view('contenent.index',['conts'=>$all,'single'=>false]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\contenent  $contenent
     * @return \Illuminate\Http\Response
     */
    public function show(contenent $contenent)
    {
        return view('contenent.index'
            ,['conts'=>$contenent,'single'=>true]);
        //return Response($contenent);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\contenent  $contenent
     * @return \Illuminate\Http\Response
     */
    public function edit(contenent $contenent)
    {
         if (auth()->user()->type == 1) {
           return redirect()->back();
        }
         return view("contenent.edit",['cont'=>$contenent]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\contenent  $contenent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contenent $contenent)
    {
         $request->validate([
            'name' => ['required',
                        'max:255',
                        Rule::unique('contenents')->ignore($contenent->id),
                        ],
            ]);
        $contenent->name = $request->input('name');
        $contenent->save();
        return redirect("/contenent");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\contenent  $contenent
     * @return \Illuminate\Http\Response
     */
    public function destroy(contenent $contenent)
    {
        //return "d e l e t i n g ...";
        // $counts = $contenent->countries;
        // foreach ($counts as $count) {
        //     $count->delete();
        // }
        $contenent->delete();
        return redirect("/contenent");
    }
}
