<?php 
    class CourseCartEntry {
        public $cart_entry_id;
        public $student_id;
        public $offering_id;

        public function __construct($cart_entry_id, $student_id, $offering_id)
        {
            $this->cart_entry_id = $cart_entry_id;
            $this->student_id = $student_id;
            $this->offering_id = $offering_id;
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