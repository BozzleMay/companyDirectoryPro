<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $locationID = "";
    
    // Validate email
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    $input_name = $_REQUEST['name'];
    $name =  $input_name;
    $input_locationID = $_REQUEST['locationID'];
    $locationID =  $input_locationID;
 
    // Check input errors before inserting in database
    
        // Prepare an insert statement
      $sql = "INSERT INTO department (name, locationID) VALUES (?, ?)";
      if($stmt = mysqli_prepare($link, $sql)){
       
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $_REQUEST['name'], $_REQUEST['locationID']);
         #
           
            
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: ../../index.html");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>