 <script>
     $(document).ready(function() {
         var table = $('#zakat').DataTable({
            processing: true,
            serverside: true,
            paging: false,
            ordering: false,
            info: false,
            "_token": "{{ csrf_token() }}",
            ajax: "{{url('zakatAjax')}}",

            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'tipe_zakat',
                    name: 'tipe_zakat',
                   
                },
                {
                    data: 'nik',
                    name: 'nik',
                   
                },
                {
                    data: 'nama_donatur',
                    name: 'nama_donatur',
                },
                {
                    data: 'jml_donasi',
                    name: 'jml_donasi',
                },
                {
                    data: 'terkumpul',
                    name: 'terkumpul',
                },
                {
                    data: 'aksi',
                    name: 'aksi',
                }
            ],
        });
    });
    // tambah data 
    $('body').on('click', '.tambah-data-zakat', function(e) {
        e.preventDefault();
        $('#exampleModal13').modal('show');
        $('#simpanZakat').click(function(e){
            $.ajax({
            url: 'zakatAjax',
            type: 'POST',
            data: {
                tipe_zakat:$('#tipe_zakat').val(),
                nik:$('#NIK').val(),
                nama: $('#nama').val(),
                jml_donasi: $('#jml_donasi').val(),
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
                        $('#exampleModal13').modal('hide')
                    }
                    $('#zakat').DataTable().ajax.reload();
                }
            });
        })
    });



// edit data 

    $('body').on('click', '.zakat-edit', function(e) {
        e.preventDefault();
        $('#simpanZakat').attr('hidden', true);
        $('#editZakat').removeAttr('hidden');
        var id = $(this).data('id');
        $.ajax({
            url: 'zakatAjax/' + id + '/edit',
            type: 'GET',
            success: function(response) {
                $('#exampleModal13').modal('show');
                $('#NIK').val(response.result.nik)
                $('#nama').val(response.result.nama_donatur)
                $('#tipe_zakat').val(response.result.tipe_zakat)
                $('#jml_donasi').val(response.result.jml_donasi)
                $('#editZakat').click(function(){
                  zakat(id);
                }
                )
            }
        })
    });
    
function zakat(id) {
    $.ajax({
        url:  'zakatAjax/' + id,
        type: 'PUT',
        data: {
            tipe_zakat:$('#tipe_zakat').val(),
            nik:$('#NIK').val(),
            nama: $('#nama').val(),
            jml_donasi: $('#jml_donasi').val(),
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
                    $('#exampleModal13').modal('hide')
                }
                $('#zakat').DataTable().ajax.reload();
            }
        });
}
                  
// delete data 
    $('body').on('click', '.zakat-del', function(e) {
        if (confirm('Yakin mau hapus data ini?') == true) {
            var id = $(this).data('id');
            $.ajax({
                url: 'zakatAjax/' + id,
                type: 'DELETE',
                "_token": "{{ csrf_token() }}",
                headers: {
                    'X-CSRF-TOKEN':token,
                }, 
            });
            $('#zakat').DataTable().ajax.reload();
        } 
    });


// hide value ketika zakat di close 
$('#exampleModal13').on('hidden.bs.modal', function(e) {
    e.preventDefault();
        $('#NIK').val('')
        $('#nama').val('')
        $('#tipe_zakat').val('')
        $('#jml_donasi').val('')
        $('.alert-danger').addClass('d-none');
        $('.alert-danger').html('');
        $('.alert-success').addClass('d-none');
        $('.alert-success').html('');
    });
</script>