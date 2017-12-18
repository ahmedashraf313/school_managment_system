$("#add_section").submit(function(e) {

              $.ajax({
                     type: "POST",
                     url: '../admin_process.php',
                     data: new FormData( this ),
                     processData: false,
                     contentType: false,      
                     success: function(response)
                     {
                        if(response=="ok"){
                          window.location.href = "../admin_process.php";
                        }
                        else{
                              alert(response)
                            }
                    }
                   });
              e.preventDefault(); });

$("#add_user").submit(function(e) {

              $.ajax({
                     type: "POST",
                     url: '../admin_process.php',
                     data: new FormData( this ),
                     processData: false,
                     contentType: false,      
                     success: function(response)
                     {
                        if(response=="ok"){
                          window.location.href = "../admin_process.php";
                        }
                        else{
                              alert(response)
                            }
                    }
                   });
              e.preventDefault(); });

$("#add_department").submit(function(e) {

              $.ajax({
                     type: "POST",
                     url: '../admin_process.php',
                     data: new FormData( this ),
                     processData: false,
                     contentType: false,      
                     success: function(response)
                     {
                        if(response=="ok"){
                          window.location.href = "../admin_process.php";
                        }
                        else{
                              alert(response)
                            }
                    }
                   });
              e.preventDefault();  });

$("#add_lesson").submit(function(e) {

    $.ajax({
           type: "POST",
           url: '../admin_process.php',
           data: new FormData( this ),
           processData: false,
           contentType: false,      
           success: function(response)
           {
              if(response=="ok"){
                window.location.href = "../admin_process.php";
              }
              else{
                    alert(response)
                  }
          }
         });
    e.preventDefault(); });

$("#add_question").submit(function(e) {

    $.ajax({
           type: "POST",
           url: '../admin_process.php',
           data: new FormData( this ),
           processData: false,
           contentType: false,      
           success: function(response)
           {
              if(response=="ok"){
                window.location.href = "../admin_process.php";
              }
              else{
                    alert(response)
                  }
          }
         });
    e.preventDefault(); });

$("#add_answer").submit(function(e) {

    $.ajax({
           type: "POST",
           url: '../admin_process.php',
           data: new FormData( this ),
           processData: false,
           contentType: false,      
           success: function(response)
           {
              if(response=="ok"){
                window.location.href = "../admin_process.php";
              }
              else{
                    alert(response)
                  }
          }
         });
    e.preventDefault();});

$("#edit_user").submit(function(e) {

    $.ajax({
           type: "POST",
           url: '../admin_process.php',
           data: new FormData( this ),
           processData: false,
           contentType: false,      
           success: function(response)
           {
              if(response=="ok"){
                window.location.href = "../admin_process.php";
              }
              else{
                    alert(response)
                  }
          }
         });
    e.preventDefault(); });

$("#edit_section").submit(function(e) {

    $.ajax({
           type: "POST",
           url: '../admin_process.php',
           data: new FormData( this ),
           processData: false,
           contentType: false,      
           success: function(response)
           {
              if(response=="ok"){
                window.location.href = "../admin_process.php";
              }
              else{
                    alert(response)
                  }
          }
         });
    e.preventDefault(); });

$("#edit_department").submit(function(e) {

    $.ajax({
           type: "POST",
           url: '../admin_process.php',
           data: new FormData( this ),
           processData: false,
           contentType: false,      
           success: function(response)
           {
              if(response=="ok"){
                window.location.href = "../admin_process.php";
              }
              else{
                    alert(response)
                  }
          }
         });
    e.preventDefault(); });

$("#edit_lesson").submit(function(e) {

    $.ajax({
           type: "POST",
           url: '../admin_process.php',
           data: new FormData( this ),
           processData: false,
           contentType: false,      
           success: function(response)
           {
              if(response=="ok"){
                window.location.href = "../admin_process.php";
              }
              else{
                    alert(response)
                  }
          }
         });
    e.preventDefault(); });

$("#edit_question").submit(function(e) {

    $.ajax({
           type: "POST",
           url: '../admin_process.php',
           data: new FormData( this ),
           processData: false,
           contentType: false,      
           success: function(response)
           {
              if(response=="ok"){
                window.location.href = "../admin_process.php";
              }
              else{
                    alert(response)
                  }
          }
         });
    e.preventDefault(); });

$("#edit_answer").submit(function(e) {

    $.ajax({
           type: "POST",
           url: '../admin_process.php',
           data: new FormData( this ),
           processData: false,
           contentType: false,      
           success: function(response)
           {
              if(response=="ok"){
                window.location.href = "../admin_process.php";
              }
              else{
                    alert(response)
                  }
          }
         });
    e.preventDefault(); });

$("#add_comment").submit(function(e) {

              $.ajax({
                     type: "POST",
                     url: 'panel/admin_process.php',
                     data: new FormData( this ),
                     processData: false,
                     contentType: false,      
                     success: function(response)
                     {
                        if(response=="ok"){
                          window.location.href = "panel/admin_process.php";
                        }
                        else{
                              alert(response)
                            }
                    }
                   });
              e.preventDefault(); });

