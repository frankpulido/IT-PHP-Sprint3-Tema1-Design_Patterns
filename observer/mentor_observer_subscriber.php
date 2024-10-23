<?php
declare(strict_types=1);
require_once "moodle_subject_publisher.php";
require_once "course_subscription_enums.php";
require_once "notifications_interface.php";
require_once "taskupload.php";
/*
namespace Moodle\Subscriber;
use Moodle\Enums\Course;
use Moodle\TaskUpload\TaskUpload;
*/

final class Mentor implements Notifications {
    protected string $name;
    protected Course $course;
    protected array $subscriptions = ['new_student'=>true, 'new_task'=>true];

    public function __construct(string $name, Course $course, array $subscriptions) {
        $this->name = $name;
        $this->course = $course;
        //$this->subscriptions = $subscriptions; // We are giving no choice to subscribe/unsubscribe
        //$this->pushObserver();
    }
    /*
    public function pushObserver() {
        $moodle = Moodle::getInstance(); // Sugerencia ChatGPT
        $moodle->addSubscriberMentor($this);
    }
    */

    public function getName() {
        return $this->name;
    }

    public function getCourse() {
        return $this->course;
    }

    public function getSubscriptions() {
        return $this->subscriptions;
    }

    // NOTIFICATIONS BELOW

    public function getNotifiedAboutNewUserStudent(){
        return "MESSAGE TO SUBSCRIBER " . __CLASS__ . " " . $this->name . " :" . PHP_EOL . "A new student has signed up for course " . $this->course->name . ". Check your updated student list and send a welcome note with your instructions for joining the class." . PHP_EOL;
    }

    public function getNotifiedAboutUploadedTask(TaskUpload $task) : string {
        return "MESSAGE TO SUBSCRIBER " . $this->name . " : " . PHP_EOL . "Student " . $task->getStudentName() . " of course " . $this->course->name . " has delivered " . $task->getTaskName() . "." . PHP_EOL;
    }
    // Hay que hacer la clase Student (otro archivo) y en éste añadir el método getNotifiedAboutNewStudent
}
?>