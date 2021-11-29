<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
   public function viewCourse()
   {
       return view('admin.course.viewCourse');
   }
}
