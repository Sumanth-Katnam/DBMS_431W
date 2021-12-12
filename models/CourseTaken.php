<?php 
    class CourseTaken {
        public $taken_id;
        public $course_name;
        public $instructor_name;
        public $occurrence;
        public $schedule_time;
        public $room_name;

        public function __construct($taken_id, $course_name, $instructor_name, $occurrence, $schedule_time, $room_name)
        {
            $this->taken_id = $taken_id;
            $this->course_name = $course_name;
            $this->instructor_name = $instructor_name;
            $this->occurrence = $occurrence;
            $this->schedule_time = $schedule_time;
            $this->room_name = $room_name;
        }

        public function __get($property) {
            if (property_exists($this, $property)) {
                return $this->$property;
            }
        }

        public function __set($property, $value) {
            if (property_exists($this, $property)) {
                $this->$property = $value;
            }

            return $this;
        }

    }
?>