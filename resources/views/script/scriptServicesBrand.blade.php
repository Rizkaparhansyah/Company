
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
                $('#service').val(response.result.service);
                $('#description').val(response.result.description);
                $('#simpanServices').click(function() {
                    servicesBrand(id)
                })

            }
        })
    });

// function edit Data
   function servicesBrand(id) {
           $.ajax({
            "_token": "{{ csrf_token() }}",
               url: 'servicesBrandAjax/' + id,
               type: 'PUT',
               headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
               data: {
                "_token": "{{ csrf_token() }}",

                   service: $('#service').val(),
                   description: $('#description').val(),
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
                                $('.alert-success').addClass("d-none");
                            }, 2500);
                        }, 500);
                        $('#exampleModal2').modal('hide')
                    }
                    $('#servicesBrand').DataTable().ajax.reload();
                }
            });
        }
               
// hide value 
   $('#exampleModal2').on('hidden.bs.modal', function() {
       $('.alert-danger').addClass('d-none');
       $('.alert-danger').html('');
       $('.alert-success').addClass('d-none');
       $('.alert-success').html('');
   });
</script>



