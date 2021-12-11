<?php 
    class RefStudent {
        private $student_id;
        private $fname;
        private $mname;
        private $lname;
        private $email_id;
        private $last_logged_in;
        private $country_code;
        private $phone_number;

        public function __construct($student_id, $fname, $mname, $lname, $email_id, $last_logged_in, $country_code, $phone_number)
        {
            $this->student_id = $student_id;
            $this->fname = $fname;
            $this->mname = $mname;
            $this->lname = $lname;
            $this->email_id = $email_id;
            $this->last_logged_in = $last_logged_in;
            $this->country_code = $country_code;
            $this->phone_number = $phone_number;
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