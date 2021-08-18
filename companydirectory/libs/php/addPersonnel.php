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
}
?>
 <!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="card bg-info">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="modal-header">
                <h2 class="mt-4">Add Employee</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="firstName" class="form-control <?php echo (!empty($firstName_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $firstName; ?>">
                            <span class="invalid-feedback"><?php echo $firstName_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <textarea name="lastName" class="form-control <?php echo (!empty($lastName_err)) ? 'is-invalid' : ''; ?>"><?php echo $lastName; ?></textarea>
                            <span class="invalid-feedback"><?php echo $lastName_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Job Title</label>
                            <input type="text" name="jobTitle" class="form-control <?php echo (!empty($jobTitle_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $jobTitle; ?>">
                            <span class="invalid-feedback"><?php echo $jobTitle_err;?></span>
                        </div>
                        <div class="form-group">
                        <label>Department</label>
                        <select class="custom-select mr-sm-2" id="department" name='department'>
            <option value="Select a Department">Select A Department</option>

          </select>
                        </div>
           

         
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
    
</body>
</html>  -->