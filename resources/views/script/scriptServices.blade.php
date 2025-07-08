

<script type="text/javascript">
//ajax setup csrf
    var token = $('meta[name="csrf-token"]').attr('content')
//get data
    $(document).ready(function() {
       var table = $('#services').DataTable({
           processing: true,
           serverside: true,
           "_token": "{{ csrf_token() }}",
           ajax: "{{url('servicesAjax')}}",
           headers: {
                    'X-CSRF-TOKEN':token,
                }, 
           columns: [{
                   data: 'DT_RowIndex',
                   name: 'DT_RowIndex',
                   orderable: false,
                   searchable: false,
               },
               {
                   data: 'name_services',
                   name: 'name_services',
               },
               {
                   data: 'description_services',
                   name: 'description_services',
               },
               {
                   data: 'link_services',
                   name: 'link_services',
               },
               
               {
                   data: 'aksi',
                   name: 'aksi',
               }
           ],      
       });
    });

    $(document).on('click', '#addCard', function(e) {
        e.preventDefault();
        $('#data_id').val(''); 
        $('#exampleModal1').modal('show');
    })

//edit data
   $('body').on('click', '.tombol-edit', function(e) {
       var id = $(this).data('id');
       $.ajax({
        "_token": "{{ csrf_token() }}",
           url: 'servicesAjax/' + id + '/edit',
           type: 'GET',
           headers: {
                    'X-CSRF-TOKEN':token,
                }, 
           success: function(response) {
               console.log(response.result.name_services);
               $('#exampleModal1').modal('show');
               $('#data_id').val(response.result.id);
               $('#name_services').val(response.result.name_services);
               $('#description_services').val(response.result.description_services);
               $('#link_services').val(response.result.link_services);
               $('#simpanCard').click(function() {
                   servicesCard(id)
               })

           }
       })
   });


// function edit data 


//post
$('#servicesCard').on('submit', async function (e) {
    e.preventDefault();

    const formData = new FormData(this);
    const response = await postAPI(`servicesAjax`, formData);
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
        $('#exampleModal1').modal('hide')
    }
    $('#data_id').val('');  
    
    $(this)[0].reset();
    $('#services').DataTable().ajax.reload();

});

//del 

 $(document).on('click', '.tombol-del', function(e) {
    if (confirm('Yakin mau hapus data ini?') === true) {
        var id = $(this).data('id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN':token,
            }, 
            url: 'servicesAjax/' + id,
            type: 'DELETE',
            "_token": "{{ csrf_token() }}",
        });
        $('#services').DataTable().ajax.reload();
    } 
});


// hide value
   $('#exampleModal1').on('hidden.bs.modal', function() {
       $('.alert-danger').addClass('d-none');
        $('#data_id').val('');  
       $('.alert-danger').html('');
       $('.alert-success').addClass('d-none');
       $('.alert-success').html('');
   });
   
</script>



