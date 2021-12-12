<?php
    class Report1 {
        public $course_name;
        public $instructor_name;
        public $occurrence;
        public $start_time;
        public $end_time;
        public $count;

        public function __construct($course_name, $instructor_name, $occurrence, $start_time, $count)
        {
            $this->course_name = $course_name;
            $this->instructor_name = $instructor_name;
            $this->occurrence = $occurrence;
            $this->start_time = $start_time;
            $this->end_time = $end_time;
            $this->count = $count;
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