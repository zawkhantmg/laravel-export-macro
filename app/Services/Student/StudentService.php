<?php

namespace App\Services\Student;

use App\Repositories\Student\StudentRepositoryInterface;

/**
 * StudentService
 */
class StudentService implements StudentServiceInterface
{
    protected $studentRepo;

    public function __construct(
        StudentRepositoryInterface $studentRepo
    ) {
        $this->studentRepo = $studentRepo;
    }

    /**
     * get all student
     *
     * @return $students
     */
    public function getAllStudent()
    {
        return $this->studentRepo->getAllStudent();
    }

}
