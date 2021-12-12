<?php 
    class RefDepartment {
        public $dept_id;
        public $dept_name;

        public function __construct($dept_id, $dept_name)
        {
            $this->dept_id = $dept_id;
            $this->dept_name = $dept_name;
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