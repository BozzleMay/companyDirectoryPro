<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <script src="https://github.com/SortableJS/Sortable" type="text/javascript"></script> -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
    <link rel="stylesheet" href="companydirectory/libs/css/styles.css" type='text/css'>
    <!-- <link rel="icon" type="image/png" href="companydirectory/libs/assets/favicon.png"/> -->
    
    
    
 
    <style>
      
   
        
    
       
    </style>
 
</head>
<body>
    <div class='se-pre-con'></div>
    <header class='navbar sticky-top'>
    

          <div class="container-fluid">
            <h2>Company Directory</h2>
          <div class='header__icons'>
            <button type='button' id="employeeSearchButton" class="btn btn-light btn-square-md tableSel" ><i class="fa fa-search"></i> </button>
            <button type='button' id="employeeAddButton" class="btn btn-light btn-square-md tableSel" data-mdb-ripple-color="dark" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> </button> 
            <button type='button' style="display:none;" id="departmentSearchButton" class="btn btn-light btn-square-md tableSel" ><i class="fa fa-search"></i> </button>
            <button type='button' style="display:none;" id="departmentAddButton" class="btn btn-light btn-square-md tableSel" data-toggle="modal" data-target="#addDepartmentModal"><i class="fa fa-plus"></i> </button>
            <button type='button' style="display:none;" id="locationSearchButton" class="btn btn-light btn-square-md tableSel" ><i class="fa fa-search"></i> </button>
                <button type='button' style="display:none;" id='locationAddButton' class="btn btn-light btn-square-md tableSel" data-toggle="modal" data-target="#addLocationModal"><i class="fa fa-plus"></i> </button> 
                        
                        
                        <button type="button" class="btn btn-light btn-square-md tableSel" data-mdb-ripple-color="dark" id='employees__show'><i class="fa fa-user"></i></button>
          <button type="button" class="btn btn-light btn-square-md tableSel" data-mdb-ripple-color="dark" id="departments__show"><i class="fa fa-building-o"></i></button>
          <button type="button" class="btn btn-light btn-square-md tableSel" data-mdb-ripple-color="dark" id='locations__show'>	
            <i class="fa fa-globe"></i></button>
       
    </div>
    </div>

</header>
   <div id='emp' class='container'>
       <div class='addDeetsButton'>
    
       <form style="display:none;" id='employeeSearchForm' action="#" method="get" onsubmit="return false;">
        
        <input class='form-control' type="text" placeholder="Search" aria-hidden="true" size="30" name="q" id="q" value="" onkeyup="doSearch();" />
        </div>
        </form>
        <div class="tableContainer">
                    <table id="myTable" class="sortable table table-bordered table-hover">
                         <thead>
                             <tr>
                                <th style="display:none;">id</th>
                                 <th class='priority-1'>First Name</th>
                                 <th class='priority-1'>Last Name</th>
                                 <th class='priority-6'>Name</th>
                                 <th class='priority-5'>Email</th>
                                 <th class='priority-4'>Department</th>
                                 <th></th>
                                
                             </tr>
                         </thead>
                         <tbody>
                             <tr>

                             </tr>
                             
                        
                         </tbody>
                         <p id="noResults" class="searchres">No Results - Please Search Again</p>
                     </table>
                    </div>
                    </div>
                    <div class='container' id="department_wrapper" >
                        <div class='addDeetsButton'>
                         
                        </div>

               
                        <form style="display:none;" id='departmentSearchForm' action="#" method="get" onsubmit="return false;">
                            <input type="text" class='form-control' placeholder="Search" size="30" name="dq" id="dq" value="" onkeyup="departmentSearch();" />
                            </form>
                            <div class="tableContainer">
                        <table id="departmentTable" class="sortable table table-bordered table-hover">
                             <thead>
                                 <tr>
                                     
                                     <th>Department</th>
                                     <th>Location</th>
                                     <th></th> 
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr>
                                      
                                   
                                     
                                 </tr>
                                 
                            
                             </tbody>   
                             <p id="noDepartmentResults" class='searchres' >No Results - Please Search Again</p>                         
                         </table>
                        </div>
                        </div>
                        <div class='container' id="location_wrapper">
                        <div class='addDeetsButton'>
                            </div>
                        <form style="display:none;" id='locationSearchForm' action="#" method="get" onsubmit="return false;">
                            
                            <input type="text" class='form-control' placeholder="Search" size="30" name="eq" id="eq" value="" onkeyup="locationSearch();" />
                            </form>
                            <table id="locationTable" class="sortable table table-bordered table-hover">
                                 <thead>
                                     <tr>
                                         
                                         
                                      <!--   <th>Interactions</th> -->
                                         <th>Location</th>
                                         
                                         <th></th> 
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <tr>
                                          
                                         
                                         
                                     </tr>
                                
                                 </tbody> 
                                 <p id="noLocationResults" class='searchres'>No Results - Please Search Again</p>                           
                             </table>
                            </div>
                        
                     
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
                                                            <p id='viewDepsInLocation'><ul class ="box"></ul></p>
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
                                    <h4 class="card-header">Department Details</h4>
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
                                                <div class='modal-footer'>
                                                    <button type='button' data-dismiss="modal"  value='No' class="btn btn-secondary">Cancel</button>
                                                <button type="submit" class="btn btn-primary pull-right" value="Submit">Submit</button>
                                                
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
                                <div class="col-md-12">
                                  
                                    
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
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"> Cancel</button>
                                            <button type='submit' value='Submit' class="btn btn-success">Submit</button>
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
                                    <div class="col-md-12">
                                      
                                       
                                        <form action="companydirectory/libs/php/updateDepartment.php" method="post">
                                            <div class="form-group idman">
                                                <label>id</label>
                                                <input type="text" id="editDepartmentId" name="id" class="form-control"  >
                                                <span  class="invalid-feedback"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Department</label>
                                                <input type="text" id="editDepartmentName" name="department" class="form-control" required>
                                                <span  class="invalid-feedback"></span>
                                            </div>
                                            
                                           
                                            <div class="form-group">
                                            <label>Location</label>
                                            <select class="custom-select mr-sm-2 locationSelector" id="editDepartmentLocation" name='locationPicker' value=''>
                                
                    
                              </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancel</button>
                                                <button type='submit' value='Submit' class="btn btn-success">Submit</button>
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
                                                            <div class="col-md-12">
                                                              
                                                              
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancel</button>
                    <button type='submit' value='Submit' class="btn btn-success">Submit</button>
                </form>
                </div>
                                            
    </div>
