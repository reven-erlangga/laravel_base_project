<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Http\Requests\MemberRequest;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Master Members';
        $members = Member::all();

        $data = [
            'title' => $title,
            'all_member' => $members->count(),
            'male_member' => $members->where('jenis_kelamin', 'L')->count(),
            'female_member' => $members->where('jenis_kelamin', 'P')->count(),
        ];

        return view('members.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Members';
        
        $data = [
            'title' => $title
        ];
        
        return view('members.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberRequest $request)
    {
        try {
            Member::create($request->all());
            
            session()->flash('success', 'Berhasil memasukan data member!.');
        } catch (\Throwable $th) {
            session()->flash('danger', 'Error : ' . $th->getMessage());
        }

        return redirect()->route('members.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        $title = "Ubah data member";

        $data = [
            'title' => $title,
            'action' => 'edit',
            'member' => $member
        ];

        return view('members.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        try {
            $member->update($request->all());
            
            session()->flash('success', 'Berhasil memperbaharui data member!.');
        } catch (\Throwable $th) {
            session()->flash('danger', 'Error : ' . $th->getMessage());
        }

        return redirect()->route('members.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        try {
            $member->delete();
            
            session()->flash('success', 'Berhasil menghapus data member!.');
        } catch (\Throwable $th) {
            session()->flash('danger', 'Error : ' . $th->getMessage());
        }

        return redirect()->route('members.index');
    }
}
