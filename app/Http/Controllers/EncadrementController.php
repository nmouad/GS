<?php

namespace App\Http\Controllers;

use App\Models\Encadrement;
use App\Models\Student;
use Illuminate\Http\Request;

class EncadrementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $encadrements = Encadrement::all();
        return view('Encadrement.index', compact('encadrements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();
        return view('Encadrement.create', compact('students'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $encadrement = new Encadrement;
        $encadrement->name = $request->input('name');
        $encadrement->description = $request->input('description');
        $encadrement->save();

        $students = $request->input('students');
        $encadrement->students()->attach($students);

        return redirect()->route('encadrements.index')->with('success', 'Encadrement created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Encadrement  $encadrement
     * @return \Illuminate\Http\Response
     */
    public function show(Encadrement $encadrement)
    {
        $students = $encadrement->students;
        return view('Encadrement.show', compact('encadrement', 'students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Encadrement  $encadrement
     * @return \Illuminate\Http\Response
     */
    public function edit(Encadrement $encadrement)
    {
        // $students = Student::all();
        // return view('Encadrement.edit', compact('encadrement', 'students'));
        return view('Encadrement.edit', compact('encadrement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Encadrement  $encadrement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Encadrement $encadrement)
    {
        $encadrement->name = $request->input('name');
        $encadrement->description = $request->input('description');
        $encadrement->save();

        $students = $request->input('students');
        $encadrement->students()->sync($students);

        return redirect()->route('encadrements.index')->with('success', 'Encadrement updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Encadrement  $encadrement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Encadrement $encadrement)
    {
        $encadrement->students()->detach();
        $encadrement->delete();
        return redirect()->route('encadrements.index')->with('success', 'Encadrement deleted successfully.');
    }
}


// namespace App\Http\Controllers;

// use App\Models\Encadrement;
// use App\Models\Student;
// use Illuminate\Http\Request;

// class EncadrementController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function index()
//     {
//         $encadrements = Encadrement::with('students')->paginate(10);
//         return view('Encadrement.index', compact('encadrements'));
//     }

//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function create()
//     {
//         $students = Student::all();
//         return view('Encadrement.create', compact('students'));
//     }

//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \App\Http\Requests\StoreEncadrementRequest  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(Request $request)
//     {
//         $encadrement = Encadrement::create($request->all());
//         $encadrement->students()->sync($request->input('students', []));
//         return redirect()->route('encadrements.index')->with('success', 'Encadrement created successfully.');
//     }

//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  \App\Models\Encadrement  $encadrement
//      * @return \Illuminate\Http\Response
//      */
//     public function edit(Encadrement $encadrement)
//     {
//         $students = Student::all();
//         $encadrement->load('students');
//         return view('Encadrement.edit', compact('encadrement', 'students'));
//     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \App\Http\Requests\UpdateEncadrementRequest  $request
//      * @param  \App\Models\Encadrement  $encadrement
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, Encadrement $encadrement)
//     {
//         $encadrement->update($request->all());
//         $encadrement->students()->sync($request->input('students', []));
//         return redirect()->route('encadrements.index')->with('success', 'Encadrement updated successfully.');
//     }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  \App\Models\Encadrement  $encadrement
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy(Encadrement $encadrement)
//     {
//         $encadrement->delete();
//         return redirect()->route('encadrements.index')->with('success', 'Encadrement deleted successfully.');
//     }
// }
