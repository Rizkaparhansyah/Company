<script type="text/javascript">
//ajax setup csrf
    var token = $('meta[name="csrf-token"]').attr('content')
//get data
    $(document).ready(function() {
        var table = $('#berita-table').DataTable({
                processing: true,
                serverside: true,
                paging: false,
                ordering: false,
                info: false,
                ajax: "{{url('beritaAjax')}}",
                columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'image',
                    name: 'image',
                    render: function(data, type, full, meta){
                            return "<img src={{ URL::to('/storage/images') }}"+'/' + data + " width='50' />";
                            }
                },
                {
                    data: 'description',
                    name: 'description',
                },
                {
                    data: 'aksi',
                    name: 'aksi',
                }
            ],
        });
    });


// endcode image
        function encodeImageFileAsURL(element) {
            var file = element.files[0];
            //   console.log(file.name);
            var reader = new FileReader();
            reader.onloadend = function() {
                console.log('RESULT', reader.result)
                $('#base64').val(reader.result);
                $('#nama_file').val(file.name);
            }
            reader.readAsDataURL(file);
        }

//tambah data
        $('body').on('click', '.tambah-data', function(e) {
            e.preventDefault();
            $('#exampleModal5').modal('show');
            $('#simpanBerita').click(function(e){
                    berita();
               })
        });

//edit data
        $('body').on('click', '.tombol-edit', function(e) {
            var id = $(this).data('id');
            $.ajax({
                url: 'beritaAjax/' + id + '/edit',
                type: 'GET',
                "_token": "{{ csrf_token() }}",
                headers: {
                    'X-CSRF-TOKEN':token,
                }, 
                success: function(response) {
                    $('#exampleModal5').modal('show');
                    $('#description-berita').val(response.result.description);
                    $('#simpanBerita').click(function(e){
                            berita(id)
                    }
                    )
                }
            })
        });


//function simpan dan edit                   
   function berita(id = '') {
    if (id == '') {
            var var_url = 'beritaAjax';
            var var_type = 'POST';
        } else {
            var var_url = 'beritaAjax/' + id;
            var var_type = 'PUT';
        }
           $.ajax({
            headers: {
            'X-CSRF-TOKEN': token
            },
            url: var_url,
            type: var_type,
            data: {
                nama_file:$('#nama_file').val(),
                image: $('#base64').val(),
                description: $('#description-berita').val(),
                "_token": "{{ csrf_token() }}",
            
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
                        $('#exampleModal5').modal('hide')
                   }
                   $('#berita-table').DataTable().ajax.reload();
               }
           });
       }


//delete data
        $('body').on('click', '.tombol-del', function(e) {
            if (confirm('Yakin mau hapus data ini?') === true) {
                var id = $(this).data('id');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN':token,
                    }, 
                    url: 'beritaAjax/' + id,
                    type: 'DELETE',
                    "_token": "{{ csrf_token() }}",
                });
                $('#berita-table').DataTable().ajax.reload();
            } 
        });


//hide value ketika tombol close di klik
        $('#exampleModal5').on('hidden.bs.modal', function() {
            $('#description-berita').val('')
            $('.alert-danger').addClass('d-none');
            $('.alert-danger').html('');
            $('.alert-success').addClass('d-none');
            $('.alert-success').html('');
        });

</script>