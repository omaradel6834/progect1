<?php

namespace App\Repository;
use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\Image;
use App\Models\My_Parent;
use App\Models\Nationalitie;
use App\Models\Section;
use App\Models\Student;
use App\Models\Type_Blood;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentRepository implements StudentRepositoryInterface{
   public function Get_Student()
   {
    $students = student::all();
    return view('students.index', compact('students'));
   }


   public function Edit_Student($id)
   {
      $students = student::findorfail($id);
      $data['gardes'] = Grade::all();
      $data['blood'] = Blood::all();
      $data['genders'] = gender::all();
      $data['parents'] = parents::all();

   }

   public function store_student($request)
   {
       $student = student::all();
       $student->email = $request->email;
       $student->password = Hash::make($request->password);
       $request->name = ['en'=>$request->nane_en, 'ar'=>$request->name_ar];
       $student->grade_id = $request->grade_id;
       $student->gender = $request->gender;
       $student->classrooms = $request->classrooms;
   }
   public function Get_classrooms($id)
   {
      $list_classes = Student::where('grade_id', $id)->pluck('Name_class');
      return $list_classes;
   }
   public function Get_Sections($id)
   {
    $list_sections = Student::where('class_id', $id)->pluck('name_section');
   }
}