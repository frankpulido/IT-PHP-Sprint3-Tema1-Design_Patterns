<?
declare(strict_types=1);
class Mentor {
    protected string $name;
    protected Course $course;

    public function __construct(string $name, Course $course)
    {
        $this->name = $name;
        $this->course = $course;
    }
    public function getName() {
        return $this->name;
    }
    public function getCourse() {
        return $this->course;
    }
}
?>