</div>
    </div>
    <div class="modal" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        
    <div class="deleteWrapper" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5 mb-3">Delete Record</h2>
                    <form action="companydirectory/libs/php/deletePersonnelByID.php" method="post">
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
                
               <div class="deleteWrapper" >
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
                        
                        <div class="deleteWrapper" >
                         <div class="container-fluid">
                             <div class="row">
                                 <div class="col-md-12">
                                     <h2 class="mt-5 mb-3 deleteRecordSign">Delete Record</h2>
                                     <form action="companydirectory/libs/php/deleteDepartmentByID.php" method="post" role="form">
                                         <div class="alert alert-danger">
                                             <input type="hidden" name="id" id='deleterDep' value=""/>
                                             <p id='depWarningMessage'>Are you sure you want to delete this Department?</p>
                                             <p>
                                                 <button id='deleteDepartmentOptions' type="submit" value="Yes" class="btn btn-danger">Yes</button>
                                                 <button type='button' id='closeDepDeleteModal' data-dismiss="modal"  value='No' class="btn btn-secondary">No</button>
                                             </p>
                                         </div>
                                     </form>
                                 
                                 </div>
                             </div>        
                         </div>
                     </div>
                                </div>
                                <div class="modal" id="deleteDepartmentNoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        
                                    <div class="deleteWrapper" >
                                     <div class="container-fluid">
                                         <div class="row">
                                             <div class="col-md-12">
                                                 <h2 class="mt-5 mb-3 deleteRecordSign">Delete Record</h2>
                                                 
                                                     <div class="alert alert-danger">
                                                         
                                                         <p id='depWarningMessage'>This department has employees linked to it. Please remove any linked employees before you attempt to delete.</p>
                                                         <p>
                                                             
                                                             <button type='button' id='closeDepDeleteModal' data-dismiss="modal"  value='No' class="btn btn-secondary">Close</button>
                                                         </p>
                                                     </div>
                                                 
                                             
                                             </div>
                                         </div>        
                                     </div>
                                 </div>
                                            </div>
                                            <div class="modal" id="deleteLocationNoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        
                                                <div class="deleteWrapper" >
                                                 <div class="container-fluid">
                                                     <div class="row">
                                                         <div class="col-md-12">
                                                             <h2 class="mt-5 mb-3 deleteRecordSign">Delete Record</h2>
                                                             
                                                                 <div class="alert alert-danger">
                                                                     
                                                                     <p id='depWarningMessage'>This location has departments linked to it. Please remove any linked departments before you attempt to delete.</p>
                                                                     <p>
                                                                         
                                                                         <button type='button' id='closeDepDeleteModal' data-dismiss="modal"  value='No' class="btn btn-secondary">Close</button>
                                                                     </p>
                                                                 </div>
                                                             
                                                         
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
                                <div class='modal-footer'>
                                    <button type='button' data-dismiss="modal"  value='No' class="btn btn-secondary">Cancel</button>
                            <button input type="submit" class="btn btn-primary" value="Submit">Submit</button>
                            
                                            </div>
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
                                <div class='modal-footer'>
                                    <button type='button' data-dismiss="modal"  value='No' class="btn btn-secondary">Cancel</button>
                                <button type="submit" class="btn btn-primary" value="Submit">Submit</button>
                              
                                </div>
                                </form>
                            </div>
                        </div>        
                    </div>
                </div>
                
                </div>
            </div>    
            <script>
            $("#noResults").hide();
            function doSearch() {
                var q = document.getElementById("q");
                var v = q.value.toLowerCase();
                var rows = document.getElementsByTagName("tr");
                console.log(rows)
                var on = 0;
                for ( var i = 2; i < rows.length; i++ ) {
                  var fullname = rows[i].getElementsByTagName("td");
                  console.log(rows.length)
                  let firstName = fullname[1].innerHTML.toLowerCase();
                  let surName = fullname[2].innerHTML.toLowerCase();
                  let searchEmail = fullname[4].innerHTML.toLowerCase();
                  let searchDepar = fullname[5].innerHTML.toLowerCase();
                  
          

                  if ( firstName ) {
                      if ( v.length == 0 || (v.length < 3 && firstName.indexOf(v) == 0) || (v.length >= 3 && firstName.indexOf(v) > -1 ) || (v.length < 3 && surName.indexOf(v) == 0) || (v.length >= 3 && surName.indexOf(v) > -1 ) || (v.length < 3 && searchEmail.indexOf(v) == 0) || (v.length >= 3 && searchEmail.indexOf(v) > -1 ) || (v.length < 3 && searchDepar.indexOf(v) == 0) || (v.length >= 3 && searchDepar.indexOf(v) > -1 ) ) {
                      rows[i].style.display = "";
                      on++;
                      console.log(on)
                      
                    } else {
                      rows[i].style.display = "none";
                      
                      
                     

                     
                    }
                  } 
                  let a = document.querySelectorAll('td')
                if (a && on > 0){
                    $("#noResults").hide()}
                else{
                    $("#noResults").show()
                   
                    
                }
                 
                }
              
            
              } 
              $("#noDepartmentResults").hide();
              function departmentSearch() {
                var s = document.getElementById("dq");
                var t = s.value.toLowerCase();
                var rows = departmentTable.getElementsByTagName("tr");
                console.log(rows)
                var on = 0;
                for ( var i = 2; i < rows.length; i++ ) {
                  var departmentName = rows[i].getElementsByTagName("td");
                 
                  let department = departmentName[0].innerHTML.toLowerCase()
                  let location = departmentName[1].innerHTML.toLowerCase()
                    

                  if ( departmentName ) {
                      if ( t.length == 0 || (t.length < 3 && department.indexOf(t) == 0) || (t.length >= 3 && department.indexOf(t) > -1 ) || (t.length < 3 && location.indexOf(t) == 0) || (t.length >= 3 && location.indexOf(t) > -1 ) ) {
                      rows[i].style.display = "";
                      on++;
                    } else {
                      rows[i].style.display = "none";
                    }
                  } 
                  let b = departmentTable.querySelectorAll('td')
                if (b && on > 0){
                    $("#noDepartmentResults").hide()}
                else{
                    $("#noDepartmentResults").show()
                   
                    
                }
                 
                }
              } 
              $("#noLocationResults").hide();
              function locationSearch() {
                var s = document.getElementById("eq");
                var t = s.value.toLowerCase();
                var rows = locationTable.getElementsByTagName("tr");
                console.log(rows)
                var on = 0;
                for ( var i = 2; i < rows.length; i++ ) {
                  var locationName = rows[i].getElementsByTagName("td");
                 
                  let location = locationName[0].innerHTML.toLowerCase()
                  
                  
                    

                  if ( location ) {
                      if ( t.length == 0 || (t.length < 3 && location.indexOf(t) == 0) || (t.length >= 3 && location.indexOf(t) > -1 )   ) {
                      rows[i].style.display = "";
                      on++;
                    } else {
                      rows[i].style.display = "none";
                    }
                  } 
                  let c = locationTable.querySelectorAll('td')
                if (c && on > 0){
                    $("#noLocationResults").hide()}
                else{
                    $("#noLocationResults").show()
                   
                    
                }
                
                 
                }
              } 
             
          
             
        
     </script>
     
            <script src='companydirectory/libs/js/script.js'></script>
                
      




</body>
</html>
