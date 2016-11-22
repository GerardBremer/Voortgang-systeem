<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin');
    }

    public function store(Request $request)
    {

        if ($request->usertype == 'student') {
            $this->validate($request, [
                'snumber' => 'required',
            ]);
        }

        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $email = $request->input('email');
        $role = $request->input('role');
        // random pass
//        $pass = Hash::make(str_random(8));

        // voor lwd
        $pass = 'lwd';
        $snumber = $request->input('snumber');

        User::create([
            'first name' => $fname,
            'last name' => $lname,
            'email' => $email,
            'role' => $role,
            'password' => $pass,
            'snumber' => $snumber,
        ]);

        return redirect('admin');
    }

}
