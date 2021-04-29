<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    public function index()
    {
        if(Auth::user()->role === 'admin'){
            return view('admin.class.index');
        }else{
            return redirect('/admin/dashboard');
        }
    }

    public function create()
    {
        if(Auth::user()->role === 'admin'){
            return view('admin.class.create');
        }else{
            return redirect('/admin/dashboard');
        }
    }

    public function check($id)
    {
        if(Auth::user()->role === 'admin'){
            return view('admin.class.check');
        }else{
            return redirect('/admin/dashboard');
        }
    }

    public function edit($id)
    {
        if(Auth::user()->role === 'admin'){
            return view('admin.class.edit');
        }else{
            return redirect('/admin/dashboard');
        }
    }

    
    public function check_students($id)
    {
        if(Auth::user()->role === 'student'){
            return redirect('/admin/dashboard');
        }else{
            return view('admin.class.check_students');
        }
    }

    public function rollCall($id)
    {
        if(Auth::user()->role === 'student'){
            return redirect('/admin/dashboard');
        }else{
            return view('admin.class.roll_call');
        }
    }

    public function rollCall_records($id)
    {
        if(Auth::user()->role === 'student'){
            return redirect('/admin/dashboard');
        }else{
            return view('admin.class.roll_call_records');
        }
    }

    public function rollCall_records_check($id)
    {
        if(Auth::user()->role === 'student'){
            return redirect('/admin/dashboard');
        }else{
            return view('admin.class.roll_call_records_check');
        }
    }

    public function review()
    {
        if(Auth::user()->role === 'admin'){
            return view('admin.class_review.index');
        }else{
            return redirect('/admin/dashboard');
        }
    }

    public function review_check($id)
    {
        if(Auth::user()->role === 'admin'){
            return view('admin.class_review.check');
        }else{
            return redirect('/admin/dashboard');
        }
    }

    
    public function fail()
    {
        if(Auth::user()->role === 'admin'){
            return view('admin.class_fail.index');
        }else{
            return redirect('/admin/dashboard');
        }
    }

    public function fail_check($id)
    {
        if(Auth::user()->role === 'admin'){
            return view('admin.class_fail.check');
        }else{
            return redirect('/admin/dashboard');
        }
    }

}
