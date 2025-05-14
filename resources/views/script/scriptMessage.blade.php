<script type="text/javascript">



// get data 

    $(document).ready(function () {
        var table = $('#message').DataTable({
                processing: true,
                serverside: true,
               
                "_token": "{{ csrf_token() }}",
                ajax: "{{url('messageAjax')}}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                        
                    },
                    {
                        data: 'email',
                        name: 'email',
                    },
                    {
                        data: 'pesan',
                        name: 'pesan',
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                    }
                ],
        })
    })


// delete data 
    $('body').on('click', '.tombol-hapus', function(e) {
        if (confirm('Yakin Mau hapus data ini?') === true) {
            var id = $(this).data('id');
            console.log(this);
            $.ajax({
                "_token": "{{ csrf_token() }}",
                url: 'messageAjax/' + id,
                type: 'DELETE',
            });
            $('#message').DataTable().ajax.reload();
        }
    });
</script>