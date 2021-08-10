<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel='stylesheet' href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="../styles.css" type='text/css'>

   
        
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
          <div class="container-fluid">
            <h2>Company Directory</h2>
          <div class='header__icons'>
          <button id='employees__show'>Employees<i class="fa fa-handshake-o"></i></button>
          <button id='departments__show'>Departments</button>
          <button id='locations__show'>Locations</button>
    </div>
    </div>
</nav>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Employees Details</h2>
                     <!--   <a href="libs/php/addPersonnel.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Employee</a> -->
                     <button type='button' class="btn btn-success pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add New Employee </button> 
                     <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
               
                <div class="modal-body">
                  <?php
                  include 'libs/php/addPersonnel.php';
                  ?>
                </div>
               
              </div>
            </div>
          </div>
         
        
                    <?php
                    // Include config file
                    require_once "libs/php/config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM department INNER JOIN personnel ON department.id = personnel.departmentID";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table id="myTable" class="table table-bordered table-striped" >';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo '<th style="display: none;"></th>';
                                        echo "<th>First Name</th>";
                                        echo "<th>Last Name</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Department</th>";
                                        echo "<th>Interactions</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td style='display: none;'>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['firstName'] . "</td>";
                                        echo "<td>" . $row['lastName'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="libs/php/readPersonnel.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                            echo '<a href="libs/php/updatePersonnel.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tool-tip"><span class="fa fa-pencil"></span></a>';
                                            echo '<a href="libs/php/deletePersonnel.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
                </div>
                <div id='department_wrapper'>
                <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Employees Details</h2>
                     <!--   <a href="libs/php/addPersonnel.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Employee</a> -->
                     <button type='button' class="btn btn-success pull-right" data-toggle="modal" data-target="#departmentModal"><i class="fa fa-plus"></i> Add New Department </button>
                     <div class="modal" id="departmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
               
                <div class="modal-body">
                 <h1> This is where the add Location goes </h1>
                </div>
               
              </div>
            </div>
          </div>
                    </div>
   
        
                    <?php
                    // Include config file
                    require "libs/php/config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM department";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table id="departmentTable" class="table table-bordered table-striped" >';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo '<th style="display: none;"></th>';
                                        echo "<th>Department</th>";
                                        echo "<th>Interactions</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td style='display: none;'>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>";
                                        echo '<a href="libs/php/updatePersonnel.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tool-tip"><span class="fa fa-pencil"></span></a>';
                                        echo '<a href="libs/php/deletePersonnel.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
                </div>
                </div>
                <div id='locations_wrapper'>
                <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Employees Details</h2>
                     <!--   <a href="libs/php/addPersonnel.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Employee</a> -->
                     <button type='button' class="btn btn-success pull-right" data-toggle="modal" data-target="#locationModal"><i class="fa fa-plus"></i> Add New Location </button>
                     <div class="modal" id="locationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
               
                <div class="modal-body">
                 <h1> This is where the add Location goes </h1>
                </div>
               
              </div>
            </div>
          </div>
                    </div>
   
        
                    <?php
                    // Include config file
                    require "libs/php/config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM location";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table id="locationTable" class="table table-bordered table-striped" >';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo '<th style="display: none;"></th>';
                                        echo "<th>Location</th>";
                                        echo "<th>Interactions</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td style='display: none;'>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>";
                                        echo '<a href="libs/php/updatePersonnel.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tool-tip"><span class="fa fa-pencil"></span></a>';
                                        echo '<a href="libs/php/deletePersonnel.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
                </div>
                </div>
                </div>
                <script>
                $(document).ready( function () {
    $('#myTable').DataTable();
} );
$(document).ready( function () {
    $('#departmentTable').DataTable();
} );
$(document).ready( function () {
    $('#locationTable').DataTable();
} );
</script>
<script src='../script.js'></script>
</body>
</html>