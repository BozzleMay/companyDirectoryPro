<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$firstName = $lastName = $email = $jobTitle = $department = "";
$firstName_err = $lastName_err = $email_err = $jobTitle_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_firstName = trim($_POST["firstName"]);
    if(empty($input_firstName)){
        $firstName_err = "Please enter a name.";
    } elseif(!filter_var($input_firstName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $firstName_err = "Please enter a valid name.";
    } else{
        $firstName = $input_firstName;
    }
    
    // Validate address
    $input_lastName = trim($_POST["lastName"]);
    if(empty($input_lastName)){
        $lastName_err = "Please enter employee's last name.";     
    } else{
        $lastName = $input_lastName;
    }
    $input_jobTitle = trim($_POST["jobTitle"]);
    if(empty($input_jobTitle)){
        $jobTitle_err = "Please enter employee's job title.";     
    } else{
        $jobTitle = $input_jobTitle;
    }
    
    
    // Validate email
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter email address.";     
    } elseif (!filter_var($input_email, FILTER_VALIDATE_EMAIL)) {
           $emailErr = "Invalid format and please re-enter valid email"; 
           
        
    }else{
        $email = $input_email;
    }
    $input_department = $_REQUEST['department'];
    $department =  $input_department;
 
    // Check input errors before inserting in database
    if(empty($firstName_err) && empty($lastName_err) && empty($email_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO personnel (firstName, lastName, jobTitle, email, departmentID) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_firstName, $param_lastName, $param_jobTitle, $param_email, $param_department);
            
            // Set parameters
            $param_firstName = $firstName;
            $param_lastName = $lastName;
            $param_email = $email;
            $param_jobTitle = $jobTitle;
            $param_department = $department;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: ../../../index.php");
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
?>
