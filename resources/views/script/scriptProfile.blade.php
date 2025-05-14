

    <script type="text/javascript">
    
       $('body').on('click', '.profile-user', function(e) {
            $('#exampleModal0').modal('show');
       });


       //edit data
       $('body').on('click', '.edit', function(e) {
            var id = $(this).data('id');
            $.ajax({
                url: 'userAjax/' + id + '/edit',
                type: 'GET',
                success: function(response) {
                        $('#exampleModal11').modal('show');
                        $('.simpan_profile').click(function(e){
                            profile(id)
                        }
                    )
                }
            })
       });
// encode image
    function encodeImageProfileFileAsURL(element) {
            var file = element.files[0];
                console.log(file.name);
            var reader = new FileReader();
            reader.onloadend = function() {
                console.log('RESULT', reader.result)
                $('#base64_update_foto').val(reader.result);
                $('#nama_file_update_foto').val(file.name);
            }
            reader.readAsDataURL(file);
        }

       


//function simpan dan edit                   
        function profile(id) {
           $.ajax({
            url: 'userAjax/' + id,
            type: 'PUT',
            data: {
                nama_file_update_foto:$('#nama_file_update_foto').val(),
                foto: $('#base64_update_foto').val(),
                name:$('#nama_profile').val(),
                email: $('#email_profile').val(),
                username: $('#username_profile').val(),
                password: $('#password_profile').val(),
                "_token": '{{csrf_token()}}'
               },
               success: function(response) {
                console.log(response);
                    
                   if (response.errors) {
                       console.log(response.errors);
                       $('.dan').removeClass('d-none');
                        setTimeout(function() {
                            $('.dan').addClass('d-none');
                        }, 1800);
                       $('.dan').html("<ul>");
                       $.each(response.errors, function(key, value) {
                           $('.dan').find('ul').append("<li>" + value +
                               "</li>");
                       });
                       $('.dan').append("</ul>");
                   } else {
                    setTimeout(function() {
                            $('.suc').removeClass('d-none');
                            $('.suc').html(response.success);
                        }, 0);
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                   }
               }
           });
        }
        
    </script>
    
    
    
    