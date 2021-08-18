<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$newDepartment = $newDepLocation = "";


 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    $input_newDepartment = $_REQUEST['department'];
    $newDepartment =  $input_newDepartment;
    $input_newDepLocation= $_REQUEST['locationPicker'];
    $newDepLocation =  $input_newDepLocation;
    
    // Check input errors before inserting in database
   {
        // Prepare an update statement
        $sql = "UPDATE department SET name=?, locationID=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssi", $param_newDepartment, $newDepLocation, $param_id);
            
            // Set parameters
            $param_newDepartment = $newDepartment;
            $param_newDepLocation = $newDepLocation;
            
            $param_id = $id;
           
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: ../../index.html");
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
}