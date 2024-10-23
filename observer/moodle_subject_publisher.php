<?php
declare(strict_types=1);
require_once "course_subscription_enums.php";
require_once "mentor_observer_subscriber.php";
require_once "student_observer_subscriber.php";
require_once "taskupload.php";
/*
namespace Moodle\Publisher;
use Moodle\Subscriber\Mentor;
use Moodle\Enums\Course;
use Moodle\TaskUpload\TaskUpload;
*/

final class Moodle {
    //private static $singletonMoodle;
    private $uploaded_tasks = [];
    private $subscribersMentors = [];
    private $subscribersStudents = [];

    public function __construct(array $uploaded_tasks = []) {
        $this->uploaded_tasks = $uploaded_tasks;
        $this->subscribersMentors = $this->initMentors();
        $this->subscribersStudents = $this->initStudents();
    }

    public function initMentors() {
        return [new Mentor("Rubén", Course::PHP, ['new_student'=>false, 'new_task'=>true]), new Mentor("Oriol", Course::FDLP, ['new_student'=>false, 'new_task'=>true]), new Mentor("Diana", Course::BIGDATA, ['new_student'=>false, 'new_task'=>true]), new Mentor("Irune", Course::JAVA, ['new_student'=>false, 'new_task'=>true])];
    }

    public function initStudents() {
        return [new Student("Montse", Course::BIGDATA), new Student("Frank", Course::PHP), new Student("Carles", Course::JAVA), new Student("Olivia", Course::FDLP)];
    }

    public function getUploadedTasks() : array {
        return $this->uploaded_tasks;
    }

    public function addUploadedTask(TaskUpload $task) { // Este método será llamado desde la Clase Student
        $this->uploaded_tasks[] = $task;
        $this->NotifySubscribersTaskUploaded($task);
    }

    public function getSubscribersMentors() : array {
        return $this->subscribersMentors;
    }

    public function addSubscriberMentor(Mentor $mentor) : string {
        $this->subscribersMentors[] = $mentor;
        return "Mentor " . $mentor->getName() . " has been subscribed to Moodle notification system.";
    }

    public function removeSubscriberMentor(Mentor $mentor) : string {
        $reply = "";
        $found_index = array_search($mentor, $this->subscribersMentors);
        // https://www.w3schools.com/php/func_array_search.asp
        if($found_index != false){unset($this->subscribers[$found_index]); $reply = "Mentor no longer subscribed to Moodle notification system.";}
        else {$reply = "Mentor not found.";}
        return $reply;
    }

    public function getSubscribersStudents() : array {
        return $this->subscribersStudents;
    }

    public function addSubscriberStudent(Student $student) {
        $this->subscribersStudents[] = $student;
        echo $student->getNotifiedAboutNewUserStudent();
        foreach($this->subscribersMentors as $mentor) {
            if($mentor->getCourse()->name == $student->getCourse()->name) {
                echo $mentor->getNotifiedAboutNewUserStudent($student);
            }
        }
    }

    public function removeSubscriberStudent(Student $student) : string {
        $reply = "";
        $found_index = array_search($student, $this->subscribersStudents);
        // https://www.w3schools.com/php/func_array_search.asp
        if($found_index != false){unset($this->subscribersStudents[$found_index]); $reply = "Student no longer subscribed to Moodle notification system.";}
        else {$reply = "Student not found.";}
        return $reply;
    }

    // NOTIFICATION METHODS : specific notification content will be define inside observers/subscribers Classes...
    public function notifySubscribersTaskUploaded(TaskUpload $task) {
        foreach($this->subscribersMentors as $mentor) {
            if($mentor->getCourse() == $task->getCourse()) {
                echo $mentor->getNotifiedAboutUploadedTask($task);
            }
        }
        foreach($this->subscribersStudents as $student) {
            if($student->getCourse() == $task->getCourse()) {
                echo $student->getNotifiedAboutUploadedTask($task);
            }
        }
    }

    public function notifySubscribersNewUserStudent(Student $newStudent) {
        foreach($this->subscribersMentors as $mentor) {
            if($newStudent->getCourse() == $mentor->getCourse()) {
                echo $mentor->getNotifiedAboutNewUserStudent() . PHP_EOL . "Please, get in contact with student " . $newStudent->getName();
            }
        }
        echo $newStudent->getNotifiedAboutNewUserStudent();
    }
}
?>