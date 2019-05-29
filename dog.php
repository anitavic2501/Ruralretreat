<?php

include_once 'database.php';

class dog {

    private $dog_name;
    private $dog_id;
    private $dog_breed;
    private $dog_age;
    private $vaccination;
    private $datereceived;
    private $duedate;
    private $medicalcondition;
    private $allergies;
    private $movrestr;
    private $label;
    private $DB;

    function __construct() {
        $this->DB = new Database();
    }

    public function set_dog_name($dname) {
        $this->dog_name = $dname;
    }

    public function get_dog_name() {
        return $this->dog_name;
    }

    public function set_dog_id($d_id) {
        $this->dog_id = $d_id;
    }

    public function get_dog_id() {
        return $this->dog_id;
    }

    public function set_dog_breed($breed) {
        $this->dog_breed = $breed;
    }

    public function get_dog_breed() {
        return $this->dog_breed;
    }

    public function set_dog_age($age) {
        $this->dog_age = $age;
    }

    public function get_dog_age() {
        return $this->dog_age;
    }

    public function set_vaccination($dog_vaccination) {
        $this->vaccination= $dog_vaccination;
    }

    public function get_dog_vaccination() {
        return $this->vaccination;
    }

    public function set_datereceived($vac_datereceived) {
        $this->datereceived = $vac_datereceived;
    }

    public function get_datereceived() {
        return $this->datereceived;
    }
    public function set_duedate($vac_duedate) {
        $this->duedate = $vac_duedate;
    }

    public function get_duedate() {
        return $this->duedate;
    }

    public function set_medicalcondition($dog_medicalcondition) {
        $this->medicalcondition = $dog_medicalcondition;
    }

    public function get_medicalcondition() {
        return $this->medicalcondition;
    }

    public function set_allergies($dog_allergies) {
        $this->allergies = $dog_allergies;
    }

    public function get_allergies() {
        return $this->allergies;
    }

    public function set_movrestr($dog_moverestr) {
        $this->moverestr = $dog_moverestr;
    }

    public function get_moverestr() {
        return $this->moverestr;
    }

    public function set_label($dog_label) {
        $this->label = $dog_label;
    }

    public function get_label() {
        return $this->label;
    }


    public function get_all_dogs() {
        return $this->DB->get('dogs', null);
    }

    // Get all details for an specific dog
    
    public function get_dog_details($car_id) {
        return ($this->DB->get('dogs', array('dog_id' => $dog_id))[0]);
    }
}

?>