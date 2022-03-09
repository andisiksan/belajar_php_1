<?= $this->extend('layout/template'); ?>



<?= $this->section('content'); ?>


<div class="container">
    <div class="row">
        <div class="col">
            <h1>Detail</h1>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url(); ?>/img/<?= $komik['sampul']; ?>" alt="card-img">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $komik['judul']; ?></h5>
                            <p class="card-text">Penulis <b><?= $komik['penulis']; ?></b></p>
                            <p class="card-text"><small class="text-muted">Penerbit <b> <?= $komik['penerbit']; ?></b></small></p>
                            <a href="/komik/edit/<?= $komik['slug']; ?>" class="btn btn-warning">Edit</a>


                            <form action="/komik/delete/ <?= $komik['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin')">Delete</button>
                            </form>
                            <br>
                            <br>
                            <p><a href="/komik">Kembali ke daftar komik</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>