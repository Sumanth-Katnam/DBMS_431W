<?php 
    class CourseOffering {
        public $offering_id;
        public $instructor_name;
        public $occurence;
        public $start_time;
        public $end_time;
        public $availability;

        public function __construct($offering_id, $instructor_name, $occurence, $start_time, $end_time, $availability)
        {
            $this->offering_id = $offering_id;
            $this->instructor_name = $instructor_name;
            $this->occurence = $occurence;
            $this->start_time = $start_time;
            $this->end_time = $end_time;
            $this->availability = $availability;
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