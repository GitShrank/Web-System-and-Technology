<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserProfileController extends Controller
{
    public function show()
    {
        $id = Auth::user()->id;         //access user table authenticated field
        $profileData = User::find($id);
        return view('student.index', compact('profileData'));
    }
}