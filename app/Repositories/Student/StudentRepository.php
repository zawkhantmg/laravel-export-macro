<?php

namespace App\Repositories\Student;

use App\Models\Student;

/**
 * StudentRepository
 */
class StudentRepository implements StudentRepositoryInterface
{
    /**
     * get all students
     *
     * @return void
     */
    public function getAllStudent()
    {
        return Student::get();
    }
}
