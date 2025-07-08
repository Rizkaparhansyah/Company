
<script type="text/javascript">

//ajax setup csrf
    var token = $('meta[name="csrf-token"]').attr('content')
// Get Data
    $(document).ready(function() {
       var table = $('#servicesBrand').DataTable({
           processing: true,
           serverside: true,
           paging: false,
            ordering: false,
            info: false,
           ajax: "{{url('servicesBrandAjax')}}",
           columns: [{
                   data: 'DT_RowIndex',
                   name: 'DT_RowIndex',
                   orderable: false,
                   searchable: false,
               },
               {
                   data: 'service',
                   name: 'service',
               },
               {
                   data: 'aksi',
                   name: 'aksi',
               }
           ],
       });
   });

// edit Data
    $(document).on('click', '#addBrand', function(e) {
        e.preventDefault();
        $('#data_id').val(''); 
        $('#exampleModal2').modal('show');
    })

    $('body').on('click', '.tombol-edit', function(e) {
        var id = $(this).data('id');
        $.ajax({
            "_token": "{{ csrf_token() }}",
            url: 'servicesBrandAjax/' + id + '/edit',
            type: 'GET',
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            success: function(response) {
                $('#exampleModal2').modal('show');
                $('#data_id').val(response.result.id);
                $('#service').val(response.result.service);
                $('#description').val(response.result.description);

            }
        })
    });

// function edit Data
//post
$('#formServicesBrand').on('submit', async function (e) {
    e.preventDefault();

    const formData = new FormData(this);
    const response = await postAPI(`servicesBrandAjax`, formData);
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
        $('#exampleModal2').modal('hide')
    }
    $('#exampleModal2').modal('hide');
    
    $(this)[0].reset();
    $('#servicesBrand').DataTable().ajax.reload();

});

 $(document).on('click', '.tombol-del', function(e) {
    if (confirm('Yakin mau hapus data ini?') === true) {
        var id = $(this).data('id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN':token,
            }, 
            url: 'servicesBrandAjax/' + id,
            type: 'DELETE',
            "_token": "{{ csrf_token() }}",
        });
        $('#servicesBrand').DataTable().ajax.reload();
    } 
});



// hide value 
   $('#exampleModal2').on('hidden.bs.modal', function() {
       $('.alert-danger').addClass('d-none');
       $('.alert-danger').html('');
       $('.alert-success').addClass('d-none');
       $('.alert-success').html('');
   });
</script>



