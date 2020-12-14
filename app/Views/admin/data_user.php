<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('content'); ?>
<div class="page-title">
    <div class="title_left">
        <h3>DATA User</h3>
    </div>
</div>

<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>DATA User</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <a href="<?= base_url("Export/excel_user") ?>" class="btn btn-primary" style="float: left">
                        <i class="fa fa-download"></i>
                        Excel
                    </a>
                    <a href="<?= base_url("Export/pdf_user") ?>" class="btn btn-primary" style="float: left">
                        <i class="fa fa-download"></i>
                        PDF
                    </a>
                    <button type="button" id="tombolTambahUser" class="btn btn-primary tombolTambahUser" data-toggle="modal" data-target="#modalUser" style="float: right">
                        <i class="fa fa-plus"></i>
                        Add User
                    </button>
                    <div class="viewData">
                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="viewModalEdit" style="display: none;"></div>

<div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Input Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/Admin/save_user" method="POST" enctype="multipart/form-data" class="form_user">
                    <?= csrf_field(); ?>
                    <div class="row form-group">
                        <label class="col-form-label col-md-2 col-sm-2">Name<font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan nama user" value="<?= old('nama'); ?>" />
                            <div class="invalid-feedback errorName">

                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-form-label col-md-2 col-sm-2">Image</label>
                        <div class="col-md col-sm">
                            <input type="file" name="foto" />
                        </div>
                    </div>
                    <br>
                    <input type="hidden" name="old_image" id="old_image">
                    <div class="row form-group">
                        <label id="labelEmailuser" class="col-form-label col-md-2 col-sm-2">Email<font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input type="email" class="form-control" name="email" id="emailUser" placeholder="Masukkan email user" value="<?= old('email'); ?>" />
                            <div class="invalid-feedback errorEmail"></div>
                        </div>
                    </div>
                    <input type="hidden" name="old_pass" id="old_pass">
                    <div class="row form-group">
                        <label id="labelPasswordUser" class="col-form-label col-md-2 col-sm-2">Password<font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input class="form-control" type="password" name="password" id="passwordUser" data-validate-length="6,8" />
                            <div class="invalid-feedback errorPassword"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btnSimpan">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    function dataAkun() {
        $.ajax({
            url: "<?= site_url('Admin/ambilUser') ?>",
            dataType: "json",
            success: function(response) {
                $('.viewData').html(response.data)
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        })
    }

    $(document).ready(function() {
        dataAkun();

        $('.form_user').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.btnSimpan').attr('disable', 'disabled');
                    $('.btnSimpan').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function() {
                    $('.btnSimpan').removeAttr('disable');
                    $('.btnSimpan').html('Simpan');
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.name) {
                            $('#name').addClass('is-invalid');
                            $('.errorName').html(response.error.name);
                        } else {
                            $('#name').removeClass('is-invalid');
                            $('.errorName').html('');
                        }

                        if (response.error.email) {
                            $('#emailUser').addClass('is-invalid');
                            $('.errorEmail').html(response.error.email);
                        } else {
                            $('#emailUser').removeClass('is-invalid');
                            $('.errorEmail').html('');
                        }

                        if (response.error.password) {
                            $('#passwordUser').addClass('is-invalid');
                            $('.errorPassword').html(response.error.password);
                        } else {
                            $('#passwordUser').removeClass('is-invalid');
                            $('.errorPassword').html('');
                        }
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.sukses
                        })

                        $('#name').val('');
                        $('#emailUser').val('');
                        $('#passwordUser').val('');
                        $('#modalUser').modal('hide');
                        dataAkun();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
            return false;
        });
    });
</script>
<?= $this->endSection('content'); ?>