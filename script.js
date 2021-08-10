        $(document).ready(function (){

          $("#editModal").on('show.bs.modal', function(event){
            var button = $(event.relatedTarget);
            //bootstrap way of retrieving data-* attributes
            //data-formid in this case
            var id = button.data('formid');
            $.get('http://localhost/CompanyDirectory/companydirectory/libs/php/updatePersonnel.php?id='+id, 
            function(data) {
                $("#editModal .modal-title").html(data);
                //Resize the modal to the size of the loaded form.
                $("#editModal").modal("handleUpdate");
            });
        });


          $("#employees__show").click(function(){
            $("#department_wrapper").hide();
            $(".wrapper").show();
            
          });
          $("#departments__show").click(function(){
            $(".wrapper").hide();
            $("#locations_wrapper").hide();
            $("#department_wrapper").show();
          });
          $("#locations__show").click(function(){
            $(".wrapper").hide();
            $("#department_wrapper").hide();
            $("#locations_wrapper").show();
          });



        $.ajax({
          url:  "./libs/php/getallDepartments.php",
          type: 'POST',
          dataType: 'json',
      
      
          success: function (result) {
      
              //  if (result.status.name == "ok") {
      
      
              for (let i = 0; i < result.data.length; i++) {
                  $('#department').append($('<option>', {
                      value: result.data[i].id,
                      text: result.data[i].name
                  }))
                  console.log(result.data[i].id)
                }
               
                
                 
              
              // } 
      
      
          },
          error: function (jqXHR, textStatus, errorThrown) {
      
          }
      })
         
      $.ajax({
        url:  "http://localhost/CompanyDirectory/companydirectory/libs/php/getPersonnelByID.php?id=1",
        type: 'POST',
        dataType: 'json',
    
    
        success: function (result) {
    
            //  if (result.status.name == "ok") {
    
    
          
              for (let i = 0; i < result.data.length; i++) {
                $('#departmentup').append($('<option>', {
                    value: result.data[i].id,
                    text: result.data[i].name
                }))
                console.log(result.data[i].id)
              }
              
               
            
            // } 
    
    
        },
        error: function (jqXHR, textStatus, errorThrown) {
    
        }
    })
  })
 
  
