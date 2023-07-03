<?php

namespace App\Http\Controllers;

use App\Http\Requests\EvaluationRequest;
use App\Models\Commande;
use App\Models\evaluation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function dashboard()
    {
        $user = Auth::user();
        if ($user) {
            // Requête pour récupérer le nombre de commandes de l'utilisateur connecté
            $nombre_commandes = Commande::where('users_id', $user->id)->count();
            // Requête pour récupérer la somme des montants totaux des commandes de l'utilisateur connecté
            $somme_montants = Commande::where('users_id', $user->id)->sum('montant');
            // Requête pour récupérer toutes les commandes de l'utilisateur connecté
            $commandes = Commande::where('users_id', $user->id)->get();

            $commandes->transform(function ($commande, $key) {
                $commande->panier = unserialize($commande->panier);
                return $commande;
            });
        }

        //dd($commandes);
        return view('client.dashboard', ['nombre_commandes' => $nombre_commandes, 'somme_montants' => $somme_montants, 'commandes' => $commandes]);
    }

    public function profile()
    {
        return view('client.profile');
    }

    public function contact()
    {
        return view('client.contacter');
    }

    public function store(EvaluationRequest $request)
    {
        // Enregistrer l'évaluation dans la table "evaluations"
        $evaluation = new Evaluation();
        $evaluation->commandes_id = $request->input('commande_id');
        $evaluation->users_id = $request->input('user_id');
        $evaluation->note = $request->input('note');
        $evaluation->commentaire = $request->input('comment');
        $evaluation->save();

        // Marquer la commande comme évaluée dans la table "commandes"
        $commande = Commande::find($request->input('commande_id'));
        $commande->is_evaluated = true;
        $commande->save();

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $user->name = $request->input('nomComplet');
        $user->email = $request->input('email');
        $user->telephone = $request->input('tel');
        $user->adresse = $request->input('adresse');

        $user->save();
        return redirect()->back()->with('success', 'Profile modifier avec success');
    }

    public function updatePass(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $oldPassword = $request->input('old_password');
        if (Hash::check($oldPassword, $user->password)) {
            $user->password = Hash::make($request->input('new_pass2'));
            $user->save();
            return redirect()->back()->with('success', 'Password modifier avec success');
        } else {
            return redirect()->back()->with('error', 'L\'ancien password saisi est incorrect');
        }
    }
}
