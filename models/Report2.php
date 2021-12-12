<?php
    class Report1 {
        public $room_name;
        public $occurrence;
        public $start_time;
        public $end_time;

        public function __construct($room_name, $occurrence, $start_time, $end_time)
        {
            $this->room_name = $room_name;
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