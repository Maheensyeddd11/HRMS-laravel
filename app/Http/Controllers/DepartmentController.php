<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
 public function index(Request $request)
{
    $query = \App\Models\Department::query();

    if ($search = $request->input('search')) {
        $query->where('name', 'like', "%{$search}%");
    }

    $departments = $query->latest()->get();

    return view('departments.index', compact('departments'));
}

    public function create()
    {
        return view('departments.create');
    }

   public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    Department::create([
        'name' => $request->name,
    ]);

    return redirect()->route('departments.index')->with('success', 'Department added successfully!');
}


        public function edit($id)
{
    $department = Department::findOrFail($id);
    return view('departments.edit', compact('department'));
}


   public function update(Request $request, $id)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $department = Department::findOrFail($id);
    $department->update($validated);

    return redirect()->route('departments.index')->with('success', 'Department updated!');
}


  public function destroy($id)
{
    $department = Department::findOrFail($id);
    $department->delete();

    return redirect()->route('departments.index')->with('success', 'Department deleted successfully.');
}

}