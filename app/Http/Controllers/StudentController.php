<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        return view('students', ['students' => Student::all()]);
    }

    public function store(Request $request) {
        $data = $request->validate(['name' => 'required|min:1']);
        Student::create($data);
        return back();
    }

    public function update(Request $request, Student $student) {
        $data = $request->validate(['name' => 'required|min:1']);
        $student->update($data);
        return back();
    }

    public function destroy(Student $student) {
        $student->delete();
        return back();
    }
}