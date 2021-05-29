<?php

namespace App\Http\Controllers;

use App\Personnel;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactAll = Personnel::all();
        return view('contact.all', compact('contactAll', $contactAll));
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
            "prenom" => "required|string",
            "profession" => "required|string",
            "email" => "required|email",
            "phone" => "required|integer",
        ]);

        if ($request->image !== null) {

            $imagePath =  request('image')->store('uploads/conact', 'public');

            if ($request->groupe !== null) {

                Personnel::create([

                    'nomContact' => $data['nom'],
                    'prenom' => $data['prenom'],
                    'profession' => $data['profession'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'photo' => $imagePath,
                    'groupe_id' => $request->groupe
                ]);

                return redirect() -> route('/')->with('success', 'Le contact a été ajouté avec succes!!!');

            } else {

                Personnel::create([

                    'nomContact' => $data['nom'],
                    'prenom' => $data['prenom'],
                    'profession' => $data['profession'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'photo' => $imagePath
                ]);
                return redirect() -> route('/')->with('success', 'Le contact a été ajouté avec succes!!!');
            }

        } else {

            if ($request->groupe !== null) {;

                Personnel::create([

                    'nomContact' => $data['nom'],
                    'prenom' => $data['prenom'],
                    'profession' => $data['profession'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'groupe_id' => $request->groupe
                ]);

                return redirect() -> route('/')->with('success', 'Le contact a été ajouté avec succes!!!');
            } else {

                Personnel::create([

                    'nomContact' => $data['nom'],
                    'prenom' => $data['prenom'],
                    'profession' => $data['profession'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                ]);

                return redirect() -> route('/')->with('success', 'Le contact a été ajouté avec succes!!!');
            }
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
        $viewContact = Personnel::where('id', '=', $id)->firstOrFail();

        return view('contact.index', compact('viewContact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $contact = Personnel::where('id', '=', $id)->firstOrFail();

        $contact->update([
            "favoris" => '1'
        ]);

        return redirect() -> route('/')->with('success', 'Le contact ' .$contact->nomContact. ' est désormais favoris!!!');
    }

    public function editfavoris($id)
    {
        $contact = Personnel::where('id', '=', $id)->firstOrFail();

        $contact->update([
            "favoris" => '0'
        ]);

        return redirect() -> route('/')->with('success', 'Le contact ' .$contact->nomContact. ' n\'est désormais plus favoris!!!');
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
            "prenom" => "required|string",
            "profession" => "required|string",
            "email" => "required|email",
            "phone" => "required|integer",
        ]);

        $contact = Personnel::where('id', '=', $id)->firstOrFail();

        if ($request->image !== null) {

            $imagePath =  request('image')->store('uploads/conact', 'public');

            if ($request->groupe !== null) {

                $contact->update([

                    'nomContact' => $data['nom'],
                    'prenom' => $data['prenom'],
                    'profession' => $data['profession'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'photo' => $imagePath,
                    'groupe_id' => $request->groupe
                ]);

                return redirect() -> route('/')->with('success', 'Le contact a été modifieé avec succes!!!');

            } else {

                $contact->update([

                    'nomContact' => $data['nom'],
                    'prenom' => $data['prenom'],
                    'profession' => $data['profession'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'photo' => $imagePath
                ]);
                return redirect() -> route('/')->with('success', 'Le contact a été modifieé avec succes!!!');
            }

        } else {

            if ($request->groupe !== null) {;

                $contact->update([

                    'nomContact' => $data['nom'],
                    'prenom' => $data['prenom'],
                    'profession' => $data['profession'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'groupe_id' => $request->groupe
                ]);

                return redirect() -> route('/')->with('success', 'Le contact a été modifieé avec succes!!!');
            } else {

                $contact->update([

                    'nomContact' => $data['nom'],
                    'prenom' => $data['prenom'],
                    'profession' => $data['profession'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                ]);

                return redirect() -> route('/')->with('success', 'Le contact a été modifieé avec succes!!!');
            }
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
        Personnel::destroy($id);

        return redirect() -> route('/')->with('success', 'Le contact a été supprimé avec succes!!!');
    }
}
