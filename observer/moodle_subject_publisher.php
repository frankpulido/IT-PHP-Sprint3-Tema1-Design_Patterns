<?php
declare(strict_types=1);
require_once "course_subscription_enums.php";
require_once "mentor_observer_subscriber.php";
require_once "taskupload.php";
/*
namespace Moodle\Publisher;
use Moodle\Subscriber\Mentor;
use Moodle\Enums\Course;
use Moodle\TaskUpload\TaskUpload;
*/
class Moodle {
    protected $uploaded_tasks = [];
    protected $subscribers = [];

    public function __construct(array $uploaded_tasks = []) {
        $this->uploaded_tasks = $uploaded_tasks;
        $this->subscribers = $this->initMentors();
    }
    public function initMentors() : array {
        return [new Mentor("Rubén",Course::PHP), new Mentor("Oriol",Course::FDLP), new Mentor("Diana",Course::BIGDATA), new Mentor("Irune",Course::JAVA)];
    }
    public function getSubscribers() : array {
        return $this->subscribers;
    }
    public function getUploadedTasks() : array {
        return $this->uploaded_tasks;
    }
    public function addSubscriber(Mentor $mentor) : string {
        $this->subscribers[] = $mentor;
        return "Mentor " . $mentor->getName() . " has been subscribed to Moodle notification system.";
    }
    public function removeSubscriber(Mentor $mentor) : string {
        $reply = "";
        $found_index = array_search($mentor, $this->subscribers);
        // https://www.w3schools.com/php/func_array_search.asp
        if($found_index != false){unset($this->subscribers[$found_index]); $reply = "Mentor no longer subscribed to Moodle notification system.";}
        else {$reply = "Mentor not found.";}
        return $reply;
    }
    public function addUploadedTask(TaskUpload $task) {
        $this->uploaded_tasks[] = $task;
        $this->NotifySubscribersTaskUploaded($task);
    }
    public function notifySubscribersTaskUploaded(TaskUpload $task) {
        foreach($this->subscribers as $mentor) {
            if($mentor->getCourse()->name == $task->getCourse()->name) {
                echo $mentor->getNotifiedAboutUploadedTask($task);
                // WOW, THIS IS A TRICKY ONE... I have to echo, cannot just execute and have the return echoed later... Study in further detail !!!!
            }
        }
    }
}
?>