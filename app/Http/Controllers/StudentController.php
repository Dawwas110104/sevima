<?php

namespace App\Http\Controllers;

use App\Models\ClassUser;
use App\Models\Schedule;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = ClassUser::join('users', 'user_id', '=', 'users.id')->first();
        $items = Schedule::where('class_id', $user->class_id)
        ->join('academic_year_subjects', 'academic_year_subject_id', '=', 'academic_year_subjects.id')
        ->join('subjects', 'subject_id', '=', 'subjects.id')
        ->join('users', 'teacher_id', '=', 'users.id')
        ->select('users.name as user_name', 'subjects.name as subject_name', 'start_at', 'end_at', 'day')
        ->get();

        return view('pages.student.index', [
            'items' => $items,
        ]);
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
    public function store(Request $request)
    {
        //
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
}
