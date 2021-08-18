<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$locations = "";
    
    // Validate email
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    $input_locations = $_REQUEST['locations'];
    $locations =  $input_locations;
   
 
    // Check input errors before inserting in database
    
        // Prepare an insert statement
      $sql = "INSERT INTO location (name) VALUE (?)";
      if($stmt = mysqli_prepare($link, $sql)){
       
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $_REQUEST['locations']);
         
           
            
            
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