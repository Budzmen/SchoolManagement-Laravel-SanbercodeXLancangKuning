<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::with(['teacher', 'student'])->get();
        return view('page.subjects', ['subjects' => $subjects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::all();
        $students = Student::all();
        return view('page.add-subjects', ['teachers' => $teachers, 'students' => $students]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|min:5',
                'teacher_id' => 'required',
                'student_id' => 'required'
            ],
            [
                'name.required' => 'A name is required',
                'teacher_id.required' => 'A age is required',
                'student_id.required' => 'A bio is required',
                'name.min' => 'A name is validate with min 5 character',
            ]
        );

        $subject = new Subject();

        $subject->name = $request->name;
        $subject->teacher_id = $request->teacher_id;
        $subject->student_id = $request->student_id;

        $subject->save();

        return redirect('/subjects')->with('success', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subjects = Subject::with(['teacher', 'student'])->find($id);
        $teachers = Teacher::all();
        $students = Student::all();
        return view('page.edit-subjects', ['subjects' => $subjects, 'teachers' => $teachers, 'students' => $students]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'name' => 'required|min:5',
                'teacher_id' => 'required',
                'student_id' => 'required'
            ],
            [
                'name.required' => 'A name is required',
                'teacher_id.required' => 'A age is required',
                'student_id.required' => 'A bio is required',
                'name.min' => 'A name is validate with min 5 character',
            ]
        );

        Subject::where('id', $id)
            ->update([
                'name' => $request->name,
                'teacher_id' => $request->teacher_id,
                'student_id' => $request->student_id
            ]);

        return redirect('/subjects')->with('success', 'Data berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Subject::where('id', $id)
            ->delete();

        return redirect('/subjects')->with('success', 'Data berhasil dihapus!');
    }
}
