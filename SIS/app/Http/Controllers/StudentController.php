<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class StudentController extends Controller
{
    public function index() {
        $students = Student::all(); // Fetch all students from the database
        return view('student.index', ['students' => $students]);
    }

    // Method to add a new student
    public function store(Request $request)
    {
        try {
            // Validate the student data
            $this->validate($request, [
                'name' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('students'),
                ],
                'address' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('students')->where(function ($query) use ($request) {
                        return $query->where('name', $request->name);
                    }),
                ],
                'age' => 'required|integer|min:18|max:25', // Age validation rule
            ], [
                'age.min' => 'The age must be at least :min.',
                'age.max' => 'The age must not be greater than :max.',
                'name.unique' => 'A student with the same name already exists.',
                'address.unique' => 'A student with the same name and address already exists.',
            ]);

            // Create a new student
            Student::create([
                'name' => $request->input('name'),
                'address' => $request->input('address'),
                'age' => $request->input('age'),
                // Add other fields as needed
            ]);

            // Toaster notification when added
            $notification = [
                'message' => 'Student Added Successfully',
                'alert-type' => 'success',
            ];

            return redirect()->route('student.index')->with($notification);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // If validation fails, show Toastr error notification and flash errors to the session
            $errors = $e->errors();
            $errorMessage = reset($errors)[0]; // Get the first error message

            $notification = [
                'message' => $errorMessage,
                'alert-type' => 'error',
            ];

            return redirect()->back()->withInput()->withErrors($errors)->with($notification);
        }
    }
    // New method to update the edited student
    public function update(Request $request, $id)
    {
        try {
            // Validate and update the student data
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'age' => 'required|integer|min:15|max:25', // Updated validation rule for age
            ], [
                'age.min' => 'The age must be at least :min.',
                'age.max' => 'The age must not be greater than :max.',
            ]);

            $student = Student::findOrFail($id);
            $student->update($request->all());

            // Toaster notification when updated
            $notification = [
                'message' => 'Student Updated Successfully',
                'alert-type' => 'success',
            ];

            return redirect()->route('student.index')->with($notification);

        } catch (\Illuminate\Validation\ValidationException $e) {
            
            // If validation fails, show Toastr error notification and flash errors to the session
            $errors = $e->errors();
            $errorMessage = reset($errors)[0]; // Get the first error message

            $notification = [
                'message' => $errorMessage,
                'alert-type' => 'error',
            ];

            return redirect()->back()->withInput()->withErrors($errors)->with($notification);
        }
    }

    // New method to delete a specific student
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        
        //toaster notif when deleted
        $notification = array ( 
            'message' => 'Student Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('student.index')->with($notification);
    }
}

//In this Controller, I used 2 forms of validation:
//1. $this->validate(): (from editing student) and;
//2. Validator Facade: (from adding student);
//I can use either only one of them for both function but I tried to use both to show you that there are several types of validators and these 2 are some examples, especially when put and post method is involved. Their difference is that #1 is simple and readable but limited control in errors handing, #2 is more code but more control over validation, it also requires this use Illuminate\Support\Facades\Validator;
