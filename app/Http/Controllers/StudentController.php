<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email',
            'age' => 'required|integer',
        ]);
        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Student added successfully');
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
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'age' => 'required|integer',
        ]);
        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student moved to trash.');
    }

    public function trash()
    {
        $trashedStudents = Student::onlyTrashed()->get();
        dd($trashedStudents);
        return view('students.trashed', compact('trashedStudents'));
    }

    public function restore($id)
    {
        Student::withTrashed()->findOrFail($id)->restore();

        // Redirect back to the trash page with a success message
        return redirect()->route('students.trashed')->with('success', 'Student restored successfully.');
    }
    public function forceDelete($id)
    {
        Student::withTrashed()->findOrFail($id)->forceDelete();

        // Redirect back to the trash page with a success message
        return redirect()->route('students.trashed')->with('success', 'Student permanently deleted.');
    }
}
