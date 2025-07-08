<script type="text/javascript">
// csrf token 
    var token = $('meta[name="csrf-token"]').attr('content')
// Get Data

    $(document).ready(function() {
        var table = $('#inspirasi-table').DataTable({
            processing: true,
            serverside: true,
            paging: false,
            ordering: false,
            info: false,
            "_token": "{{ csrf_token() }}",
            ajax: "{{url('inspirasiAjax')}}",
            headers: {
                    'X-CSRF-TOKEN': token
                },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'image_inspirasi',
                    name: 'image_inspirasi',
                    render: function(data, type, full, meta){
                            return "<img src='{{ asset('storage/images') }}/" + encodeURIComponent(data) + "' width='50'/>";
                        }
                },
                {
                    data: 'description_inspirasi',
                    name: 'description_inspirasi',
                },
                {
                    data: 'aksi',
                    name: 'aksi',
                }
            ],
        });
    });


// tambah data 
    $('body').on('click', '.tambah-data-inspirasi', function(e) {
        e.preventDefault();
        $('#exampleModal6').modal('show');
        $('#data_id').val('');
        
    });



// edit data 
    $('body').on('click', '.tombol-edit', function(e) {
        var id = $(this).data('id');
        $.ajax({
            url: 'inspirasiAjax/' + id + '/edit',
            type: 'GET',
            success: function(response) {
                $('#exampleModal6').modal('show');
                $('#description_inspirasi').val(response.result.description_inspirasi);
                $('#data_id').val(response.result.id);
                
            }
        })
    });

    
//  function untuk simpan dan edit           
   $('#inspirasiForm').on('submit', async function (e) {
            e.preventDefault();

            const formData = new FormData(this);
            const response = await postAPI(`inspirasiAjax`, formData);
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
                $('#exampleModal6').modal('hide')
            }
            
            $(this)[0].reset();
            $('#inspirasi-table').DataTable().ajax.reload();
        
        });

           $(document).on('click', '.tombol-del', function(e) {
                if (confirm('Yakin mau hapus data ini?') === true) {
                    var id = $(this).data('id');
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN':token,
                        }, 
                        url: 'inspirasiAjax/' + id,
                        type: 'DELETE',
                        "_token": "{{ csrf_token() }}",
                    });
                    $('#inspirasi-table').DataTable().ajax.reload();
                } 
            });
    
    

    


            // hide value ketika tombol di close 
    $('#exampleModal6').on('hidden.bs.modal', function() {
        $('#data_id').val('')
        $('#description_inspirasi').val('')
        $('.alert-danger').addClass('d-none');
        $('.alert-danger').html('');
        $('.alert-success').addClass('d-none');
        $('.alert-success').html('');
    });
    
</script>