<?php
declare(strict_types=1);
require "mentor_observer_subscriber.php";

class Moodle {
    protected $uploaded_tasks = [];
    protected $subscribers = [];

    public function __construct(array $uploaded_tasks, array $subscribers) {
        $this->uploaded_tasks = $uploaded_tasks;
        $this->subscribers = $this->initMentors();
    }
    public function initMentors() {
        $this->subscribers = [new Mentor("Rubén",Course::PHP), new Mentor("Oriol",Course::FDLP), new Mentor("Diana",Course::BIGDATA), new Mentor("Irune",Course::JAVA)];
    }
    public function getSubscribers() : array {
        return $this->subscribers;
    }
    public function getUploadedTasks() : array {
        return $this->uploaded_tasks;
    }
    public function addSubscriber(Mentor $mentor){
        $this->subscribers[] = $mentor;
    }
    public function addUploadedTask(TaskUpload $task) {
        $this->uploaded_tasks[] = $task;
        $this->NotifySubscribers($task);
    }
    public function NotifySubscribers(TaskUpload $task) : string {
        $reply = "";
        foreach($this->subscribers as $mentor) {
            if($mentor->getCourse() == $task->getCourse()) {
                $reply = "SUBSCRIBER " . $mentor->getName() . " : " . PHP_EOL . "Student " . $task->getStudentName() . " of course " . $task->getCourse() . " has delivered " . $task->getTaskName() . "." . PHP_EOL;
            }
        }
        return $reply;
    }

}
?>