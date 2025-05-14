<script>

//register
    $('body').on('click', '.regis', function() {
        setTimeout(function () {
            $('.alert-success').removeClass('d-none');
            $('.alert-success').html('Membutuhkan beberapa menit,Tunggu sampai email terkirim');
            setTimeout(function() {
                $('.alert-success').addClass('d-none');
            }, 4500);
        })
            $.ajax({
                url: "{{url('userAjax')}}",
                type: 'POST',
                data: {
                    nama_file_register:$('#nama_file_register').val(),
                    foto: $('#base64_register').val(),
                    name:$('#nama').val(),
                    email: $('#email').val(),
                    username: $('#username').val(),
                    password: $('#password').val(),
                    "_token": "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        if (response.errors) {
                            $('.alert-danger').removeClass('d-none');
                            $('.alert-danger').html("<ul>");
                            $.each(response.errors, function(key, value) {
                                $('.alert-danger').find('ul').append("<li>" + value +
                                    "</li>");
                            });
                            $('.alert-danger').append("</ul>");
                        } else {
                            $('.resend-email').removeClass('d-none');
                            setTimeout(function() {
                                $('.alert-success').removeClass('d-none');
                                $('.alert-success').html(response.success);
                                setTimeout(function() {
                                    $('.alert-success').addClass('d-none');
                                    window.location = response.redirect
                                }, 2500);
                            }, 500);
                        }
                    }
        })

        $('#foto').val(""),
        $('#nama').val(""),
        $('#email').val(""),
        $('#username').val(""),
        $('#password').val("")
            
    })
//encode image
       function encodeImageRegisterFileAsURL(element) {
        var file = element.files[0];
            console.log(file.name);
        var reader = new FileReader();
        reader.onloadend = function() {
            console.log('RESULT', reader.result)
            $('#base64_register').val(reader.result);
            $('#nama_file_register').val(file.name);
        }
        reader.readAsDataURL(file);
    }
</script>