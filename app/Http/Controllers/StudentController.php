<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Afficher la liste des étudiants
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    // Afficher le formulaire d'ajout
    public function create()
    {
        return view('students.create');
    }

    // Enregistrer un nouvel étudiant
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:students',
            'age'   => 'nullable|integer'
        ]);

        Student::create($validated);

        return redirect()->route('students.index')
                         ->with('success', 'Étudiant ajouté avec succès!');
    }

    // Afficher le formulaire d'édition
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    // Mettre à jour un étudiant
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'age'   => 'nullable|integer'
        ]);

        $student->update($validated);

        return redirect()->route('students.index')
                         ->with('success', 'Étudiant modifié avec succès!');
    }

    // Supprimer un étudiant
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
                         ->with('success', 'Étudiant supprimé avec succès!');
    }
}
