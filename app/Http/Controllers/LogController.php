<?php

namespace App\Http\Controllers;

use App\Log;
use App\User;
use Auth;

use Illuminate\Http\Request;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id = null)
    {
        //dd('index');
        //dd($user_id);
        if($user_id)
        {
            $logs = Log::where('user_id', $user_id)->get();
        }else{
            $logs = Log::all();
        }
        
        return view('log/index', compact('logs', 'user_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user_id)
    {
        return view('log/create', compact('user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user_id)
    {
        $this->validate($request,[
            'log_type' => 'required',
            'log_subject' => 'required',
            'log_content' => 'required'
        ]);

        $log = Log::firstOrCreate([
            'user_id' => $user_id,
            'type' => request('log_type'),
            'subject' => request('log_subject'),
            'content' => request('log_content')
        ]);

        return redirect()->route('admin.log.index', compact('user_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function show(Log $log)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function edit(Log $log)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Log $log)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function destroy(Log $log)
    {
        //
    }
}
