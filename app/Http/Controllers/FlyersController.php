<?php

namespace App\Http\Controllers;

use App\Flyer;
use App\Photo;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FlyersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('flyers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\FlyerRequest $request)
    {
        $flyer  = auth()->user()->publish(
            new Flyer($request->all())
        );

        flash()->success('success', 'your flyer is created');

        return redirect(flyer_url($flyer));
    }

    /**
     * Display the specified resource.
     *
     * @param  $zip , $street
     */
    public function show($zip, $street)
    {
        $flyer = Flyer::locatedAt($zip, $street);

        $flyer->load('photos');

        $storage = Storage::url('');

        return view('flyers.show', compact('flyer', 'storage'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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


    public function addPhoto($zip, $street, Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|mimes:jpg,jpeg,png'
        ]);


        $photo = Photo::fromFile($request->file('photo'))->upload();

        Flyer::locatedAt($zip, $street)->addPhoto($photo);
    }


    public function deletePhoto($id)
    {
        Photo::findOrFail($id)->delete();

        return back();

    }
}
