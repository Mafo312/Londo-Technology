<?php

namespace App\Http\Controllers;

use App\groupe;
use App\Personnel;
use Illuminate\Http\Request;

class SeachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Request()->validate([
            'valeur' => 'required|string|min:3'
        ]);

        $value = request()->input('valeur');

        $seachContact = Personnel::where('nomContact', 'like', "%$value%" )
            ->orwhere('prenom', 'like', "%$value%")
            ->orwhere('profession', 'like', "%$value%")
            ->orwhere('email', 'like', "%$value%")
            ->orwhere('phone', 'like', "%$value%")
            ->get();

        $seachGroupe = groupe::where('nomGroupe', 'like', "%$value%" )
            ->orwhere('Description', 'like', "%$value%")
            ->get();

        return view('seach.index', compact('seachContact', $seachContact, 'seachGroupe', $seachGroupe))->with('value', $value);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