$(document).on('click', '#delete_answer', function (){
 var uid=$(this).attr('uid');

                  $.ajax({
                             type: "GET",
                             url: '../admin_process.php?action=delete_answer&id='+uid,
                             data: {id:uid} , // serializes the form's elements.
                             success: function(response)
                             {$('#edit-body').html(response);
                              

                                $.ajax({
                                       type: "GET",
                                       url: '../admin_process.php?action=delete_answer&id='+uid,
                                       data: new FormData( this ),
                                       processData: false,
                                       contentType: false,      
                                       success: function(response)
                                       {
                                        window.location.href = '../admin_process.php?action=delete_answer&id='+uid;
                                        }
                           });
                      e.preventDefault(); // avoid to execute the actual submit of the form.

                           }
                           });
                  });

$(document).on('click', '#delete_question', function (){
 var uid=$(this).attr('uid');

              $.ajax({
                         type: "GET",
                         url: '../admin_process.php?action=delete_question&id='+uid,
                         data: {id:uid} , // serializes the form's elements.
                         success: function(response)
                         {$('#edit-body').html(response);
                          

                            $.ajax({
                                   type: "GET",
                                   url: '../admin_process.php?action=delete_question&id='+uid,
                                   data: new FormData( this ),
                                   processData: false,
                                   contentType: false,      
                                   success: function(response)
                                   {
                                    window.location.href = '../admin_process.php?action=delete_question&id='+uid;
                                    }
                       });
                  e.preventDefault(); // avoid to execute the actual submit of the form.

                       }
                       });
              });

$(document).on('click', '#delete_lesson', function (){
                         var uid=$(this).attr('uid');

                                  $.ajax({
                                   type: "GET",
                                   url: '../admin_process.php?action=delete_lesson&id='+uid,
                                   data: {id:uid} , // serializes the form's elements.
                                   success: function(response)
                                   {$('#edit-body').html(response);
                                    

                                   $.ajax({
                                   type: "GET",
                                   url: '../admin_process.php?action=delete_lesson&id='+uid,
                                   data: new FormData( this ),
                                   processData: false,
                                   contentType: false,      
                                   success: function(response)
                                   {
                                    window.location.href = '../admin_process.php?action=delete_lesson&id='+uid;
                                    }
                                     });
                                  e.preventDefault(); // avoid to execute the actual submit of the form.

                                       }
                                       });
                                       });

$(document).on('click', '#delete_department', function (){
                                       var uid=$(this).attr('uid');

                                       $.ajax({
                                       type: "GET",
                                       url: '../admin_process.php?action=delete_department&id='+uid,
                                       data: {id:uid} , // serializes the form's elements.
                                       success: function(response)
                                       {$('#edit-body').html(response);
                              

                                       $.ajax({
                                       type: "GET",
                                       url: '../admin_process.php?action=delete_department&id='+uid,
                                       data: new FormData( this ),
                                       processData: false,
                                       contentType: false,      
                                       success: function(response)
                                       {
                                        window.location.href = '../admin_process.php?action=delete_department&id='+uid;
                                        }
                                               });
                                          e.preventDefault(); // avoid to execute the actual submit of the form.

                                               }
                                               });
                                      });

$(document).on('click', '#delete_section', function (){
                                         var uid=$(this).attr('uid');

                                         $.ajax({
                                         type: "GET",
                                         url: '../admin_process.php?action=delete_section&id='+uid,
                                         data: {id:uid} , // serializes the form's elements.
                                         success: function(response)
                                         {$('#edit-body').html(response);
                                          

                                         $.ajax({
                                         type: "GET",
                                         url: '../admin_process.php?action=delete_section&id='+uid,
                                         data: new FormData( this ),
                                         processData: false,
                                         contentType: false,      
                                         success: function(response)
                                         {
                                          window.location.href = '../admin_process.php?action=delete_section&id='+uid;
                                          }
                                                 });
                                            e.preventDefault(); // avoid to execute the actual submit of the form.

                                                 }
                                                 });
                                        });

$(document).on('click', '#delete_user', function (){
                                        var uid=$(this).attr('uid');

                                        $.ajax({
                                        type: "GET",
                                        url: '../admin_process.php?action=delete_user&id='+uid,
                                        data: {id:uid} , // serializes the form's elements.
                                        success: function(response)
                                        {$('#edit-body').html(response);

                                         $.ajax({
                                         type: "GET",
                                         url: '../admin_process.php?action=delete_user&id='+uid,
                                         data: new FormData( this ),
                                         processData: false,
                                         contentType: false,      
                                         success: function(response)
                                         {
                                          window.location.href = '../admin_process.php?action=delete_user&id='+uid;
                                          }
                                                 });
                                            e.preventDefault(); // avoid to execute the actual submit of the form.

                                                 }
                                                 });
                                              });

