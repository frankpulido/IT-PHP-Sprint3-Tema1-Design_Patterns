<?php
declare(strict_types=1);
require_once "course_subscription_enums.php";
//namespace Moodle\TaskUpload;
//use Moodle\Enums\Course;

class TaskUpload {
    protected string $student_name;
    protected string $task_name;
    protected Course $course;
    public function __construct(string $student_name, Course $course, string $task_name)
    {
        $this->student_name = $student_name;
        $this->course = $course;
        $this->task_name = $task_name;
    }
    public function getStudentName() {
        return $this->student_name;
    }
    public function getTaskName() {
        return $this->task_name;
    }
    public function getCourse() {
        return $this->course;
    }
}
?>