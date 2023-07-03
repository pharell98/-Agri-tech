<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Categorie;
use App\Http\Requests\CategorieRequest;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories= Categorie::all();
        return view('admin.pages.listeCategorie', ['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.formulaires.ajoutCategorie');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CategorieRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategorieRequest $request)
    {
        $categorie = new Categorie;
		$categorie->libelle = $request->input('libelle');
        $categorie->save();
        $categories= Categorie::all();
        return redirect('categories')->with('success', $request->libelle . ' ajouter avec success', ['categories'=>$categories]);

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $categorie = Categorie::findOrFail($id);
        return view('admin.formulaires.editCategorie',['categorie'=>$categorie]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CategorieRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategorieRequest $request, $id)
    {
        $categorie = Categorie::findOrFail($id);
		$categorie->libelle = $request->input('libelle');
        $categorie->save();
        $categories=Categorie::all();
        return redirect('categories')->with('success', $request->libelle . ' Modifier avec success', ['categories' => $categories]);

    }

}
