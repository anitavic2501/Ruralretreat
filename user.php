<?php

class user {

    private $fname;
    private $lname;
    private $email;
    private $password;
    private $contact_number;
    private $user_type_id;
    private $DB;

    public function set_fname($fn) {
        $this->fname = $fn;
    }

    public function get_fname() {
        return $this->fname;
    }

    public function set_lname($ln) {
        $this->lname = $ln;
    }

    public function get_lname() {
        return $this->lname;
    }

    public function set_email($em) {
        $this->email = $em;
    }

    public function get_email() {
        return $this->email;
    }

    public function set_password($psw) {
        $this->password = $psw;
    }

    public function get_password() {
        return $this->password;
    }

    public function set_contact_number($cnumber) {
        $this->contact_number = $cnumber;
    }

    public function get_contact_number() {
        return $this->contact_number;
    }
    public function set_type_of_user($user_type) {
        $this->user_type_id = $user_type;
    }

    public function get_type_of_user() {
        return $this->user_type_id;
    }

    public function __construct() {
        $this->DB = new database();
    }

    //USERS FUNCTIONS

    //function to manage user login

    public function login() {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if (!empty($username) && !empty($password)) {
                $data = $this->DB->get("users", array("username" => $username, "password" => $password));

                if (!empty($data)) {
                    //session_start();
                    $_SESSION['users'] = $data[0];
                    $user_type = $data[0]['user_type_id'];
                    $user_id = $data[0]['user_id'];
                    if ($user_type == 1) {
                        echo '<script>
                                window.location.href = "list_of_users.php";
                            </script>';
                    } 
                    return true;
                } else {
                    return false;
                }
            }
        }
    }

    
    //function to add a new dog - ok
    public function add_dog() {

        if (isset($_POST['dogname']) && isset($_POST['breed']) && isset($_POST['age']) && isset($_POST['vaccination']) && isset($_POST['datereceived'])) {
            $dog_name = $_POST['dog_name'];
            $dog_breed = $_POST['breed'];
            $dog_age = $_POST['age'];
            $vaccination = $_POST['vaccination'];
            $datereceived= $_POST['datereceived'];

            //check if all data is ready to be upload

            if (!empty( $dog_name) && !empty($dog_breed) && !empty($dog_age) && !empty($vaccination) && !empty($datereceived)) {
                if ($this->DB->insert("dogs", array('dog_name' => $dog_name, 'breed' => $dog_breed, 'age' => $dog_age, 'vaccination' => $vaccination, 'datereceived' => $datereceived))) {
                    echo '<script>alert("Dog Added Successfully")</script>';
                    header("refresh:0;url=index.php");

                } else {
                    echo '<script>alert("Add Failed")</script>';
                    header("refresh:0;url=index.php");
                }
            } else {
                echo '<script>alert("All Fields Are Required")</script>';
                header("refresh:0;url=index.php");

            }
        }
    }

    //check if the session was started correctly
    public function loggedin() {
        if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
            return true;
        } else {
            return false;
        }
    }

    //forget password  => add email send to client
    //now it's just showing the password in an alert message

    public function forget_password() {
        
    }

}
?>