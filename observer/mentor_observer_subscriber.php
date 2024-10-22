<?php
declare(strict_types=1);
require_once "course_subscription_enums.php";
require_once "taskupload.php";
/*
namespace Moodle\Subscriber;
use Moodle\Enums\Course;
use Moodle\TaskUpload\TaskUpload;
*/

class Mentor {
    protected string $name;
    protected Course $course;

    public function __construct(string $name, Course $course) {
        $this->name = $name;
        $this->course = $course;
    }
    public function getName() {
        return $this->name;
    }
    public function getCourse() {
        return $this->course;
    }
    public function getNotifiedAboutUploadedTask(TaskUpload $task) : string {
        return "MESSAGE TO SUBSCRIBER " . $this->name . " : " . PHP_EOL . "Student " . $task->getStudentName() . " of course " . $this->course->name . " has delivered " . $task->getTaskName() . "." . PHP_EOL;
    }
}
?>