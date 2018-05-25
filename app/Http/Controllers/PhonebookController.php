<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhonebookRequest;
use App\Http\Requests\UpdatePhonebookRequest;
use App\Phonebook;
use Illuminate\Http\Request;

class PhonebookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('phonebook');
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
    public function store(PhonebookRequest $request)
    {
        Phonebook::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function show(Phonebook $phonebook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function edit(Phonebook $phonebook)
    {
        //
    }


    public function update(UpdatePhonebookRequest $request)
    {
        Phonebook::findOrFail($request->id)->update($request->all());
        // Phonebook::update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phonebook $phonebook)
    {
        //
    }

    public function getPhonebook()
    {
        return Phonebook::orderBy('name')->get();
    }

    public function pagination(){
        return Phonebook::orderBy('name')->paginate(10);
    }
}
