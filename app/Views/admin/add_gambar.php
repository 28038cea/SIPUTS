<?= $this->extend('templates/template'); ?>

<?= $this->section('content'); ?>
<div class="page-title">
    <div class="title_left">
        <h3>Input Gambar</h3>
    </div>
</div>

<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Input Gambar</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="text-center">

                <form class="gambar" method="POST" action="/Admin/savegambar" enctype="multipart/form-data">


                    <div class="form-group">
                        <input type="file" class="form-control form-control-user" id="nama" name="nama">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="kategori" name="kategori">
                    </div>

                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Tambah Gambar
                    </button>

                </form>

            </div>
        </div>
    </div>
</div>
</div>





<?= $this->endSection('content'); ?>