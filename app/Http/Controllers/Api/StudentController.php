<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Student\StudentServiceInterface;
use Log;

class StudentController extends Controller
{
    protected $studentService;

    public $successStatus = 200;

    /**
     * Create a new controller instance.
     *
     * @param StudentServiceInterface $studentService
     */
    public function __construct(
        StudentServiceInterface $studentService
    ) {
        $this->studentService = $studentService;
    }

    /**
     * get all students
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $datas = $this->studentService->getAllStudent();
        return view('welcome',compact('datas'));
        
    }

    /**
     * macro export
     *
     * @return \Illuminate\Http\Response
     */
    public function export()
    {
        $datas = $this->studentService->getAllStudent();
        $email = $datas[0]->email;
        $result = exec("python macro-export.py $email data");
        echo $result;
        $file_path = public_path('export-data.xlsm');
        return response()->download($file_path);
    }
}
