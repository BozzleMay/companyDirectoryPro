<!DOCTYPE html>

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
    <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="companydirectory/libs/css/styles.css" type='text/css'>

   
        
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
<nav class="navbar">
          <div class="container-fluid">
            <h2>Company Directory</h2>
          <div class='header__icons'>
          <button type="button" class="btn btn-light btn-square-md" data-mdb-ripple-color="dark" id='employees__show'>Employees</button>
          <button type="button" class="btn btn-light btn-square-md" data-mdb-ripple-color="dark" id="departments__show">Departments</button>
          <button type="button" class="btn btn-light btn-square-md" data-mdb-ripple-color="dark" id='locations__show'>Locations</button>
       
    </div>
    </div>
</nav>
   <div id='emp' class='container'>
       <div class='addDeetsButton'>
    <button type='button' class="btn btn-success pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add New Employee </button> 
       </div>
                    <table id="myTable" class="table table-bordered table-striped">
                         <thead>
                             <tr>
                                 
                                 <th>First Name</th>
                                 <th>Last Name</th>
                                 <th class="priority-5">Email</th>
                                 <th>Department</th>
                                 <th>Interactions</th>
                                
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 
                                 <td></td>
                                 <td></td>
                                 <td class='.priority-5'></td>
                                 <td></td>
                                 <td></td>
                                 
                                 
                             </tr>
                        
                         </tbody>                            
                     </table>
                    </div>
                    <div class='container' id="department_wrapper" >
                        <div class='addDeetsButton'>
                        <button type='button' class="btn btn-success pull-right" data-toggle="modal" data-target="#addDepartmentModal"><i class="fa fa-plus"></i> Add New Department </button> 
                        </div>
                        <table id="departmentTable" class="table table-bordered table-striped">
                             <thead>
                                 <tr>
                                     
                                     <th id='dephead'>Department</th>
                                  <!--   <th>Interactions</th> -->
                                     <th>Location</th>
                                     <th>Interactions</th> 
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr>
                                      
                                     <td id='dep'></td>
                                   <!--  <td></td> -->
                                     <td></td> 
                                     <td></td>
                                     
                                 </tr>
                            
                             </tbody>                            
                         </table>
                        </div>
                        <div class='container' id="location_wrapper">
                        <div class='addDeetsButton'>
                            <button type='button' class="btn btn-success pull-right" data-toggle="modal" data-target="#addLocationModal"><i class="fa fa-plus"></i> Add New Location </button> 
                        </div>
                            <table id="locationTable" class="table table-bordered table-striped">
                                 <thead>
                                     <tr>
                                         
                                         <th>Location ID</th>
                                      <!--   <th>Interactions</th> -->
                                         <th>Location</th>
                                         <th>Interactions</th> 
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <tr>
                                          
                                         <td></td>
                                       <!--  <td></td> -->
                                          <td></td>
                                         <td></td>
                                         
                                     </tr>
                                
                                 </tbody>                            
                             </table>
                            </div>
                        
                        <!--
                        <div class="modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
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
                                        <form action="libs/php/updatePersonnel.php">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="firstName" class="form-control">
                                                <span class="invalid-feedback"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <textarea name="lastName" class="form-control"></textarea>
                                                <span class="invalid-feedback"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="email" class="form-control" value="">
                                                <span class="invalid-feedback"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Job Title</label>
                                                <input type="text" name="jobTitle" class="form-control " value="">
                                                <span class="invalid-feedback"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Department</label>
                                                <select class="custom-select mr-sm-2" id="editdepartment" name='department'>
                                    <option value="Select a Department">Select A Department</option>
                        
                                  </select>
                                                </div>
                                   
                        
                                 
                                                </div>
                                                <input type="submit" class="btn btn-primary" value="Submit">
                                                <a href="index.html" class="btn btn-secondary ml-2">Cancel</a>
                                            </form>
                                        </div>
                                    </div>        
                                </div>
                            </div>
                            </div>
                            </div>
                        </div> -->
                        <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content viewCard">
                                <div class="card  mb-3">
                                    <h4 class="card-header">Employee Details</h4>
                                    <div class="card-body">
                                        <div class="wrapper_see">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                       
                                                        <div class="form-group">
                                                            <label>First Name</label>
                                                            <p ><b id='viewFirstName'></b></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Last Name</label>
                                                            <p ><b id='viewLastName'></b></p>
                                                        </div>
                                                
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <p><b id='viewEmail'></b></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Department</label>
                                                            <p ><b id='viewDepartment'></b></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Job Title</label>
                                                            <p ><b id='viewJob'>N/A</b></p>
                                                        </div>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>        
                                            </div>
                                        </div>
                                      
                                    </div>
                                  </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal fade" id="viewLocationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content viewCard">
                                <div class="card  mb-3">
                                    <h4 class="card-header">Location Details</h4>
                                    <div class="card-body">
                                        <div class="wrapper_see">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                       
                                                        <div class="form-group">
                                                            <label>Location</label>
                                                            <p ><b id='viewLocationList'></b></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Departments</label>
                                                            <b id='viewDepsInLocation'><ul class ="box"></ul></b>
                                                        </div>
                                                
                                                        
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>        
                                            </div>
                                        </div>
                                      
                                    </div>
                                  </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal fade" id="viewDepartmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content viewCard">
                                <div class="card  mb-3">
                                    <h4 class="card-header">Location Details</h4>
                                    <div class="card-body">
                                        <div class="wrapper_see">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                       
                                                        <div class="form-group">
                                                            <label>Department</label>
                                                            <p ><b id='viewDepartmentList'></b></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Location</label>
                                                            <p><b id='viewLocsInDepartment'></b></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Department Size</label>
                                                            <p><b id='departmentLength'> </b><b> Employees</b></p>
                                                        </div>
                                                
                                                        
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>        
                                            </div>
                                        </div>
                                      
                                    </div>
                                  </div>
                              </div>
                            </div>
                          </div>
                        
                              <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="mt-4">Add Employee</h2>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                        
                            <div class="container-fluid">
                                
                                <div class="row">
                                    <div class="col-md-12">
                                   
                                        <p>Please fill this form and submit to add employee record to the database.</p>
                                        <form action="companydirectory/libs/php/addPersonnel.php" method="post">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="firstName" id="firstName" class="form-control" required>
                                                <span class="invalid-feedback"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" name="lastName" class="form-control" required></textarea>
                                                <span class="invalid-feedback"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control" value="" required>
                                                <span class="invalid-feedback"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Job Title</label>
                                                <input type="text" name="jobTitle" class="form-control " value="" >
                                                <span class="invalid-feedback"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Department</label>
                                                <select class="custom-select mr-sm-2 department" name='department' required>
                                    <option value="">Select A Department</option>
                        
                                  </select>
                                                </div>
                                   
                        
                                 
                                                </div>
                                                <div class='addFooter'>
                                                <input type="submit" class="btn btn-primary pull-right" value="Submit">
                                                <a href="index.html" class="btn btn-secondary ml-2 pull-right">Cancel</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>        
                                </div>
                            
                            </div>
                            </div>
                        </div> 
                        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div><h4 class="modal-title" id="myModalLabel">Update Record</h4></div>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    
                </div>
                <div class="modal-body">
                    <div class="wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-9">
                                  
                                    <p>Please edit the input values and submit to update the employee record.</p>
                                    <form action="companydirectory/libs/php/updatePersonnel.php" method="post">
                                        <div class="form-group idman">
                                            <label>id</label>
                                            <input type="text" id="editId" name="id" class="form-control" >
                                            <span  class="invalid-feedback"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" id="editFirstName" name="firstName" class="form-control" required>
                                            <span  class="invalid-feedback"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" id="editLastName" name="lastName" class="form-control" required> </textarea>
                                            <span class="invalid-feedback"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" id="editEmail" name="email" class="form-control" required>
                                            <span class="invalid-feedback"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Job Title</label>
                                            <input type="text" id="editJob" name="jobTitle" class="form-control ">
                                            <span class="invalid-feedback"></span>
                                        </div>
                                        <div class="form-group">
                                        <label>Department</label>
                                        <select class="custom-select mr-sm-2 department" id="editDepartment" name='department'>
                            
                
                          </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                            <input type='submit' value='Submit' class="btn btn-success">
                                        </form>
                                        </div>
                                                                    
                            </div>
                        </div>
                            </div>
                                    
                                   
                                </div>
                            </div>        
                        </div>
                    </div>
                </div>
                </div>
             </div>
         </div>         
         <div class="modal fade" id="editDepartmentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div><h4 class="modal-title">Update Record</h4></div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        
                    </div>
                    <div class="modal-body">
                        <div class="wrapper">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-9">
                                      
                                        <p>Please edit the input values and submit to update the department record.</p>
                                        <form action="companydirectory/libs/php/updateDepartment.php" method="post">
                                            <div class="form-group idman">
                                                <label>id</label>
                                                <input type="text" id="editDepartmentId" name="id" class="form-control" >
                                                <span  class="invalid-feedback"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Department</label>
                                                <input type="text" id="editDepartmentName" name="department" class="form-control" required>
                                                <span  class="invalid-feedback"></span>
                                            </div>
                                            
                                           
                                            <div class="form-group">
                                            <label>Location</label>
                                            <select class="custom-select mr-sm-2 locationSelector" id="editDepartmentLocation" name='locationPicker'>
                                
                    
                              </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                                <input type='submit' value='Submit' class="btn btn-success">
                                            </form>
                                            </div>
                                                                        
                                </div>
                            </div>
                                </div>
                                        
                                       
                                    </div>
                                </div>        
                            </div>
                        </div>
                    </div>
                    </div>
                 </div>
             </div>                 
         
         
         <div class="modal fade" id="editLocation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div><h4 class="modal-title" id="myModalLabel">Update Record</h4></div>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                
                                            </div>
                                            <div class="modal-body">
                                                <div class="wrapper">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                              
                                                                <p>Please edit the input values and submit to update the employee record.</p>
                                                                <form action="companydirectory/libs/php/updateLocation.php" method="post">
                                                                    <div class="form-group idman">
                                                                        <label>id</label>
                                                                        <input type="text" id="editLocationId" name="id" class="form-control" >
                                                                        <span  class="invalid-feedback"></span>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Location</label>
                                                                        <input type="text" id="editPlaceName" name="newLocation" class="form-control" required>
                                                                        <span  class="invalid-feedback"></span>
                                                                    </div>
                                                                    
                                                                
             
                                                            </div>
                                                        </div>        
                                                    </div>
                                                </div>
                                                </div>
                                                           
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <input type='submit' value='Submit' class="btn btn-success">
                </form>
                </div>
                                            
    </div>
