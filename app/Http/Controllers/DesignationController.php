<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function index()
    {
        $designations = Designation::all();
        return view('designations.index', compact('designations'));
    }

    public function create()
{
    return view('designations.create');
}

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $designation = new Designation();
        $designation->name = $request->input('name');
        $designation->save();

        return redirect()->route('designations.index')->with('success', 'Designation added!');
    }

public function edit(Designation $designation)
{
    return view('designations.edit', compact('designation'));
}




    public function update(Request $request, Designation $designation)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $designation->name = $request->input('name');
        $designation->save();

        return redirect()->route('designations.index')->with('success', 'Designation updated!');
    }

    public function destroy(Designation $designation)
    {
        $designation->delete();

        return redirect()->route('designations.index')->with('success', 'Designation deleted!');
    }
}
