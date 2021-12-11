<?php 
    class RefCourse {
        public $course_id;
        public $course_name;
        public $dept_id;

        public function __construct($course_id, $course_name, $dept_id)
        {
            $this->course_id = $course_id;
            $this->course_name = $course_name;
            $this->dept_id = $dept_id;
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