<?php
    class Report1 {
        public $instructor_id;
        public $instructor_name;
        public $occurrence;
        public $start_time;
        public $end_time;

        public function __construct($instructor_id, $instructor_name, $occurrence, $start_time, $end_time)
        {
            $this->instructor_id = $instructor_id;
            $this->instructor_name = $instructor_name;
            $this->occurrence = $occurrence;
            $this->start_time = $start_time;
            $this->end_time = $end_time;
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