<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$firstName = $lastName = $email = $jobTitle = $department = "";
$firstName_err = $lastName_err = $email_err = $jobTitle = "";

 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate name
    $input_firstName = trim($_POST["firstName"]);
    if(empty($input_firstName)){
        $firstName_err = "Please enter a name.";
    } elseif(!filter_var($input_firstName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $firstName_err = "Please enter a valid name.";
    } else{
        $firstName = $input_firstName;
    }
    
    // Validate address address
    $input_lastName = trim($_POST["lastName"]);
    if(empty($input_lastName)){
        $lastName_err = "Please enter the last name";     
    } else{
        $lastName = $input_lastName;
    }
    
    // Validate salary
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter the email address.";     
    }  else{
        $email = $input_email;
    }
    $input_jobTitle = trim($_POST["jobTitle"]);
    if(empty($input_jobTitle)){
        $jobTitle_err = "Please enter the email address.";     
    }  else{
        $jobTitle = $input_jobTitle;
    }
    $input_Department = $_REQUEST['department'];
    $department =  $input_Department;
    
    // Check input errors before inserting in database
    if(empty($firstName_err) && empty($lastName_err) && empty($email_err)){
        // Prepare an update statement
        $sql = "UPDATE personnel SET firstName=?, lastName=?, email=?, jobTitle=?, departmentID=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssi", $param_firstName, $param_lastName, $param_email, $param_jobTitle, $param_department, $param_id);
            
            // Set parameters
            $param_firstName = $firstName;
            $param_lastName = $lastName;
            $param_email = $email;
            $param_id = $id;
            $param_jobTitle = $jobTitle;
            $param_department = $department;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: ../../index.php");
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
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM personnel WHERE id = ?";
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
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $firstName = $row["firstName"];
                    $lastName = $row["lastName"];
                    $email = $row["email"];
                    $jobTitle = $row["jobTitle"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: ../../index.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: ../../../index.php");
        exit();
    }
}

?>
 
