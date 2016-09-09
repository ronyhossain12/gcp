<?php

/**
 * Class to handle all db operations
 * This class will have CRUD methods for database tables
 *
 * @author Ravi Tamada
 * @link URL Tutorial link
 */

include 'DbConnect.php';

class DbHandler {

    private $conn;

    function __construct() {
        //require_once '/DbConnect.php';
        // opening db connection
        $db = new DbConnect();
        $this->conn = $db->connect();
    }

    /* ------------- `users` table method ------------------ */

    /**
     * Creating new user
     * @param String $name User full name
     * @param String $email User login email id
     * @param String $password User login password
     */
    public function register($did,$username,$email,$password,$name, $authen_key, $phone, $user_type) {
        require_once 'PassHash.php';
        $response = array();

        // First check if user already existed in db
        if (!$this->isUserExists($email)) {
            // Generating password hash
            //$password_hash = PassHash::hash($password);

            // Generating API key
           // $api_key = $this->generateApiKey();

            // insert query

            $sql = "INSERT INTO test (did,username,email,password,fname,lname) 
                    VALUES ($did,$username,$email,$password,$name, $authen_key, $phone, $user_type)";

            if ($this->conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $this->conn->error;
            }

            return USER_CREATED_SUCCESSFULLY;

            // Check for successful insertion

        } else {
            // User with same email already existed in the db
            return USER_ALREADY_EXISTED;
        }

        return $response;
    }

    /**
     * Checking user login
     * @param String $email User login email id
     * @param String $password User login password
     * @return boolean User login status success/fail
     */
    public function checkLogin($username, $password_entered) {
        // fetching user by email
        
        
    
       $q = "SELECT * FROM users" ;//WHERE username ='$username' AND password = '$password_entered' ";
	   $r = mysqli_query($this->conn, $q);
       
	
	   $num = mysqli_num_rows($r);
	   
    
    // output data of each row
    while($row = mysqli_fetch_assoc($r)) {
        echo "id: " . $row["username"]. " - Name: " . $row["passwords"]. "<br>";
    }

	   if ($num == 1) {
		  echo 'Login Authenticated';
	   } else {
           echo 'Record not found!';
       }
    
        
        /*
        $sql = "SELECT password FROM users WHERE username = $username";


        if ($sql > 0) {

            //if (PassHash::check_password($password, $password_entered)) {
            if(password==$sql[0]){
                // User password is correct
                return TRUE;
            } else {
                // user password is incorrect
                return FALSE;
            }
        } else {
            $sql->close();

            // user not existed with the email
            return FALSE;
        }
        
        */
    }

    /**
     * Checking for duplicate user by email address
     * @param String $email email to check in db
     * @return boolean
     */
    private function isUserExists($email) {
        $stmt = $this->conn->prepare("SELECT id from users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        $stmt->close();
        return $num_rows > 0;
    }

    /**
     * Fetching user by email
     * @param String $email User email id
     */
    public function getUserByEmail($email) {
        $stmt = $this->conn->prepare("SELECT name, email, api_key, status, created_at FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        if ($stmt->execute()) {
            // $user = $stmt->get_result()->fetch_assoc();
            $stmt->bind_result($name, $email, $api_key, $status, $created_at);
            $stmt->fetch();
            $user = array();
            $user["name"] = $name;
            $user["email"] = $email;
            $user["api_key"] = $api_key;
            $user["status"] = $status;
            $user["created_at"] = $created_at;
            $stmt->close();
            return $user;
        } else {
            return NULL;
        }
    }



}

?>
