<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Field;
use App\Models\Encadrement;
use App\Models\Encadrement_student;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $students = Student::with('encadrements')->get();
    //     return view('Student.index', compact('students'));
    // }

    public function index()
    {
        $students = Student::with('encadrements')->paginate(5);
        // $students = Student::with('encadrements');
        return view('Student.index', compact('students'));
    }

    // public function search(Request $request)
    // {
    //     $search = $request->input('search');

    //     // $students = Student::where('full_name', 'like', "%$search%")->get();
    //     $students = Student::where('full_name', 'like', "%$search%")->paginate(5);

    //     // dd($search);
    //     // dd($students);
    //     return view('Student.index', compact('students', $students));
    // }


    public function search(Request $request)
    {
        $search = $request->input('search');

        $students = Student::where('full_name', 'like', "%$search%")
            ->orWhereHas('field', function ($query) use ($search) {
                $query->where('name', 'like', "%$search%");
            })
            ->orWhereHas('encadrements', function ($query) use ($search) {
                $query->where('name', 'like', "%$search%");
            })
            //->get();
            ->paginate(5);

        // return view('Student.index', compact('students'));
        return view('Student.index', compact('students', 'search'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fields = Field::all();
        $encadrements = Encadrement::all();
        return view('Student.create')->with('fields', $fields)->with('encadrements', $encadrements);
    }

    public function upload(Request $request)
    {
        $request->validate(['picture' => "required|image|mimes:png,gif,jpg,jpeg,bmp|max:2014"]);
        $photoName = time() . '.' . $request->picture->extension();
        $request->picture->move(public_path('photos'), $photoName);
        return $photoName;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $student = new Student;

        if ($request->picture) $student->picture = $this->upload($request);

        $student->full_name = $request->input('full_name');
        $student->phone = $request->input('phone');
        $student->email = $request->input('email');
        $student->school = $request->input('school');
        $student->start_date = $request->input('start_date');
        $student->end_date = $request->input('end_date');
        $student->field_id = $request->input('field_id');

        $student->save();

        if ($request->has('encadrements')) {
            foreach ($request->input('encadrements') as $encadrementId) {
                $encadrement = Encadrement::find($encadrementId);
                if ($encadrement) {
                    $student->encadrements()->attach($encadrement);
                }
            }
        }

        return redirect()->route('students.index')->with('success', 'Student created successfully!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('Student.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $fields = Field::all();
        $encadrements = Encadrement::all();

        return view('Student.edit', compact('student', 'fields', 'encadrements'));
    }

    public function update(Request $request, Student $student)
    {
        if ($request->picture) {
            $oldPicturePath = public_path('photos/' . $student->picture);
            if (file_exists($oldPicturePath)) {
                unlink($oldPicturePath);
            }
            $student->picture = $this->upload($request);
        }

        $student->full_name = $request->input('full_name');
        $student->phone = $request->input('phone');
        $student->email = $request->input('email');
        $student->school = $request->input('school');
        $student->start_date = $request->input('start_date');
        $student->end_date = $request->input('end_date');
        $student->field_id = $request->input('field_id');

        $student->save();

        $encadrements = $request->input('encadrements');
        $student->encadrements()->sync($encadrements);

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
}
