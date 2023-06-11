<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Categorie;
use App\Models\Produit;
use App\Http\Requests\ProduitRequest;
use Illuminate\Support\Facades\Storage;

class ProduitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    private function image($image)
    {
        if ($image->hasFile('image')) {
            $fileNamaExt = $image->file('image')->getClientOriginalName();
            $fileNAme = pathinfo($fileNamaExt, PATHINFO_FILENAME);
            $extension = $image->file('image')->getClientOriginalExtension();
            $fileNameStore = $fileNAme . '_' . time() . '.' . $extension;
            $path = $image->file('image')->storeAs('public/produits_image', $fileNameStore);
        } else {
            $fileNameStore = 'NoImage.jpg';
        }
        return $fileNameStore;
    }

    public function index()
    {
        $produits = Produit::with('categorie')->simplePaginate(5);
        return view('admin.pages.listeProduit', ['produits' => $produits]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Categorie::all()->pluck('libelle', 'id');
        return view('admin.formulaires.ajoutProduit', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProduitRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProduitRequest $request)
    {


        $produit = new Produit;
        $produit->libelle_produit = $request->input('libelle_produit');
        $produit->prix = $request->input('prix');
        $produit->categorie_id = $request->input('categorie');
        $produit->image = $this->image($request);
        $produit->status = 0;
        $produit->save();
        $produits = Produit::with('categorie')->get();
        return redirect('produits')->with('success', $request->libelle_produit . ' ajouter avec success', ['produits' => $produits]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function show($id)
    {
        $produit = Produit::findOrFail($id);
        if ($produit->image != 'NoImage.jpg') {
            Storage::delete('public/produits_image/' . $produit->image);
        }
        $produit->delete();
        $produits = Produit::with('categorie')->get();
        return redirect('produits')->with(['success', ' Produit suprimer avec success', 'produits' => $produits]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function edit($id)
    {
        $produit = Produit::findOrFail($id);
        $categories = Categorie::all()->pluck('libelle', 'id');
        return view('admin.formulaires.editProduit', ['produit' => $produit, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProduitRequest $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function update(ProduitRequest $request, $id)
    {
        $produit = Produit::findOrFail($id);
        $produit->libelle_produit = $request->input('libelle_produit');
        $produit->prix = $request->input('prix');
        $produit->categorie_id = $request->input('categorie');
        if ($produit->image != 'NoImage.jpg' && $request->image != '') {
            Storage::delete('public/produits_image/' . $produit->image);
        }
        // dd($request->image);
        if ($request->image) {
            $produit->image = $this->image($request);
        }

        $produit->save();
        $produits = Produit::all();
        return redirect('produits')->with('success', $produit->libelle_produit . ' Modifier avec success', ['produits' => $produits]);
    }

    public function activer($id){
        $produit = Produit::findOrFail($id);
        $produit->status = 1;
        $produit->update();
        $produits = Produit::with('categorie')->get();
        return redirect('produits')->with('success', $produit->libelle_produit . ' activer avec success', ['produits' => $produits]);
    }

    public function desactiver($id){
        $produit = Produit::findOrFail($id);
        $produit->status = 0;
        $produit->update();
        $produits = Produit::with('categorie')->get();
        return redirect('produits')->with('success',$produit->libelle_produit . ' desactiver avec success', ['produits' => $produits]);
    }

}
