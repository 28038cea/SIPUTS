<?= $this->extend('templates/template'); ?>

<?= $this->section('content'); ?>
<div class="page-title">
    <div class="title_left">
        <h3>DATA Gambar</h3>
    </div>
</div>

<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>DATA Gambar</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <a href="/admin/addgambar" type="button" id="tombolTambahGambar" class="btn btn-primary tombolTambahGambar" style="float: right">
                        <i class="fa fa-plus"></i>
                        Add Gambar
                    </a>
                    <div class="viewData">
                        <div class="card-box table-responsive">
                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <?php if (session()->getFlashdata('pesan')) : ?>
                                    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
                                <?php endif; ?>
                                <br><br><br>
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Kategori</th>
                                        <th class="text-center">Foto</th>
                                        <th class="text-center">Tools</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($gambar as $val) { ?>
                                        <tr>
                                            <td class="text-center"><?= $i++; ?></td>
                                            <td><?= $val['kategori']; ?></td>
                                            <td><?= $val['nama']; ?></td>
                                            <td>
                                                <center>
                                                    <button type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></button>
                                                    <a href="/Admin/delete/<?= $val['id'] ?>" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                </center>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<?= $this->endSection('content'); ?>