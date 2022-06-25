<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\AcademicYearSubject;
use App\Models\Subject;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = AcademicYear::all();
        $subjects = Subject::all();

        return view('pages.academic-year.index', [
            'items' => $items,
            'subjects' => $subjects,
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
        $data = $request->all();
        AcademicYear::create($data);

        return redirect()->route('academic-year.index');
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
        $item = AcademicYear::where('id', $id)->first();
        return view('pages.academic-year.edit', [
            'item' => $item,
        ]);
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
        $data = $request->all();
        
        $item = AcademicYear::findOrFail($id);
        $item->update($data);
        return redirect()->route('academic-year.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = AcademicYear::findOrFail($id);
        $item->delete();

        return redirect()->route('academic-year.index');
    }

    public function publish ($id)
    {
        $item = AcademicYear::findOrFail($id);
        
        AcademicYear::where('status', 1)->update([
            'status' => -1,
        ]);

        $item->update([
            'status' => 1,
        ]);

        return redirect()->back();
    }

    public function subject($id)
    {
        $items = AcademicYearSubject::join('subjects', 'subject_id', '=', 'subjects.id')
        ->where('academic_year_id', $id)->get();

        $subjects = Subject::all();
        $academic_id = $id;

        return view('pages.academic-year.subject', [
            'items' => $items,
            'subjects' => $subjects,
            'academic_id' => $academic_id,
        ]);
    }

    public function subjectStore(Request $request)
    {
        $subject = AcademicYearSubject::where('subject_id', $request->subject)->get();

        if (count($subject) < 1) {
            AcademicYearSubject::create([
                'academic_year_id' => $request->academic_id,
                'subject_id' => $request->subject,
            ]);
        };

        return redirect()->back();
    }
}
