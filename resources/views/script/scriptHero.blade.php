
<script type="text/javascript">
//fungsi yang mengatur konten mana yang akan ditampilkan


// csrf token 
    var token = $('meta[name="csrf-token"]').attr('content')
//Get data
    $(document).ready(function() {
       var table = $('#hero').DataTable({
           processing: true,
           serverside: true,
           paging: false,
           ordering: false,
        info: false,
           ajax: "{{url('heroAjax')}}",
           headers: {
                    'X-CSRF-TOKEN': token
                },
           "_token": "{{ csrf_token() }}",
           columns: [{
                   data: 'DT_RowIndex',
                   name: 'DT_RowIndex',
                   orderable: false,
                   searchable: false,
               },
               {
                   data: 'name_brand',
                   name: 'name_brand',
               },
               {
                   data: 'sosmed_whatsapp',
                   name: 'sosmed_whatsapp',
               },
               {
                   data: 'sosmed_instagram',
                   name: 'sosmed_instagram',
               },
               {
                   data: 'sosmed_facebook',
                   name: 'sosmed_facebook',
               },
               {
                   data: 'aksi',
                   name: 'aksi',
               }
           ],
          
       });
   });


//edit data
   $('body').on('click', '.tombol-edit', function(e) {
       var id = $(this).data('id');
       $.ajax({
           url: 'heroAjax/' + id + '/edit',
           type: 'GET',
           "_token": "{{ csrf_token() }}",
           headers: {
                    'X-CSRF-TOKEN': token
                },
           success: function(response) {
               $('#exampleModal3').modal('show');
               $('#name_brand').val(response.result.name_brand);
               $('#sosmed_whatsapp').val(response.result.sosmed_whatsapp);
               $('#sosmed_instagram').val(response.result.sosmed_instagram);
               $('#sosmed_facebook').val(response.result.sosmed_facebook);
               $('#simpanHero').click(function() {
                   hero(id)
               })
           }
       })
   });

// function edit data 
   function hero(id) {
           $.ajax({
            
               url: 'heroAjax/' + id,
               type: 'PUT',
               headers: {
                    'X-CSRF-TOKEN': token
                },
                "_token": "{{ csrf_token() }}",
               data: {
                   name_brand: $('#name_brand').val(),
                   sosmed_facebook: $('#sosmed_facebook').val(),
                   sosmed_instagram: $('#sosmed_instagram').val(),
                   sosmed_whatsapp: $('#sosmed_whatsapp').val(),
                   "_token": "{{ csrf_token() }}",
                id: id,
               },
               
               success: function(response) {
                   if (response.errors) {
                       console.log(response.errors);
                       $('.alert-danger').removeClass('d-none');
                       $('.alert-danger').html("<ul>");
                       $.each(response.errors, function(key, value) {
                           $('.alert-danger').find('ul').append("<li>" + value +
                               "</li>");
                       });
                       $('.alert-danger').append("</ul>");
                   } else {
                    setTimeout(function() {
                            $('.alert-success').removeClass('d-none');
                            $('.alert-success').html(response.success);
                            setTimeout(function() {
                                $('.alert-success').addClass('d-none');
                            }, 2500);
                        }, 500);
                        $('#exampleModal3').modal('hide')
                   }
                   $('#hero').DataTable().ajax.reload();
               }
           });
       }


//hide value 
   $('#exampleModal3').on('hidden.bs.modal', function() {
      
       $('.alert-danger').addClass('d-none');
       $('.alert-danger').html('');
       $('.alert-success').addClass('d-none');
       $('.alert-success').html('');
   });
</script>