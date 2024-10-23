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

final class Student implements Notifications {
    protected string $name;
    protected Course $course;
    protected array $subscriptions = ['new_student'=>true, 'new_task'=>true];

    public function __construct(string $name, Course $course) {
        $this->name = $name;
        $this->course = $course;
        //$this->subscriptions = $subscriptions; // Student has no choice to subdcribe/unsubscribe
        //$this->pushObserver();
    }
    /*
    public function pushObserver() {
        $moodle = Moodle::getInstance(); // Sugerencia ChatGPT
        $moodle->addSubscriberStudent($this);
        // also informs publisher to notify Mentor (does it in publisher)
    }
    */

    public function getName() {
        return $this->name;
    }

    public function getCourse() {
        return $this->course;
    }

    public function getSubscriptions() {} // Empty. Students cannot activate/deactivate notifications

    public function UploadTask(string $task_name) {
        $task = new TaskUpload($this->name, $this->course, $task_name);
        $moodle = Moodle::getInstance(); // Sugerencia ChatGPT
        $moodle->addUploadedTask($task);
    }

    // NOTIFICATIONS BELOW

    public function getNotifiedAboutNewUserStudent(){
        return "Welcome message to NEW SUBSCRIBER " . __CLASS__ . " " . $this->name . " of course " . $this->course->name . " :". PHP_EOL . "Welcome to IT Academy " . $this->name . "!!!... You have been signed up in Moodle. Your " . $this->course->name . " mentor will contact you shortly." . PHP_EOL;
    }

    public function getNotifiedAboutUploadedTask(TaskUpload $task) : string {
        return "MESSAGE TO SUBSCRIBER " . __CLASS__ . " " . $this->name . " of course " . $this->course->name . " :" . PHP_EOL . "You have delivered task " . $task->getTaskName() . " Your mentor will send you feedback when assessment is completed." . PHP_EOL;
    }
}
?>