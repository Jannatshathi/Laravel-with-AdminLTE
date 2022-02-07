<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentsController extends Controller
{

    // public function index(Students $key)
    // {
    //     return $key;
    // }

    public function create()
    {
        return view('pages.students.student-create');
    }


    public function list()
    {
        $student=Students::all();
        return view('pages.students.student-list', compact('student'));
    }


    public function store(Request $request){
        $image_name = '';
        if($request->hasfile('image'))
                 {
                    
                    $filename = $request->image->move('images', $request->image->hashName()); 
                   
                    }

        Students::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password),
            'address'=>$request->address,
            'image'=>$filename,
        ]);
        return redirect()->route('student.list');
    }

    public function edit($id)
    {
        
        $student=Students::find($id);
        return view('pages.students.student-edit',compact('student'));
    }

    public function update(Request $request, $id)
    {
       
        $student=Students::find($id);
        $filename=$student->image;
        if($request->hasfile('image'))
                 {
                    
                    $filename = $request->image->move('images', $request->image->hashName()); 
                   
                    }
        $student->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'address'=>$request->address,
            'image'=>$filename,
           

        ]);
        return redirect()->route('student.list')->with('message','Student info updated.');
    }


    public function delete($id){
        Students::find($id)->delete();
        return redirect()->back();
    }
}
