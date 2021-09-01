        $(document).ready(function (){
          var selected = [];
          
          
        
          $("#employees__show").click(function(){
            $("#department_wrapper").hide();
            $("#emp").show();
            $("#location_wrapper").hide();
            
          });
          $("#departments__show").click(function(){
            $("#emp").hide();
            $("#location_wrapper").hide();
            $("#department_wrapper").show();
          });
          $("#locations__show").click(function(){
            $("#emp").hide();
            $("#department_wrapper").hide();
            $("#location_wrapper").show();
          });



        $.ajax({
          url:  "companydirectory/libs/php/getallDepartments.php",
          type: 'POST',
          dataType: 'json',
      
      
          success: function (result) {
      
              //  if (result.status.name == "ok") {
      
      
              for (let i = 0; i < result.data.length; i++) {
                  $('.department').append($('<option>', {
                      value: result.data[i].id,
                      text: result.data[i].name
                  }))
                  
                }

                
               
                
                 
              
              // } 
      
      
          },
          error: function (jqXHR, textStatus, errorThrown) {
      
          }
      })
      $.ajax({
        url:  "companydirectory/libs/php/getLocation.php",
        type: 'POST',
        dataType: 'json',
    
    
        success: function (result) {
    
            //  if (result.status.name == "ok") {
    
    
            for (let i = 0; i < result.data.length; i++) {
                $('.locationSelector').append($('<option>', {
                    value: result.data[i].id,
                    text: result.data[i].name
                }))
                console.log(result.data[i].name)
              }
          
             
              
               
            
            // } 
    
    
        },
        error: function (jqXHR, textStatus, errorThrown) {
    
        }
    })
      $(document).ready(function(){
        $(document).on('click', '.edit', function(){
          var id=$(this).val();
          var first=$('#firstname'+id).text();
          var last=$('#lastname'+id).text();
          
       
          $('#edit').modal('show');
          $('#efirstname').val(first);
          $('#elastname').val(last);
          
        });
      });
         
      
      $.ajax({
        url:  "./companydirectory/libs/php/getAllDepartments.php",
        type: 'POST',
        dataType: 'json',
    
    
        success: function (result) {
          
            //  if (result.status.name == "ok") {
           
            console.log(result)
          
              for (let i = 0; i < result.data.length; i++) {
                                
                var row = $('<tr class="odd">');
                row.append("<td style='display: none;'>" + result.data[i].id + '</td>');
                row.append('<td class="sorting_1" >' + result.data[i].name + '</td>');
                row.append('<td class="sorting_1">' + result.data[i].location + '</td>');
                row.append("<td><div style='display:inline-block;'> <button class='btn' id='viewDepartmentButton' data-toggle='modal' data-target='#viewDepartmentModal'><i class='fa fa-eye text-warning'></i></button><button class='btn' id='editDepartmentButton' data-toggle='modal' data-target='#editDepartmentModal'><i class='fa fa-pencil text-primary'></i></button><button class='btn' id='deleteDepartmentButton' data-toggle='modal' data-target='#deleteDepartmentModal'><i class='fa fa-trash text-danger'></i></button></div></td>")

                $('#departmentTable').append(row)

               
              
              }
              
              
            
            // } 
    
    
        },
        error: function (jqXHR, textStatus, errorThrown) {
    
        }
    })

    
    $("#deleteDepartmentModal form").submit((e) => {
    // e.preventDefault();
     
      $.ajax({ url: 'companydirectory/libs/php/deleteDepartmentById.php',
       type: 'get',
       id: $("#deleteDep").val(),
       async: false,
       dataType: "json",
      success: function(output) {
        console.log(output)
        
        
        if (output.status.code === '400'){
       
          alert("Can't delete")
          
         } else {
        //  window.location.replace("/CompanyDirectory/companyDirectoryPro/index.html")
       //   window.location.replace("/CompanyDirectory/companyDirectoryPro/index.html")
          console.log('biscuits')
         }
        
        
                                                       },
                                                       error: function (jqXHR, textStatus, errorThrown) {
                                                        console.log('no')
                                                     }
                                          });
      })
      
   
  

 $.ajax({
    url:  "./companydirectory/libs/php/getAll.php",
    type: 'POST',
    dataType: 'json',


    success: function (result) {
      
        //  if (result.status.name == "ok") {
        
        console.log(result)
       
          for (let i = 0; i < result.data.length; i++) {

            var row = $('<tr class="odd">');
            row.append("<td style='display: none;' data-target='#viewModal'>" + result.data[i].id + '</td>');
            row.append('<td class="sorting_1">' + result.data[i].firstName + '</td>');
            row.append('<td class="sorting_1">' + result.data[i].lastName + '</td>');
            row.append('<td class="sorting_1">' + result.data[i].email + '</td>');
            row.append('<td class="sorting_1">' + result.data[i].department + '</td>');
            row.append('<td style="display: none;" class="sorting_1">' + result.data[i].jobTitle + '</td>');
            row.append("<td class='sorting_1'><button class='btn' id='viewButton' data-toggle='modal' data-target='#viewModal'><i class='fa fa-eye text-warning'></i></button><button class='btn' id='editButton' data-toggle='modal' data-target='#edit'><i class='fa fa-pencil text-primary'></i></button><button class='btn' id='deleteButton' data-toggle='modal' data-target='#deleteModal'><i class='fa fa-trash text-danger'></i></button></td>")
            
            $('#myTable tbody').append(row)
      
     
           
           
          }
          
           
      
          
       /*   $(document).ready( function () {
            $('#myTable').DataTable();
        } ); */
            
          
          
          
        
        // } 


    },
    error: function (jqXHR, textStatus, errorThrown) {

    }
})


$.ajax({
  url:  "./companydirectory/libs/php/getLocation.php",
  type: 'POST',
  dataType: 'json',


  success: function (result) {
    
      //  if (result.status.name == "ok") {
     
      console.log(result)
    
        for (let i = 0; i < result.data.length; i++) {
                          
          var row = $('<tr class="odd">');
          row.append("<td>" + result.data[i].id + '</td>');
          row.append('<td class="sorting_1">' + result.data[i].name + '</td>');
          row.append("<td><button class='btn' id='viewLocationButton' data-toggle='modal' data-target='#viewLocationModal'><i class='fa fa-eye text-warning'></i></button><button class='btn' id='editLocationButton' data-toggle='modal' data-target='#editLocation'><i class='fa fa-pencil text-primary'></i></button><button class='btn' id='deleteLocationButton' data-toggle='modal' data-target='#deleteLocationModal'><i class='fa fa-trash text-danger'></i></button></td>")
          $('#locationTable').append(row)
        
          
          
        }
        
        
      
      // } 


  },
  error: function (jqXHR, textStatus, errorThrown) {

  }
})

	

/*
var table = $('#myTable').DataTable({
  
ajax: {
  url:  "http://localhost/CompanyDirectory/companyDirectoryPro/companydirectory/libs/php/getall.php",
  dataSrc: 'data',
  cache: true,
  responsive: true,
  "columnDefs": [ {
    "targets": -1,
    "data": null,
    
} ]
 


},
columns: [{data: 'firstName'},
{data: 'lastName'},
{data: 'email'},
{data: 'department'},
{"defaultContent": "<button class='btn' id='viewButton' data-toggle='modal' data-target='#viewModal'><i class='fa fa-eye text-warning'></i></button><button class='btn' id='editButton' data-toggle='modal' data-target='#edit'><i class='fa fa-pencil text-primary'></i></button><button class='btn' id='deleteButton' data-toggle='modal' data-target='#deleteModal'><i class='fa fa-trash text-danger'></i></button>"},
          
        ],
        
    
      //  if (result.status.name == "ok") {
     
        
        
      
      // } 

      })
      
var departmentTable = $('#departmentTable').DataTable({
ajax: {
  url:  "http://localhost/CompanyDirectory/companyDirectoryPro/companydirectory/libs/php/getallDepartments.php",
  dataSrc: 'data',
  cache: true,
  responsive: true,



  


},
columns: [{data: 'name'},
          {data: 'location'},
          {"defaultContent": "<div style='display:inline-block;'> <button class='btn' id='viewDepartmentButton' data-toggle='modal' data-target='#viewDepartmentModal'><i class='fa fa-eye text-warning'></i></button><button class='btn' id='editDepartmentButton' data-toggle='modal' data-target='#editDepartmentModal'><i class='fa fa-pencil text-primary'></i></button><button class='btn' id='deleteDepartmentButton' data-toggle='modal' data-target='#deleteDepartmentModal'><i class='fa fa-trash text-danger'></i></button></div>"},

          
        ]
      
        
        
  
    
      //  if (result.status.name == "ok") {
     

    
    
          
          
        
        
        
      
      // } 

      })
      var locationTableS = $('#locationTable').DataTable({
  
        ajax: {
          url:  "http://localhost/CompanyDirectory/companyDirectoryPro/companydirectory/libs/php/getLocation.php",
          dataSrc: 'data',
          cache: true,
          responsive: true,
          "columnDefs": [ {
            "targets": -1,
            "data": null,
            
        } ]
         
        
        
        },
        columns: [
          {data: 'id'},
          {data: 'name'},
        {"defaultContent": "<button class='btn' id='viewLocationButton' data-toggle='modal' data-target='#viewLocationModal'><i class='fa fa-eye text-warning'></i></button><button class='btn' id='editLocationButton' data-toggle='modal' data-target='#editLocation'><i class='fa fa-pencil text-primary'></i></button><button class='btn' id='deleteLocationButton' data-toggle='modal' data-target='#deleteLocationModal'><i class='fa fa-trash text-danger'></i></button>"},
                  
                ],
              })

      $.ajax({
        url:  "./libs/php/getallDepartments.php",
        type: 'POST',
        dataType: 'json',
    
    
        success: function (result) {
    
            //  if (result.status.name == "ok") {
    
              $('#adddepar').val(result.data.length + 1)
            
                console.log(result.data)
              
          
             
              
               
            
            // } 
    
    
        },
        error: function (jqXHR, textStatus, errorThrown) {
    
        }
    })
    
*/

    
  
$('#myTable tbody').on('click', '#deleteButton', (e) => {
  let rowInfo = $(e.target).parent().parent().siblings().toArray();
  var idToDel = rowInfo[0].innerHTML
  console.log(idToDel)
  $('#deleter').prop("value", idToDel)
  console.log('this', rowInfo[0].innerHTML)
console.log($('#deleter').prop("value", idToDel))
}) 
$('#myTable tbody').on( 'click', '#viewButton', function (e) {
  let rowInfo = $(this).parent().parent().children()
  $('#viewFirstName').html(rowInfo[1].innerHTML)
  $('#viewLastName').html(rowInfo[2].innerHTML)
  $('#viewEmail').html(rowInfo[3].innerHTML)
  $('#viewDepartment').html(rowInfo[4].innerHTML)
  if (rowInfo[5].innerHTML){
  $('#viewJob').html(rowInfo[5].innerHTML)
  }
  else{
    $('#viewJob').html('N/A')
  }
  console.log(rowInfo)
  
  
 
} );
$('#myTable tbody').on( 'click', '#editButton', function (e) {
  let rowInfo = $(this).parent().parent().children()
  console.log(rowInfo)
  $('#editId').val(rowInfo[0].innerHTML)
  $('#editFirstName').val(rowInfo[1].innerHTML)
  $('#editLastName').val(rowInfo[2].innerHTML)
  $('#editEmail').val(rowInfo[3].innerHTML)
  $('#editDepartment  option:selected').text(rowInfo[4].innerHTML)
 // $('#editDepartment  option:selected').val(rowInfo[0].innerHTML)
 // $('#editJob').val(rowInfo[4].innerHTML)
 
} );
$('#myTable').on('click','#editButton',function(e){
  row = $(this).parent().parent().children()
  console.log(row[0].innerHTML)
})
$('#departmentTable tbody').on('click', '#deleteDepartmentButton', (e) => {
  let idToDelDep = ($(e.target).parent().parent().parent().siblings()[0].innerHTML)
 
  $('#deleterDep').prop("value", idToDelDep)


})
$('#departmentTable tbody').on( 'click', '#viewDepartmentButton', function (e) {
  let rowInfo = $(this).parent().parent().parent().children()
  console.log(rowInfo[1].innerHTML)
 $('#viewDepartmentList').html(rowInfo[1].innerHTML)
  $('#viewLocsInDepartment').html(rowInfo[2].innerHTML)

  $.ajax({
    url:  "companydirectory/libs/php/getall.php",
    type: 'POST',
    dataType: 'json',
  
  
    success: function (result) {
  
        //  if (result.status.name == "ok") {
          let departmentArray = []
          let counter = 0;
          console.log(result)
          
          for (let m = 0; m < result.data.length; m++) {
          if (result.data[m].department === rowInfo[1].innerHTML){
          departmentArray.push(result.data[m].department)
          counter +=1
  
          }
          
          
          
          }
          console.log(departmentArray.length)
          $('#departmentLength').html(counter)
         
        // } 
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log('err0r')
    }
  })
  })
  $('#departmentTable tbody').on( 'click', '#editDepartmentButton', function () {
    let rowInfo = $(this).parent().parent().parent().children()
    $('#editDepartmentId').val(rowInfo[0].innerHTML)
   $('#editDepartmentName').val(rowInfo[1].innerHTML)
   $('#editDepartmentLocation  option:selected').text(rowInfo[2].innerHTML)
   $('#editDepartmentLocation option:selected').value(rowInfo[0].innerHTML)
  
  console.log(rowInfo[1].innerHTML)

  })
  $('#locationTable tbody').on( 'click', '#deleteLocationButton', function (e) {
    let idToDelLo = $(e.target).parent().parent().siblings()[0].innerHTML
    
   

    console.log()
  
  
    $('#deleterLoc').prop("value", idToDelLo)
  
          // } 
    
  })
  

  $('#locationTable tbody').on( 'click', '#viewLocationButton', function () {
    let rowInfo = $(this).parent().parent().children()
    console.log(rowInfo)
   $('#viewLocationList').html(rowInfo[1].innerHTML)
   $(".box").empty()
   
  
  //} );
  
  $.ajax({
    url:  "companydirectory/libs/php/getallDepartments.php",
    type: 'POST',
    dataType: 'json',
  
  
    success: function (result) {
  
        //  if (result.status.name == "ok") {
          let trialsArray = []
          for (let j = 0; j < result.data.length; j++) {
          if (result.data[j].location === rowInfo[1].innerHTML){
          trialsArray.push(result.data[j].name)
  
          }
          
          }
          console.log(trialsArray)
          for (let i = 0; i < trialsArray.length; i++) {
          console.log(trialsArray[i])
          
          $(".box").append("<li><b>" + trialsArray[i] + "</b></li>")
        }
        
        // } 
  
  
    },
    error: function (jqXHR, textStatus, errorThrown) {
  
    }
  
  })
  
  })
  console.log('wprking')
  $('#locationTable tbody').on( 'click', '#editLocationButton', function () {
    let rowInfo = $(this).parent().parent().children()
    $('#editLocationId').val(rowInfo[0].innerHTML)
   $('#editPlaceName').val(rowInfo[1].innerHTML)
    console.log(data)
  })
  
 



  /*


  
  console.log(data.department.length );
} );
$('#myTable tbody').on( 'click', '#editButton', function () {
  var data = table.row( $(this).parents('tr') ).data();
  $('#editId').val(data.id)
  $('#editFirstName').val(data.firstName)
  $('#editLastName').val(data.lastName)
  $('#editEmail').val(data.email)
  $('#editDepartment  option:selected').text(data.department)
  $('#editJob').val(data.jobTitle)
  console.log(data );
} );
$('#myTable tbody').on( 'click', '#deleteButton', function () {
  var data = table.row( $(this).parents('tr') ).data();
  var idToDel = data.id
  console.log(idToDel)
  $('#deleter').prop("value", idToDel)
        // } 
  
})

  

$('#departmentTable tbody').on( 'click', '#deleteDepartmentButton', function () {
  var data = departmentTable.row( $(this).parents('tr') ).data();
  var idToDelDep = data.id
  console.log(idToDelDep)
  $('#deleterDep').prop("value", idToDelDep)

  $.ajax({
    url:  "companydirectory/libs/php/getall.php",
    type: 'POST',
    dataType: 'json',
  
  
    success: function (result) {
  
        //  if (result.status.name == "ok") {
          let departmentArray = []
          let counter = 0;
         
          for (let m = 0; m < result.data.length; m++) {
          if (result.data[m].department === data.name){
          departmentArray.push(result.data[m].department)
          counter +=1
  
          }
          
          
          
          }
          console.log('this is,', counter)
          if (counter === 0){
            console.log('should be')
            $('.deleteRecordSign').text('Delete Record')
            $('#closeDepDeleteModal').text('No')
            $('#deleteDepartmentOptions').attr("style", "display:inline-block;")
            $('#depWarningMessage').html('<p>Are you sure you want to delete this Department? </p>')
        
          } else {
            $('#deleteDepartmentOptions').attr("style", "display:none;")
          console.log(counter)
          $('#depWarningMessage').html('<h5>This location has current employee(s). If you wish to delete, you will need to remove all employee(s) linked to the department. </h5>')
          $('#closeDepDeleteModal').text('Close')
      $('.deleteRecordSign').text('Unable To Delete Record')
          
          }
          
        // } 
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log('err0r')
    }
  })
  
  

        // } 
  
})
$('#locationTable tbody').on( 'click', '#deleteLocationButton', function () {
  var data = locationTableS.row( $(this).parents('tr') ).data();
  var idToDelLo = data.id
  
  $('#deleterLoc').prop("value", idToDelLo)

        // } 
  
})
$('#locationTable tbody').on( 'click', '#editLocationButton', function () {
  var data = locationTableS.row( $(this).parents('tr') ).data();
  $('#editLocationId').val(data.id)
 $('#editPlaceName').val(data.name)
  console.log(data)
})
$('#departmentTable tbody').on( 'click', '#editDepartmentButton', function () {
  var data = departmentTable.row( $(this).parents('tr') ).data();
  $('#editDepartmentId').val(data.id)
 $('#editDepartmentName').val(data.name)
 $('#editDepartmentLocation  option:selected').text(data.location)
  console.log(data)
})
$('#departmentTable tbody').on( 'click', '#viewDepartmentButton', function () {
  var data = departmentTable.row( $(this).parents('tr') ).data();
  $('#viewDepartmentList').html(data.name)
  $('#viewLocsInDepartment').html(data.location)

  $.ajax({
    url:  "companydirectory/libs/php/getall.php",
    type: 'POST',
    dataType: 'json',
  
  
    success: function (result) {
  
        //  if (result.status.name == "ok") {
          let departmentArray = []
          let counter = 0;
          console.log(result)
          console.log(data)
          for (let m = 0; m < result.data.length; m++) {
          if (result.data[m].department === data.name){
          departmentArray.push(result.data[m].department)
          counter +=1
  
          }
          
          
          
          }
          console.log(departmentArray.length)
          $('#departmentLength').html(counter)
         
        // } 
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log('err0r')
    }
  })
  })


  
$('#locationTable tbody').on( 'click', '#viewLocationButton', function () {
  var data = locationTableS.row( $(this).parents('tr') ).data();
 $('#viewLocationList').html(data.name)
 $(".box").empty()
 
  console.log(data );
//} );

$.ajax({
  url:  "companydirectory/libs/php/getallDepartments.php",
  type: 'POST',
  dataType: 'json',


  success: function (result) {

      //  if (result.status.name == "ok") {
        let trialsArray = []
        for (let j = 0; j < result.data.length; j++) {
        if (result.data[j].location === data.name){
        trialsArray.push(result.data[j].name)

        }
        
        }
        console.log(trialsArray)
        for (let i = 0; i < trialsArray.length; i++) {
        console.log(trialsArray[i])
        
        $(".box").append("<li><b>" + trialsArray[i] + "</b></li>")
      }
      
      // } 


  },
  error: function (jqXHR, textStatus, errorThrown) {

  }

})

})
console.log('wprking')
$('#locationTable tbody').on( 'click', '#deleteLocationButton', function () {
  var data = locationTableS.row( $(this).parents('tr') ).data();
  $.ajax({
    url:  "companydirectory/libs/php/getallDepartments.php",
    type: 'POST',
    dataType: 'json',
  
    success: function (result) {
      console.log(result)
      let departmentsArray = []
      for (let j = 0; j < result.data.length; j++) {
      if (result.data[j].location === data.name){
        departmentsArray.push(result.data[j].name)
      }

      }
      console.log(departmentsArray)
      if (departmentsArray.length != 0){
        $('.deleteRecordSign').text('Unable To Delete Record')
        $('#closeDeleteModal').text('Close')
        $('#deleteLocationOptions').attr("style", "display:none;")
      
      $('#warningMessage').html('<h5>This location has current department(s). If you wish to delete, you will need to remove all department(s) linked to the location. </h5>')

      } else {
      //  $('deleteLocationButton[data-target="#deleteLocationModal"]').attr("data-target", "#noDiceModal")
      $('#deleteLocationOptions').attr("style", "display:inline-block;")
      $('#closeDeleteModal').text('No')
      $('.deleteRecordSign').text('Delete Record')
      $('#warningMessage').html('<p>Are you sure you want to delete this Location? </p>')
       console.log('works')
      }
}, error: function (jqXHR, textStatus, errorThrown) {
console.log('It did not work')
}
})
})
*/


})
     




