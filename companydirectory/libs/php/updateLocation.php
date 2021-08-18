<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$newLocation = "";


 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    $input_newLocation = $_REQUEST['newLocation'];
    $newLocation =  $input_newLocation;
    
    // Check input errors before inserting in database
   {
        // Prepare an update statement
        $sql = "UPDATE location SET name=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_newLocation, $param_id);
            
            // Set parameters
            $param_newLocation = $newLocation;
            
            $param_id = $id;
           
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: ../../../index.html");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} /* else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM location WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop 
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $firstName = $row["firstName"];
                    $lastName = $row["lastName"];
                    $email = $row["email"];
                    $jobTitle = $row["jobTitle"];
                    
                } else{
                    // URL doesn't contain valid id. Redirect to error page
            //        header("location: ../../index.html");
            //        exit();
           //     }
                
            } {
                echo "Oops! Something went wrong. Please try again later.";
            }
        //}
        
        // Close statement
 /*       mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: ../../index.html");
        exit();
    }
} */

?>