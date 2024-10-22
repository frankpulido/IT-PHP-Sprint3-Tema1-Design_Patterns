<?php
declare(strict_types=1);
/*
namespace Moodle\App;
use Moodle\Publisher\Moodle;
use Moodle\Enums\Course;
use Moodle\TaskUpload\TaskUpload;
use Moodle\Subscriber\Mentor;
*/
require_once 'moodle_subject_publisher.php';
require_once 'course_subscription_enums.php';
require_once 'taskupload.php';
require_once 'mentor_observer_subscriber.php';
/*
Good one : https://medium.com/codex/observer-pattern-in-php-8-569c71dd7837
Check Observer example. 2 classes missing : https://github.com/kamranahmedse/design-patterns-for-humans?tab=readme-ov-file#-observer
*/

echo PHP_EOL;
$moodle_subject_publisher = new Moodle();
$subscribers = $moodle_subject_publisher->getSubscribers();

echo "Let's upload 4 tasks : " . PHP_EOL;
$upload1 = new TaskUpload("Frank", Course::PHP, "Sprint 3 - Design Patterns");
$upload2 = new TaskUpload("Montse", Course::BIGDATA, "Project - Fotocasa Data Minning.");
$upload3 = new TaskUpload("Carles", Course::JAVA, "Sprint1 - Conditional Loops.");
$upload4 = new TaskUpload("Olivia", Course::FDLP, "Arrays and ArrayLists in Java.");

echo "The Moodle Subject/Publisher receives the tasks... And send messages :" . PHP_EOL;
echo PHP_EOL;
$moodle_subject_publisher->addUploadedTask($upload1);
echo PHP_EOL;
$moodle_subject_publisher->addUploadedTask($upload2);
echo PHP_EOL;
$moodle_subject_publisher->addUploadedTask($upload3);
echo PHP_EOL;
$moodle_subject_publisher->addUploadedTask($upload4);
echo PHP_EOL;

?>