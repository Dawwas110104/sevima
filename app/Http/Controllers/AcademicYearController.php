<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\AcademicYearSubject;
use App\Models\Clas;
use App\Models\Meeting;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\Schedule;
use App\Models\Subject;
use Illuminate\Http\Request;
use Nette\Schema\Schema;

use function PHPUnit\Framework\returnSelf;

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

    public function class($id)
    {
        $items = Clas::where('academic_year_id', $id)->get();
        $academic_id = $id;

        return view('pages.academic-year.class', [
            'items' => $items,
            'academic_id' => $academic_id,
        ]);
    }

    public function classStore(Request $request)
    {
        // return $request;
        $class = Clas::where('name', $request->class)->where('academic_year_id', $request->academic_id)->get();

        if (count($class) < 1) {
            Clas::create([
                'academic_year_id' => $request->academic_id,
                'name' => $request->class,
            ]);
        };

        return redirect()->back();
    }

    public function classDestroy($id)
    {
        $item = Clas::findOrFail($id);
        $item->delete();

        return redirect()->back();
    }

    public function schedule($id)
    {
        $items = Schedule::join('users', 'teacher_id', '=', 'users.id')
        ->join('academic_year_subjects', 'academic_year_subject_id', '=', 'academic_year_subjects.id')
        ->join('subjects', 'academic_year_subjects.subject_id', '=', 'subjects.id')
        ->select('users.name as teacher_name', 'subjects.name as subject_name', 'day', 'start_at', 'end_at', 'subject_id', 'teacher_id', 'schedules.id as schedule_id')
        ->get();

        $subjects = AcademicYearSubject::
        join('subjects', 'subject_id', '=', 'subjects.id')
        ->select('academic_year_subjects.id as academic_year_subjects_id', 'name')
        ->get();

        $teachers = RoleUser::join('roles', 'role_id', '=', 'roles.id')
        ->join('users', 'user_id', '=', 'users.id')
        ->get();

        $class = Clas::findOrFail($id);

        return view('pages.academic-year.schedule', [
            'items' => $items,
            'subjects' => $subjects,
            'teachers' => $teachers,
            'class' => $class,
        ]);
    }

    public function scheduleStore(Request $request)
    {
        Schedule::create([
            'class_id' => $request->class_id,
            'academic_year_subject_id' => $request->subject,
            'teacher_id' => $request->teacher,
            'day' => $request->day,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
        ]);

        return redirect()->back();
    }

    public function scheduleDestroy($id)
    {
        $item = Schedule::findOrFail($id);
        $item->delete();

        return redirect()->back();
    }

    public function meeting($id)
    {
        $schedule = Schedule::findOrFail($id);
        $items = Meeting::join('schedules', 'schedule_id', '=', 'schedules.id')
        ->select('meetings.id as meeting_id', 'name', 'schedules.id as schedule_id', 'link', 'desc', 'presence_code')
        ->get();

        return view('pages.academic-year.meeting', [
            'items' => $items,
            'schedule' => $schedule,
        ]);
    }

    public function meetingStore(Request $request) 
    {
        Meeting::create([
            'schedule_id' => $request->schedule_id,
            'name' => $request->name,
            'desc' => $request->desc,
        ]);

        return redirect()->back();
    }
    
    public function meetingEdit($id)
    {
        $item = Meeting::findOrFail($id);

        return view('pages.academic-year.meetingEdit', [
            'item' => $item,
        ]);
    }

    public function meetingUpdate(Request $request, $id)
    {
        $data = $request->all();
        $item = Meeting::findOrFail($id);
        $item->update($data);

        return redirect()->back();
    }

    public function meetingDestroy($id)
    {
        $item = Meeting::findOrFail($id);
        $item->delete();

        return redirect()->back();
    }
}

