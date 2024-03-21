<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;


class SubjectController extends Controller
{
    public function index() {
        
        $subjects = Subject::all();
        return view('subject.index', ['subjects' => $subjects]);
    }

// New method to add a student
public function store(Request $request)
{
    try {
        // Validate the subject data
        $this->validate($request, [
            'subject' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'code' => [
                'required',
                'regex:/^[A-Z]\d{3}$/',
                'string',
                'max:255',
                'unique:subjects,code',
            ],
            'units' => 'required|integer|min:1',
            'semester' => 'required|string|max:255',
        ], [
            'code.regex' => 'The Subject Code must start with a capital letter followed by three digits, example: T123',
        ]);

       
        $subject = new Subject();
        $subject->subject = $request->input('subject');
        $subject->description = $request->input('description');
        $subject->code = $request->input('code');
        $subject->units = $request->input('units');
        $subject->semester = $request->input('semester');
        $subject->save();

       
        $notification = [
            'message' => 'Subject Added Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('subject.index')->with($notification);
    } catch (\Illuminate\Validation\ValidationException $e) {
    
        $errors = $e->errors();
        $errorMessage = reset($errors)[0]; 

        $notification = [
            'message' => $errorMessage,
            'alert-type' => 'error',
        ];

        return redirect()->back()->withInput()->withErrors($errors)->with($notification);
    }
}


    

    public function update(Request $request, $id)
    {
        try {
         
            $this->validate($request, [
                'subject' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'code' => [
                    'required',
                    'regex:/^[A-Z]\d{3}$/',
                    'string',
                    'max:255',
                    'unique:subjects,code,' . $id, 
                ],
                'units' => 'required|integer|min:1',
                'semester' => 'required|string|max:255',
            ],[
                'code.regex' => 'The Subject Code must start with a capital letter followed by three digits, example: T123',
            ]);
    
            $subject = Subject::findOrFail($id);
            $subject->update($request->all());
    
       
            $notification = [
                'message' => 'Subject Updated Successfully',
                'alert-type' => 'success',
            ];
    
            return redirect()->route('subject.index')->with($notification);
        } catch (\Illuminate\Validation\ValidationException $e) {
           
            $errors = $e->errors();
            $errorMessage = reset($errors)[0]; 
    
            $notification = [
                'message' => $errorMessage,
                'alert-type' => 'error',
            ];
    
            return redirect()->back()->withInput()->withErrors($errors)->with($notification);
        }
    }
    
    // New method to delete a specific subject
    public function destroy($id)
    {
        $subject = subject::findOrFail($id);
        $subject->delete();

        
        //toaster notif when deleted
        $notification = array ( 
            'message' => 'Subject Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('subject.index')->with($notification);
    }

}
