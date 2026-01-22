<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //c'est pour afficher
    public function index(){
        $students=Student::all();
        return view('students.index',compact('students'));
    }
//c'est pour ajouter formulaire
    public function create(){
        return view('students.create');
    }
//pour save
    public function store(Request $request){
        Student::create($request->all());
        return redirect()->route('students.index');
    }

//pour edit
public function edit(Student $student){
    return view('students.edit',compact('student'));
}
//update
public function update(Request $request ,Student $student){
    $student->update($request->all());
    return redirect()->route('students.index');
}

//delete
public function destroy(Student $student){
    $student->delete();
    return redirect()->route('students.index');
}

}
