<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$id = "";

    $id = $_REQUEST["val"];
    
    
        $sql = 'SELECT name from location WHERE NOT EXISTS (SELECT * FROM department WHERE department.locationID = location.id) AND id = ?';
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
           $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
                if(mysqli_num_rows($result) != 1){
                    echo json_encode($param_id); 
                }
		
            }
	
		
    
              
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);

        echo json_encode($result); 
    
?>
