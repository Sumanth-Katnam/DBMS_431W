<?php
    class Report1 {
        public $dept_id;
        public $dept_name;
        public $course_id;
        public $course_name;
        public $instructor_id;
        public $instructor_name;
        public $total;

        public function __construct($dept_id, $dept_name, $course_id, $course_name, $instructor_id, $instructor_name, $total)
        {
            $this->dept_id = $dept_id;
            $this->dept_name = $dept_name;
            $this->course_id = $course_id;
            $this->course_name = $course_name;
            $this->instructor_id = $instructor_id;
            $this->instructor_name = $instructor_name;
            $this->total = $total;
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