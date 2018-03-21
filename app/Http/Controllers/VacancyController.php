<?php

namespace App\Http\Controllers;

use App\Vacancy;
use Illuminate\Http\Request;
use App\Feature;
use App\Host;
use Auth;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($house_id)
    {

        $host = Host::where('user_id', Auth::user()->id)->first();
        $vacancies = Vacancy::where('house_id', $house_id)->get();
        //dd($vacancies);
        return view('vacancy/index',compact('vacancies','house_id','host'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($house_id)
    {
        $host = Host::where('user_id', Auth::user()->id)->first();
        $features = Feature::where('owner','vacancy')->get();
        //dd($house_id);
        //$house = House::where('host_id', Auth::user()->host->first()->id)->get();
        //dd($house);

        return view('vacancy/create',compact('features','house_id', 'host'));
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
        //dd($features);

        $this->validate($request,[
            'title' => 'required',
            //'feature' => 'required',
            'bed_type' => 'required',
            'bathroom_type' => 'required',
            'is_available' => 'required',
        ]);
        //Salva o novo membro na base de dados
        //dd($request);
        //$member = $request->all();
        //dd(Auth::user()->host->first()->id);
        $vacancy = Vacancy::create([
            'house_id' => request('house_id'),
            'title' => request('title'),
            'description' => '',
            'bed_type' => request('bed_type'),
            'bathroom_type' => request('bathroom_type'),
            'is_available' => request('is_available'),
        ]);

        //dd($vacancy);

        foreach ($features as $feature) {
            $feature_id = Feature::where([
                ['name', $feature],
                ['owner', 'vacancy']
                ])->value('id');
                echo $feature . ' ';

            $set_features[] = $feature_id;
        }
        //dd(Vacancy::find($vacancy->id));
        $vacancy->features()->attach($set_features);

        return redirect()->route('vacancy.index', $vacancy->house_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $host = Host::where('user_id', Auth::user()->id)->first();
        $features = Feature::where('owner','vacancy')->get();
        $vacancy = Vacancy::find($id);
       

        return view('vacancy/show', compact('features','vacancy', 'host'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
        $host = Host::where('user_id', Auth::user()->id)->first();
        $features = Feature::where('owner','vacancy')->get();
        $vacancy = Vacancy::find($id);

        return view('vacancy/edit', compact('features','vacancy', 'host'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $features = $request->input('features');
        //dd($request);

        $this->validate($request,[
            'title' => 'required',
            'is_available' => 'required',
            //'feature' => 'required',
            'bed_type' => 'required',
            'bathroom_type' => 'required',
        ]);

        $vacancy = $request->all();
        
        //dd($house);
        if($features)
        {
            foreach ($features as $feature) {
                $feature_id = Feature::where([
                    ['name', $feature],
                    ['owner', 'vacancy']
                    ])->value('id');

                $set_features[] = $feature_id;
            }
            Vacancy::find($id)->features()->sync($set_features);
        }           

        Vacancy::find($id)->update($vacancy);

        return redirect()->route('vacancy.index',Vacancy::find($id)->house_id);
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacancy $vacancy)
    {
        //Delete a vacancy
    }

    public function photos()
    {
        return view('host/register/photos');
    }
}
