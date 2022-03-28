<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreDriverRequest;
use App\Http\Requests\UpdateDriverRequest;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $drivers= Driver::Select()
                    ->filter($request->only('search'))
                    ->paginate(10);


        return Inertia::render('Drivers/Index',[
            'drivers'=> $drivers,
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
        return Inertia::render('Drivers/Create',[]);
    }


    public function store(StoreDriverRequest $request)
    {
        Driver::create($request->validated());

        return Redirect::route('drivers.index')->with("success","Driver added succesfully.");
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return Inertia::render('Drivers/Edit',[
            'driver'=> Driver::findOrFail($id),
        ]);

    }


    public function update(UpdateDriverRequest $request, $id)
    {
        $driver= Driver::findOrFail($id);
        $driver->update($request->validated());
        return Redirect::route('drivers.edit',$driver->id)->with("success","driver Updated.");
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
