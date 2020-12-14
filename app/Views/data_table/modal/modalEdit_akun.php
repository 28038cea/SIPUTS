<!-- Modal -->
<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Update Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <?= $segment; ?> -->
                <form action="/Admin/updateAdmin/<?= $id_akun; ?>" method="POST" enctype="multipart/form-data" class="form_update">
                    <?= csrf_field(); ?>
                    <input type="hidden" id="id" name="id" value="<?= $id_akun; ?>" readonly>
                    <div class="row form-group">
                        <label class="col-form-label col-md-2 col-sm-2">Name<font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan nama" value="<?= $nama; ?>" />
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-form-label col-md-2 col-sm-2">Image</label>
                        <div class="col-md col-sm">
                            <input type="file" name="foto" />
                        </div>
                    </div>
                    <br>
                    <input type="hidden" name="old_image" id="old_image" value="<?= $foto; ?>">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btnUpdate">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    // $(document).ready(function() {
    //     $('.form_update').submit(function(e) {
    //         e.preventDefault();
    //         $.ajax({
    //             type: "post",
    //             url: $(this).data('href'),
    //             data: $(this).serialize(),
    //             dataType: "json",
    //             beforeSend: function() {
    //                 $('.btnUpdate').attr('disable', 'disabled');
    //                 $('.btnUpdate').html('<i class="fa fa-spin fa-spinner"></i>');
    //             },
    //             complete: function() {
    //                 $('.btnUpdate').removeAttr('disable');
    //                 $('.btnUpdate').html('Update');
    //             },
    //             success: function(response) {
    //                 Swal.fire({
    //                     icon: 'success',
    //                     title: 'Berhasil',
    //                     text: response.sukses
    //                 })
    //                 $('#modalUpdate').modal('hide');
    //                 dataAkun();
    //             },
    //             error: function(xhr, ajaxOptions, thrownError) {
    //                 alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
    //             }
    //         })
    //     })
    // })
</script>