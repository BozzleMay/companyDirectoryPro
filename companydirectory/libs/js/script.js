$(window).on('load', function () {
  // Animate loader off screen
  $(".se-pre-con").fadeOut("slow");;
});

                                      
       $(document).ready(function (){
       
        
              
         
        $("#locationSearchButton").click(function(){
          $("#locationSearchForm").toggle()
        })
        $("#departmentSearchButton").click(function(){
          $("#departmentSearchForm").toggle()
        })
        $("#employeeSearchButton").click(function(){
          $("#employeeSearchForm").toggle()
        })
        
          
        
          $("#employees__show").click(function(){
            $("#department_wrapper").hide();
            $("#emp").show();
            $("#location_wrapper").hide();
            $('#employeeSearchButton').show()
            $('#employeeAddButton').show()
            $('#departmentAddButton').hide()
            $('#departmentSearchButton').hide()
            $('#locationSearchButton').hide()
            $('#locationAddButton').hide()  
            
          });
          $("#departments__show").click(function(){
            $("#emp").hide();
            $("#location_wrapper").hide();
            $("#department_wrapper").show();
            $('#employeeSearchButton').hide()
            $('#employeeAddButton').hide()
            $('#departmentSearchButton').show()
            $('#departmentAddButton').show()
            $('#locationSearchButton').hide()
            $('#locationAddButton').hide()
            
          });
          $("#locations__show").click(function(){
            $("#emp").hide();
            $("#department_wrapper").hide();
            $("#location_wrapper").show();
            $('#locationSearchButton').show()
            $('#locationAddButton').show()
            $('#employeeSearchButton').hide()
            $('#employeeAddButton').hide()
            $('#departmentSearchButton').hide()
            $('#departmentAddButton').hide()
          });



        $.ajax({
          url:  "companydirectory/libs/php/getAllDepartments.php",
          type: 'POST',
          dataType: 'json',
      
      
          success: function (result) {
            result.data.sort(function(a,b){ return a.name.localeCompare(b.name); });
              //  if (result.status.name == "ok") {
              console.log(result.data.name)
      
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
              result.data.sort(function(a,b){ return a.name.localeCompare(b.name); });
    
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
           
            result.data.sort(function(a,b){ return a.name.localeCompare(b.name); });
              for (let i = 0; i < result.data.length; i++) {
                  
                        
                               
                var row = $('<tr class="odd">');
               
                
                row.append('<td class="sorting_1">' + result.data[i].name + '</td>');
                row.append('<td class="sorting_1">' + result.data[i].location + '</td>');
                row.append("<td style='display:none;'>" + result.data[i].id + '</td>');
                row.append("<td><div style='display:inline-block;'> <button class='btn needBlur' id='viewDepartmentButton' data-toggle='modal' data-target='#viewDepartmentModal'><i class='fa fa-eye text-warning'></i></button><button class='btn needBlur' id='editDepartmentButton' data-toggle='modal' data-target='#editDepartmentModal'><i class='fa fa-pencil text-primary'></i></button><button class='btn needBlur' id='deleteDepartmentButton' data-toggle='modal' data-target='#deleteDepartmentModal'><i class='fa fa-trash text-danger'></i></button></div></td>")
                

                $('#departmentTable').append(row)

               
              
              }
              
              
            
            // } 
    
    
        },
        error: function (jqXHR, textStatus, errorThrown) {
    
        }
    })
   
    

    
    
    $.ajax({ url: 'companydirectory/libs/php/deleteDepartmentByID.php',
    type: 'POST',
    data: { id:$("#deleterDep").val()},
    dataType: "json",
   success: function(output) {
     console.log(output)
    
       },
        error: function (jqXHR, textStatus, errorThrown) {
       console.log('Did not work')
                                                  }
                                       });
   
    
    
                                       
                                       
   
  

 $.ajax({
    url:  "./companydirectory/libs/php/getAll.php",
    type: 'POST',
    dataType: 'json',


    success: function (result) {
      
        //  if (result.status.name == "ok") {
          result.data.sort(function(a,b){ return a.lastName.localeCompare(b.lastName); });
        console.log(result.data)
        
          for (let i = 0; i < result.data.length; i++) {

            var row = $('<tr class="odd">');
            row.append("<td style='display: none;'>" + result.data[i].id + '</td>');
            row.append('<td class="sorting_1 priority-1">' + result.data[i].firstName + '</td>');
            row.append('<td class="sorting_1 priority-1">' + result.data[i].lastName + '</td>');
            row.append('<td class="sorting_1 priority-6">' + result.data[i].lastName + ', ' + result.data[i].firstName + '</td>');
            row.append('<td class="sorting_1 priority-5">' + result.data[i].email + '</td>');
            row.append('<td class="sorting_1 priority-4">' + result.data[i].department + '</td>');
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
      result.data.sort(function(a,b){ return a.name.localeCompare(b.name); });
        for (let i = 0; i < result.data.length; i++) {
                          
          var row = $('<tr class="odd">');
          
          row.append('<td class="sorting_1">' + result.data[i].name + '</td>');
          row.append("<td style='display:none;'>" + result.data[i].id + '</td>');
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
  $('#viewEmail').html(rowInfo[4].innerHTML)
  $('#viewDepartment').html(rowInfo[5].innerHTML)
  if (rowInfo[6].innerHTML){
  $('#viewJob').html(rowInfo[6].innerHTML)
  }
  else{
    $('#viewJob').html('N/A')
  }
  console.log(rowInfo)
  
  
 
} );
$('#myTable tbody').on( 'click', '#editButton', function (e) {
  let rowInfo = $(this).parent().parent().children()
 
 $.ajax({
  url:  "companydirectory/libs/php/getAll.php",
  type: 'POST',
  dataType: 'json',


  success: function (result) {

      //  if (result.status.name == "ok") {
  
        console.log(result.data.length)
        for (let i=0; i < result.data.length; i++){
          
          if (result.data[i].id == rowInfo[0].innerHTML){
            
            console.log(result.data[i].department)
            $('#editId').val(result.data[i].id)
            $('#editFirstName').val(result.data[i].firstName)
            $('#editLastName').val(result.data[i].lastName)
            $('#editEmail').val(result.data[i].email)
            $('#editJob').val(result.data[i].jobTitle)
           // $('#editDepartment option:selected').prop()
           $('#editDepartment option').each(function(){
           if($(this).text() == result.data[i].department){
             $(this).attr('selected', 'selected')
           }
          })
          
          
          }
        }
        
 

        
        
        
        
        
       
       
      // } 
  },
  error: function (jqXHR, textStatus, errorThrown) {
    console.log('err0r')
  }
})
 
} );
$('#myTable').on('click','#editButton',function(e){
  row = $(this).parent().parent().children()
  console.log(row[0].innerHTML)
})
$('#departmentTable tbody').on('click', '#deleteDepartmentButton', (e) => {
  var currentRow=$(e.target).closest("tr");
  let idToDelDep = currentRow.find("td:eq(2)").text();
  console.log(idToDelDep)
 // let idToDelDep = ($(e.target).parent().parent().parent().siblings()[2].innerHTML)
  $('#deleterTrial').prop("value", idToDelDep)
  // console.log(idToDelDep)
  
  $.ajax({
    url:  `companydirectory/libs/php/verifyDepartment.php`,
    type: 'POST',
    dataType: 'json',
   data: {val: idToDelDep},
  
    success: function (result) {
  
        //  if (result.status.name == "ok") {
       
      if (result.data[0].pc > 0){
      e.preventDefault()
        $('#deleteDepartmentModal').modal('hide')
        $('#deleteDepartmentNoModal').modal('show')
        console.log('add something')
      }  
          console.log(result.data[0].pc)
          console.log(idToDelDep)
          
          
         
         
        // } 
    },
    error: function (jqXHR, textStatus, errorThrown) {
     console.log('nope')
    }
  })
 
  $('#deleterDep').prop("value", idToDelDep)
  console.log(e)

})
$('#departmentTable tbody').on( 'click', '#viewDepartmentButton', function (e) {
  let rowInfo = $(this).parent().parent().parent().children()
  console.log(rowInfo[1].innerHTML)
 $('#viewDepartmentList').html(rowInfo[0].innerHTML)
  $('#viewLocsInDepartment').html(rowInfo[1].innerHTML)

  $.ajax({
    url:  "companydirectory/libs/php/getAll.php",
    type: 'POST',
    dataType: 'json',
  
  
    success: function (result) {
  
        //  if (result.status.name == "ok") {
          let departmentArray = []
          let counter = 0;
          console.log(result)
          
          for (let m = 0; m < result.data.length; m++) {
          if (result.data[m].department === rowInfo[0].innerHTML){
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
    console.log(rowInfo)
   // $('#editDepartmentId').val(rowInfo[0].innerHTML)
   // $('#editDepartmentName').val(rowInfo[1].innerHTML)
   //$('#editDepartmentLocation  option:selected').text(rowInfo[2].innerHTML)
   //$('#editDepartmentLocation option:selected').value(rowInfo[0].innerHTML)
   $.ajax({
    url:  "companydirectory/libs/php/getAllDepartments.php",
    type: 'POST',
    dataType: 'json',
  
  
    success: function (result) {
  
        //  if (result.status.name == "ok") {
    
          console.log(result)
          for (let j=0; j < result.data.length; j++){
            if (result.data[j].id === rowInfo[2].innerHTML){
              console.log(result.data[j])
              $('#editDepartmentId').val(result.data[j].id)
              $('#editDepartmentName').val(result.data[j].name)
                // $('#editDepartment option:selected').prop()
           $('#editDepartmentLocation option').each(function(){
            if($(this).text() == result.data[j].location){
              $(this).attr('selected', 'selected')
            }
           })
              //$('#editDepartmentLocation  option:selected').text()
              
            
            }
          }
          
   
  
          
          
          
          
          
         
         
        // } 
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log('err0r')
    }
  })
   
  
  

  })
  $('#locationTable tbody').on( 'click', '#deleteLocationButton', function (e) {
  //  let idToDelLo = $(e.target).parent().parent().siblings()[1].innerHTML
   
    var currentRow=$(e.target).closest("tr");
    let idToDelLo = currentRow.find("td:eq(1)").text();
    console.log(idToDelLo)
    $('#deleterLoc').prop("value", idToDelLo)
    
    $.ajax({
      url:  `companydirectory/libs/php/locationVerify.php`,
      type: 'POST',
      dataType: 'json',
     data: {val: idToDelLo},
    
      success: function (result) {
    
          //  if (result.status.name == "ok") {
         
            console.log(idToDelLo)
            console.log(result)
              
      if (result.data[0].pc > 0){
        e.preventDefault()
          $('#deleteLocationModal').modal('hide')
          $('#deleteLocationNoModal').modal('show')
          console.log('add something')
        } 
            
           
           
          // } 
      },
      error: function (jqXHR, textStatus, errorThrown) {
     
      }
    })

    
  
  
    $('#deleterLoc').prop("value", idToDelLo)
  
          // } 
    
  })
  

  $('#locationTable tbody').on( 'click', '#viewLocationButton', function () {
    let rowInfo = $(this).parent().parent().children()
    console.log(rowInfo)
   $('#viewLocationList').html(rowInfo[0].innerHTML)
   $(".box").empty()
   
  
  //} );
  
  $.ajax({
    url:  "companydirectory/libs/php/getAllDepartments.php",
    type: 'POST',
    dataType: 'json',
  
  
    success: function (result) {
  
        //  if (result.status.name == "ok") {
          let trialsArray = []
          for (let j = 0; j < result.data.length; j++) {
          if (result.data[j].location === rowInfo[0].innerHTML){
          trialsArray.push(result.data[j].name)
  
          }
          
          }
          console.log(trialsArray)
          if(trialsArray.length > 0) {
          for (let i = 0; i < trialsArray.length; i++) {
          console.log(trialsArray.length)
          
          $(".box").append("<li><b>" + trialsArray[i] + "</b></li>")
          }
         
        } else {
          $(".box").append("<li><b>No departments linked to this location</b></li>")
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
    console.log(rowInfo)
  //  $('#editLocationId').val(rowInfo[1].innerHTML)
   // $('#editPlaceName').val(rowInfo[0].innerHTML)
    
    $.ajax({
      url:  "companydirectory/libs/php/getLocation.php",
      type: 'POST',
      dataType: 'json',
    
    
      success: function (result) {
    
          //  if (result.status.name == "ok") {
      
            console.log(result.data.length)
            for (let k=0; k < result.data.length; k++){
              if (result.data[k].name === rowInfo[0].innerHTML){
                console.log(result.data[k])
                $('#editPlaceName').val(result.data[k].name )
                $('#editLocationId').val(result.data[k].id)
                
                
                
              
              }
            }
            
     
    
           
           
          // } 
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log('err0r')
      }
    })
  })
  
 



 


})
     




