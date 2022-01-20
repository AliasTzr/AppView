<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class AllProducts extends Controller
{

    public function produits($id = "") {
        $response = Http::get('http://apitestapp.herokuapp.com/products/'.$id);
        if($response->successful())
        {
            //dd($response->collect());
            if($id=="")
            {
                return view('produits', ['produits'=>$response->json()]);
            }
            else
                return view('editer', ['produit'=>$response->json()[0]]);

        }
        else
        {
            dd($response->body());
        }

    }

    public function ajouter() {
        return view('ajout');
    }


    public function updateProduit(Request $request, $id)
    {
        $request->validate([
            'name' => "required|string|max:255",
            'description' => "required|string",
            'price' => "required|integer|min:0",
            'inStock' => "required|string|in:t,f"
        ]);

        $response = Http::asForm()
            ->acceptJson()
            ->post('http://apitestapp.herokuapp.com/products/'.$id, [
                'newName' => $request->name,
                'newPrice' => $request->price,
                'newDescription' => $request->description,
                'newInStock' => $request->inStock,
            ]);
        if($response->successful()) {

            return redirect()->route('produits.index');
        } else {
            return $response->body();
        }
    }

     public function ajouterProduits(Request $request)
    {
        $request->validate([
            'name' => "required|string|max:255",
            'description' => "required|string",
            'price' => "required|integer|min:0",
            'inStock' => "required|string|in:t,f"
        ]);

        $response = Http::asForm()
            ->acceptJson()
            ->post('http://apitestapp.herokuapp.com/products', [
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'inStock' => $request->inStock,
            ]);
        if($response->successful()) {

            return redirect()->route('produits.index');
        } else {
            return $response->body();
        }
    }

    public function deleteProduit($id)
    {
        $response = Http::asForm()
            ->acceptJson()
            ->post('http://apitestapp.herokuapp.com/products/'.$id, [
                'deleteId' => $id,
            ]);
        if($response->successful()) {
            return redirect()->route('produits.index');
        } else {
            return $response->body();
        }
    }

}
