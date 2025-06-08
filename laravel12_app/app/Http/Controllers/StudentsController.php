<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;  


class StudentsController extends Controller
{
    public function create()
    {
        return view("students.create");
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:255',
        'age' => 'nullable|integer|min:1',
     
        'address' => 'nullable|string|max:255',
    ]);

    $data['user_id'] = Auth::id();

    Student::create($data);

    return redirect()->route('students.index')->with('success', 'Student added successfully.');
}

      public function index(Request $request)
{
    $search = $request->input('search');

    $students = Student::when($search, function ($query, $search) {
            return $query->where('user_id', Auth::id())
                         ->where(function ($q) use ($search) {
                             $q->where('name', 'like', "%{$search}%")
                               ->orWhere('email', 'like', "%{$search}%")
                               ->orWhere('phone', 'like', "%{$search}%");
                         });
        }, function ($query) {
            return $query->where('user_id', Auth::id());
        })
        ->orderByDesc('created_at')
        ->paginate(5)
        ->withQueryString(); // keeps ?search= in pagination links

    return view("students.index", compact("students", "search"));
}

    public function show(Student $student)
    {
        

        if ($student->user_id !== Auth::id()) {
            abort(403); // unauthorized access
        }

        return view("students.show", compact("student"));
    }

    public function edit(Student $student)
    {
        if ($student->user_id !== Auth::id()) {
            abort(403);
        }

        return view("students.edit", compact("student"));
    }

    public function update(Request $request, Student $student)
{
    if ($student->user_id !== Auth::id()) {
        abort(403);
    }

    $data = $request->validate([
        "name" => "required|string|max:255",
        "email" => "required|email",
        "phone" => "required|string",
        "age" => "nullable|integer|min:1",
        "address" => "nullable|string|max:255",
    ]);

    $student->update($data);

    return redirect()->route("students.index")->with("success", "Student updated successfully.");
}

    public function destroy(Student $student)
    {
        if ($student->user_id !== Auth::id()) {
            abort(403);
        }

        $student->delete();

        return redirect()->route("students.index")->with("success", "Student deleted successfully.");
    }
}