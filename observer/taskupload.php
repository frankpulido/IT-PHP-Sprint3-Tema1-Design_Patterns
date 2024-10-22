<?php
declare(strict_types=1);
class TaskUpload {
    protected string $student_name;
    protected string $task_name;
    protected Course $course;
    public function __construct(string $student_name, string $task_name, Course $course)
    {
        $this->student_name = $student_name;
        $this->task_name = $task_name;
        $this->course = $course;
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