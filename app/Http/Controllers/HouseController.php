<?php

namespace App\Http\Controllers;

use App\House;
use App\Feature;
use App\Host;
use Illuminate\Http\Request;
use Auth;


class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $host = Host::where('user_id', Auth::user()->id)->first();
        $houses = House::where('user_id', $host->id)->get();
        //find(Auth::user()->host->first()->id)->get();
        //

        //dd($houses);
        return view('house/index', compact('houses', 'host'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $features = Feature::where('owner','house')->get();
        $local_amenities = Feature::where('owner','local_area')->get();
        $host = Host::where('user_id', Auth::user()->id)->first();
        $latitude = -27.4696819;
        $longitude = 153.0256503;
        //dd($features);
        //$house = House::where('host_id', Auth::user()->host->first()->id)->get();
        //dd($house);

        return view('house/create',compact('features', 'host', 'local_amenities', 'latitude', 'longitude'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $features = $request->input('features');
        //dd($checkboxes);

        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
        ]);
        //Salva o novo membro na base de dados

        //$member = $request->all();
        //dd(Auth::user()->host->first()->id);

        $host = Host::where('user_id', Auth::user()->id)->first();
        $house = House::create([
            'user_id' => $host->id,
            'title' => request('title'),
            'description' => request('description'),
            'city' => '',
            'address' => '',
            'about_area' => '',
            'directions' => '',
            'address_complement' => '',
            'country' => 'Australia',
            'latitude' => request('latitude'),
            'longitude' => request('longitude'),
        ]);

        foreach ($features as $feature) {
            $feature_id = Feature::where([
                ['name', $feature],
                ['owner', 'house']
                ])->value('id');


            //dd($feature_id);
            $house->features()
                ->attach($feature_id);
        }


        return redirect()->route('house.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\House  $house
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $features = Feature::where('owner','house')->get();
        $local_amenities = Feature::where('owner','local_area')->get();

        $host = Host::where('user_id', Auth::user()->id)->first();

        if($id == 0)
        {
            $house = House::where('user_id',$host->user_id)->first();
        }else
        {
            $house = House::find($id);
        }
        
        

        return view('house/show', compact('features', 'house', 'local_amenities', 'host'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\House  $house
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $host = Host::where('user_id', Auth::user()->id)->first();
        $features = Feature::where('owner','house')->get();
        $local_amenities = Feature::where('owner','local_area')->get();
        $house = House::find($id);
        //dd($house);
        
        return view('house/edit', compact('features','house', 'local_amenities', 'host'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\House  $house
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $features = $request->input('features');
        $amenities = $request->input('local_amenities');

        $this->validate($request,[
            'year' => 'numeric|digits:4',
            'features' => 'required',
            'local_amenities' => 'required',
        ]);

        $house = $request->all();
        //dd($features);
        foreach ($features as $feature) {
            $feature_id = Feature::where([
                ['name', $feature],
                ['owner', 'house']
                ])->value('id');

            $set_features[] = $feature_id;
        }

        foreach ($amenities as $amenitie) {
            $amenitie_id = Feature::where([
                ['name', $amenitie],
                ['owner', 'local_area']
                ])->value('id');

            $set_amenities[] = $amenitie_id;
        }

        House::find($id)->update($house);

        House::find($id)->features()->sync(array_merge($set_features,$set_amenities));

        $host = Host::where('user_id', Auth::user()->id)->first();

        if($host->host_type == 'homestay')
        {
            return redirect()->route('house.show', $id);
        }
        else
        {
            return redirect()->route('house.index');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\House  $house
     * @return \Illuminate\Http\Response
     */
    public function destroy(House $house)
    {
        //
    }
}
