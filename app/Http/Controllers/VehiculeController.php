<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVehiculeRequest;
use App\Http\Requests\UpdateVehiculeRequest;
use App\Models\Carrental;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vehicules= Vehicule::with('carrental:id,name')
                    ->filter($request->only('search'))
                    ->paginate(10);

       // ddd($vehicules);
        return Inertia::render('Vehicules/Index',[
            'vehicules'=> $vehicules,
            'filters' =>[],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Vehicules/Create',[
            'carrentals'=> Carrental::all(['id','name'])
        ]);
    }


    public function store(StoreVehiculeRequest $request)
    {
        Vehicule::create($request->validated());

        return Redirect::route('vehicules.index')->with("success","Vehicule Added.");
    }

    public function edit( $id)
    {
        $vehicule= Vehicule::findOrFail($id)->load('carrental:id,name');

        return Inertia::render('Vehicules/Edit',[
            'vehicule'=> $vehicule,
            'carrentals'=> Carrental::all(['id','name'])
        ]);
    }




    public function update(UpdateVehiculeRequest $request,  $id)
    {
        $vehicule= Vehicule::findOrFail($id);
        $vehicule->update($request->validated());
        return Redirect::route('vehicules.edit',$vehicule->id)->with("success","Vehicule Updated.");
    }


    public function destroy($id)
    {
        $vehicule= Vehicule::findOrFail($id);
        return Redirect::route('vehicules.index',$vehicule->id)->with("success","Vehicule deleted.");
    }
}
