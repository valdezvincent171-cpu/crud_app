<?php
namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    private $rules = ['name' => 'required', 'email' => 'required|email', 'course' => 'required'];

    public function index() { return view('students.index', ['students' => Student::latest()->get()]); }
    public function create() { return view('students.form', ['student' => new Student]); }
    public function store(Request $r) { Student::create($r->validate($this->rules)); return redirect('/students')->with('ok', 'Added!'); }
    public function edit(Student $student) { return view('students.form', compact('student')); }
    public function update(Request $r, Student $student) { $student->update($r->validate($this->rules)); return redirect('/students')->with('ok', 'Updated!'); }
    public function destroy(Student $student) { $student->delete(); return redirect('/students')->with('ok', 'Deleted!'); }
}