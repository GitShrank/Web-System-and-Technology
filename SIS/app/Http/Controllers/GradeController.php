<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;

class GradeController extends Controller
{
    //method to display grades page
    public function index() {

        $grades = Grade::all(); // Fetch all students from the database
        $students = Student::all(); // Fetch all students
        $subjects = Subject::all(); // Fetch all subjects
        return view('grade.index', ['grades' => $grades, 'students' => $students, 'subjects' => $subjects]);    //para ma display nato sila sa modal like add katung drop down didto
    }

    //method to create grade
    public function store(Request $request)
    {
        try {
        // Validate the request data
        $this->validate($request, [
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id',
            'grade' => 'required|numeric|min:1|max:5',
            'date' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    // Custom validation to check the date format
                    $parsedDate = date_parse_from_format('Y-m-d', $value);
                    if ($parsedDate['error_count'] > 0 || $parsedDate['warning_count'] > 0) {
                        $fail('The '.$attribute.' is not a valid date.');
                    }
                },
            ],
            'remarks' => 'required|string|max:255',
        ]);

        // Create a new grade
        Grade::create([
            'student_id' => $request->input('student_id'),
            'subject_id' => $request->input('subject_id'),
            'grade' => $request->input('grade'),
            'date' => $request->input('date'),
            'remarks' => $request->input('remarks'),
        ]);


       
        


        //toaster notif when Added
        $notification = array ( 
            'message' => 'Grade Added Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('grade.index')->with($notification);


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

    // New method to update the edited grade
    public function update(Request $request, $id)
    {
        try {
            // Validate and update the grade data
            $this->validate($request, [
                'grade' => 'required|numeric|min:1|max:5',
                'date' => 'required|date',
                'remarks' => 'required|string|max:255',
            ]);

            $grade = Grade::findOrFail($id);
            $grade->update([
                'grade' => $request->input('grade'),
                'date' => $request->input('date'),
                'remarks' => $request->input('remarks'),
                // Assuming you have 'student_id' and 'subject_id' in the grades table
                'student_id' => $request->input('student_id'),
                'subject_id' => $request->input('subject_id'),
            ]);

            // Toaster notification when updated
            $notification = [
                'message' => 'Grade Updated Successfully',
                'alert-type' => 'success',
            ];

            return redirect()->route('grade.index')->with($notification);
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
        $grade = Grade::findOrFail($id);
        $grade->delete();

                //toaster notif when updated
        $notification = array ( 
            'message' => 'Grade Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('grade.index')->with($notification);
    }
}

