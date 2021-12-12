<?php 
    class CourseCartEntry {
        public $cart_entry_id;
        public $course_name;
        public $instructor_name;
        public $occurrence;
        public $schedule_time;
        public $room_name;
        public $status;

        public function __construct($cart_entry_id, $course_name, $instructor_name, $occurrence, $schedule_time, $room_name, $status)
        {
            $this->cart_entry_id = $cart_entry_id;
            $this->course_name = $course_name;
            $this->instructor_name = $instructor_name;
            $this->occurrence = $occurrence;
            $this->schedule_time = $schedule_time;
            $this->room_name = $room_name;
            $this->status = $status;
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