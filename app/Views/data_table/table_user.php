<div class="card-box table-responsive">
    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
        <?php endif; ?>
        <br><br><br>
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Nama User</th>
                <th class="text-center">Email</th>
                <th class="text-center">Foto</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($admin as $val) { ?>
                <tr>
                    <td class="text-center"><?= $i++; ?></td>
                    <td><?= $val['nama']; ?></td>
                    <td><?= $val['email']; ?></td>
                    <td class="text-center">
                        <img src="<?= base_url("upload/" . $val['foto']) ?>" alt="" width="50px">
                    </td>
                    <td>
                        <center>
                            <button type="button" class="btn btn-success btn-sm" onclick="edit(<?= $val['id_akun'] ?>)"><i class="fa fa-pencil"></i></button>
                            <button type="button" class="btn btn-danger btn-sm" onclick="hapus(<?= $val['id_akun'] ?>)"><i class="fa fa-trash"></i></button>
                        </center>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });

    function edit(id_akun) {
        $.ajax({
            type: "post",
            url: '<?= site_url('Admin/update_user') ?>',
            data: {
                id_akun: id_akun
            },
            dataType: 'json',
            success: function(response) {
                if (response.sukses) {
                    $('.viewModalEdit').html(response.sukses).show();
                    $('#modalUpdate').modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        })
    }

    function hapus(id_akun) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "post",
                    url: '<?= site_url('Admin/hapus') ?>',
                    data: {
                        id_akun: id_akun
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.sukses) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: response.sukses
                            })
                            dataAkun();
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                })
            }
        })
    }
</script>