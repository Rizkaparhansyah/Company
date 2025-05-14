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
                            return "<img src={{ URL::to('/storage/images') }}"+'/' + data + " width='50' />";
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


// encode image
    function encodeImageInspirasiFileAsURL(element) {
        var file = element.files[0];
            console.log(file.name);
        var reader = new FileReader();
        reader.onloadend = function() {
            console.log('RESULT', reader.result)
            $('#base64_inspirasi').val(reader.result);
            $('#nama_file_inspirasi').val(file.name);
        }
        reader.readAsDataURL(file);
    }


// tambah data 
    $('body').on('click', '.tambah-data-inspirasi', function(e) {
        e.preventDefault();
        $('#exampleModal6').modal('show');
        $('#simpanInspirasi').click(function(e){
            inspirasi();
        })
    });



// edit data 
    $('body').on('click', '.tombol-edit', function(e) {
        var id = $(this).data('id');
        $.ajax({
            url: 'inspirasiAjax/' + id + '/edit',
            type: 'GET',
            success: function(response) {
                $('#exampleModal6').modal('show');
                $('#description-inspirasi').val(response.result.description_inspirasi);
                $('#simpanInspirasi').click(function(e){
                    inspirasi(id)
                }
                )
            }
        })
    });

    
//  function untuk simpan dan edit           
    function inspirasi(id = '') {
        if (id == '') {
            var var_url = 'inspirasiAjax';
            var var_type = 'POST';
        } else {
            var var_url = 'inspirasiAjax/' + id;
            var var_type = 'PUT';
        }
            $.ajax({
            url: var_url,
            type: var_type,
            data: {
                nama_file_inspirasi:$('#nama_file_inspirasi').val(),
                image_inspirasi: $('#base64_inspirasi').val(),
                description_inspirasi: $('#description-inspirasi').val(),
                id: id,
            
                },
                success: function(response) {
                console.log(response);
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
                    $('#inspirasi-table').DataTable().ajax.reload();
                }
            });
        }


// delete data 
    $('body').on('click', '.tombol-del', function(e) {
        if (confirm('Yakin mau hapus data ini?') == true) {
            var id = $(this).data('id');
            $.ajax({
                url: 'inspirasiAjax/' + id,
                type: 'DELETE',
                "_token": "{{ csrf_token() }}",
                headers: {
                    'X-CSRF-TOKEN':token,
                }, 
            });
            $('#inspirasi-table').DataTable().ajax.reload();
        } 
    });


// hide value ketika tombol di close 
    $('#exampleModal6').on('hidden.bs.modal', function() {
        $('#description-inspirasi').val('')
        $('.alert-danger').addClass('d-none');
        $('.alert-danger').html('');
        $('.alert-success').addClass('d-none');
        $('.alert-success').html('');
    });
    
</script>