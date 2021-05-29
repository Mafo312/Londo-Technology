<?php

namespace App\Http\Controllers;

use App\groupe;
use App\Personnel;
use Illuminate\Http\Request;

class GroupeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groupeAll = groupe::all();

        return view('groupe.all', compact('groupeAll', $groupeAll));
    }
    /**
     * Show the form for creating a new resource.
     *
     * afficher les contacts par catégories
     */

    public function one($id)
    {
        $contactGroupe = Personnel::where('groupe_id', '=', $id)->get();
        $NameGroupe = groupe::where('id', '=', $id)->firstOrFail();

        return view('groupe.one', compact('contactGroupe', $contactGroupe))->with('NameGroupe', $NameGroupe);
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


        $data = Request()->validate([

            "nom" => "required|string",
            "description" => "required|string"
        ]);

        $groupe = new groupe();

        if ($request->image !== null) {
                $imagePath =  request('image')->store('uploads', 'public');

                $groupe->create([
                'nomGroupe' => $data['nom'],
                'description' => $data['description'],
                'image' => $imagePath

            ]);
            return redirect() -> route('/')->with('success', 'Le groupe a été ajouté avec succes!!!');
        } else {
                $groupe->create([
                'nomGroupe' => $data['nom'],
                'description' => $data['description'],
            ]);
            return redirect() -> route('/')->with('success', 'Le groupe a été ajouté avec succes!!!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $groupeView = groupe::where('id', '=', $id)->firstOrFail();

        return view('groupe/index', compact('groupeView'));
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

        $data = Request()->validate([
            "nom" => "required|string",
            "description" => "required|string"
        ]);

        $groupe = groupe::where('id', '=', $id)->firstOrFail();

        if ($request->image !== null) {
                $imagePath =  request('image')->store('uploads', 'public');

                $groupe->update([
                'nomGroupe' => $data['nom'],
                'description' => $data['description'],
                'image' => $imagePath

            ]);
            return redirect() -> route('/')->with('success', 'Le groupe a été modifié avec succes!!!');
        } else {
                $groupe->update([
                'nomGroupe' => $data['nom'],
                'description' => $data['description'],
            ]);
            return redirect() -> route('/')->with('success', 'Le groupe a été modifié avec succes!!!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        groupe::destroy($id);

        return redirect() -> route('/')->with('success', 'Le groupe a été supprimé avec succes!!!');
    }

}