</div>
    </div>
    <div class="modal" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        
    <div class="wrapper" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5 mb-3">Delete Record</h2>
                    <form action="companydirectory/libs/php/deletePersonnel.php" method="post">
                        <div class="alert alert-danger">
                            <input type="hidden" name="id" id="deleter" value=""/>
                            <p>Are you sure you want to delete this employee record?</p>
                            
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <button type='button' data-dismiss="modal"  value='No' class="btn btn-secondary">No</button>
                                
                            </p>
                        </div>
                    </form>
                </div>
                </div>
            </div>        
        
    </div>
               </div>
               <div class="modal" id="deleteLocationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                
               <div class="wrapper" >
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="mt-5 mb-3 deleteRecordSign">Delete Record</h2>
                            <form action="companydirectory/libs/php/deleteLocation.php" method="post">
                                <div class="alert alert-danger">
                                    <input type="hidden" name="id" id='deleterLoc' value=""/>
                                    <p id='warningMessage'>Are you sure you want to delete this Location?</p>
                                    
                                        <input id='deleteLocationOptions' type="submit" value="Yes" class="btn btn-danger">
                                        <button type='button' id='closeDeleteModal' data-dismiss="modal"  value='No' class="btn btn-secondary">No</button>
                                    </p>
                                </div>
                            </form>
                        
                        </div>
                    </div>        
                </div>
            </div>
                       </div>
                       <div class="modal" id="deleteDepartmentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        
                        <div class="wrapper" >
                         <div class="container-fluid">
                             <div class="row">
                                 <div class="col-md-12">
                                     <h2 class="mt-5 mb-3 deleteRecordSign">Delete Record</h2>
                                     <form action="companydirectory/libs/php/deleteDepartmentById.php" method="post">
                                         <div class="alert alert-danger">
                                             <input type="hidden" name="id" id='deleterDep' value=""/>
                                             <p id='depWarningMessage'>Are you sure you want to delete this Department?</p>
                                             <p>
                                                 <input id='deleteDepartmentOptions' type="submit" value="Yes" class="btn btn-danger">
                                                 <button type='button' id='closeDepDeleteModal' data-dismiss="modal"  value='No' class="btn btn-secondary">No</button>
                                             </p>
                                         </div>
                                     </form>
                                 
                                 </div>
                             </div>        
                         </div>
                     </div>
                                </div>
               
              
              <!-- Modal -->
              <div class="modal fade" id="addDepartmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="exampleModalLongTitle">Add Department</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <p>Please fill this form and submit to add new department to the database.</p>
                        <form action="companydirectory/libs/php/addNewDepartment.php" method="post">
                            <div class="form-group">
                                <label>Department Name</label>
                                <input type="text" name="name" id="departmentName" class="form-control" required>
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="form-group iddepar">
                                <label>Location</label>
                                <select class="custom-select mr-sm-2 locationSelector" name='locationID' required>
                                    <option value="">Select A Location</option>
                        
                                  </select>
                                
                            <input type="submit" class="btn btn-primary" value="Submit">
                                                <a href="index.html" class="btn btn-secondary ml-2">Cancel</a>
                        </form>
                    </div>
                   </div>
                  </div>
                </div>
              </div>  
              <div class="modal" id="addLocationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="mt-4">Add Location</h2>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
            
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                        
                            <p>Please fill this form and submit to add new location to the database.</p>
                            <form action="companydirectory/libs/php/addLocation.php" method="post">
                                <div class="form-group">
                                    <label>Location</label>
                                    <input type="text" name="locations" id="addLocation" class="form-control" required>
                                    <span class="invalid-feedback"></span>
                                </div>
                                <div class='addFooter'>
                                <input type="submit" class="btn btn-primary" value="Submit">
                                <a href="index.html" class="btn btn-secondary ml-2">Cancel</a>
                                </div>
                                </form>
                            </div>
                        </div>        
                    </div>
                </div>
                
                </div>
            </div>     
            
                <script>
      

</script>
<script src='companydirectory/libs/js/script.js'></script>
</body>
</html>