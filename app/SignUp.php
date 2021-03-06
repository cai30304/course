<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class SignUp extends Model
{
    protected $table = "sign_up";

    protected $fillable = [
        'course_id', 'student_name', 'student_id', 'academic_year', 'status'
    ];

    public function getCoursesDetail()
    {
        return $this->belongsTo('App\Courses','course_id');
    }

    public function getAccount()
    {
        return $this->belongsTo('App\User','student_id');
    }

    public function checkAcademic($academic_year)
    {
        $ary = explode('-', $academic_year);
        if($ary[1] == '1'){
            return 1;
        }elseif($ary[1] == '2'){
            return 2;
        }
    }

    public function checkYear($academic_year)
    {
        $ary = explode('-', $academic_year);

        return $ary[0];
    }

    // 取得該學生所有已報名課程(學生端用)
    public function scopeGetTotalStudentClass($query)
    {
        return $this->where('student_id',Auth::user()->account_id)->get();
    }

    // 取得該學生正在上的課程(學生端用)
    public function scopeGetStartingClass($query)
    {   
        $classes = $this->where('student_id',Auth::user()->account_id)->get();
        $list = 0;

        foreach($classes as $class){
            if($class->getCoursesDetail->status == '已開課'){
                $list += 1;
            }
        }

        return $list;
    }

    // 取得該學生修課總時數(學生端用)
    public function scopeGetStudentTime($query)
    {   
        $classes = $this->where('student_id',Auth::user()->account_id)->where('pass','通過')->get();
        $totalTime = 0;

        foreach($classes as $class){
            if($class->getCoursesDetail){
                $totalTime += $class->getCoursesDetail->total_hours;
            }
        }

        return $totalTime;
    }

    // 取得該課程學生名單(確認報名用)
    public function scopeCheckStudentList($query,$course_id)
    {
        $students = $this->where('course_id',$course_id)->get();
        $list = [];

        foreach($students as $student){
            array_push($list, $student->student_id);
        }

        return $list;
    }

    public function scopeGetStudentList($query,$course_id)
    {
        return $this->where('course_id',$course_id);
    }

    // 取得所有學生名單(Admin端用)
    public function scopeGetRecords($query)
    {
        return $this->all()->unique('student_id');
    }

    // 取得該學生修課總時數(Admin端用)
    public function GetAllStudentTime($id)
    {
        $classes = $this->where('student_id',$id)->where('pass','通過')->get();
        $totalTime = 0;

        foreach($classes as $class){
            if($class->getCoursesDetail){
                $totalTime += $class->getCoursesDetail->total_hours;
            }
        }

        return $totalTime;
    }

    // 取得該學生修課總學分(Admin端用)
    public function GetAllStudentScore($id)
    {   
        $student = User::where('account_id', $id)->first();
        if($student){
            return $student->score;
        }else{
            return 0;
        }
    }

    // 取得該學生修課總時數(Admin端認列學分用)
    public function scopeCheckStudentAllTime($query, $id)
    {
        $classes = $this->where('student_id',$id)->where('pass','通過')->get();
        $totalTime = 0;

        foreach($classes as $class){
            if($class->getCoursesDetail){
                $totalTime += $class->getCoursesDetail->total_hours;
            }
        }

        return $totalTime;
    }
    
}
