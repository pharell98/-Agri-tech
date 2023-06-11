<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.formulaires.dashboard');
    }



    /***************************************************************
     **************************** METHODE AJOUT ********************
     ***************************************************************/

    public function ajoutAdmin()
    {
        return view('admin.formulaires.ajoutAdmin');
    }

    public function ajoutProduit()
    {
        return view('admin.formulaires.ajoutProduit');
    }

    public function ajoutCategorie()
    {
        return view('admin.formulaires.ajoutCategorie');
    }

    public function ajoutFournisseur()
    {
        return view('admin.formulaires.ajoutFournisseur');
    }

    public function ajoutSlider()
    {
        return view('admin.formulaires.ajoutSlider');
    }

    /***************************************************************
     **************************** METHODE Affichage ********************
     ***************************************************************/
    public function listeProduit()
    {
        return view('admin.pages.listeProduit');
    }
    public function listeCategorie()
    {
        return view('admin.pages.listeCategorie');
    }
    public function listeFournisseur()
    {
        return view('admin.pages.listeFournisseur');
    }
    public function listeSlider()
    {
        return view('admin.pages.listeSlider');
    }




}
