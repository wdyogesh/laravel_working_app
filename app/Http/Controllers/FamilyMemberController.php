<?php

namespace App\Http\Controllers;

use App\FamilyMember;
use Illuminate\Http\Request;
use Auth;
use App\Host;

class FamilyMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $host = Host::where('user_id', Auth::user()->id)->first();
        
        $family_members = FamilyMember::where('host_id',$host->id)->get();
        //dd($host, $family_members);

        return view('host/family/member-list', compact('family_members', 'host'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $host = Host::where('user_id', Auth::user()->id)->first();
        return view('host/family/member-add', compact('host'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

     protected $fillable = ['first_name', 'last_name', 'host_id', 'gender', 'date_birth', 'relationship',];
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $host_id)
    {
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'date_birth' => 'required',
            'relationship' => 'required'
        ]);
        //Salva o novo membro na base de dados

        //$member = $request->all();
        //dd($host_id);
        FamilyMember::create([
            'host_id' => $host_id,
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'gender' => request('gender'),
            'date_birth' => request('date_birth'),
            'relationship' => request('relationship'),
        ]);

        return redirect()->route('family.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FamilyMember  $familyMember
     * @return \Illuminate\Http\Response
     */
    public function show(FamilyMember $familyMember)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FamilyMember  $familyMember
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = FamilyMember::find($id);

        //dd($member);

        return view('host/family/member-edit',compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FamilyMember  $familyMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //salva as informacoes no banco de dados
        $member = $request->all();

        FamilyMember::find($id)->update($member);

        return redirect()->action('FamilyMemberController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FamilyMember  $familyMember
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FamilyMember::find($id)->delete();
        return redirect()->action('FamilyMemberController@index');
    }
}
