<?php
declare(strict_types=1);
require_once "taskupload.php";

interface Notifications {
    public function pushObserver();
    public function getNotifiedAboutUploadedTask(TaskUpload $task);
    public function getNotifiedAboutNewUserStudent();
}
?>