<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guitar;
use App\Http\Requests\GuitarFromRequest;

class  GuitarsController extends Controller
{
    private static function getData(){
        return[
            ['id'=>1,'name'=>'American Standard Start','brand'=>'Fender'],
            ['id'=>2,'name'=>'Starla S2','brand'=>'PRS'],
            ['id'=>3,'name'=>'Explorer','brand'=>'Gibson'],
            ['id'=>4,'name'=>'Talman','brand'=>'Ibanez'],
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // GET
        return view('guitars.index',[
            'guitars' => Guitar::all(),
            'userInput'=>'<script>alert("Hello")</script>'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // GET
        return view('guitars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuitarFromRequest $request)
    {
        $data = $request->validated();
        // POST
        $guitar = new Guitar();

        $guitar->name = $data['guitar-name'];
        $guitar->brand = $data['brand'];
        $guitar->year_made = $data['year'];

        $guitar->save();

        return redirect()->route('guitars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Guitar $guitar)
    {
        //GET
        return view('guitars.show',[
            'guitar' => $guitar
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Guitar $guitar)
    {
        // GET
        return view('guitars.edit',[
            'guitar' =>$guitar
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GuitarFromRequest $request,Guitar $guitar)
    {
        //POST , put , patch
        $data = $request->validated();

        $guitar->name = $data['guitar-name'];
        $guitar->brand = $data['brand'];
        $guitar->year_made = $data['year'];

        $guitar->save();

        return redirect()->route('guitars.show',$guitar->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
    }
}
