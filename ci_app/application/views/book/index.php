<div class="container">

    <div class="flash-data" data-flash="<?= $this->session->flashdata('flash'); ?>"></div>
    <!-- <?php if ( $this->session->flashdata('flash') ) : ?>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                Data buku <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <?php endif; ?> -->

    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>book/create" class="btn btn-primary">Create Data Book</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Press the keyword here.." autofocus autocomplete="off" name="keyword">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <h3>List Books</h3>
            <?php if ( empty($books) ) : ?>
                <div class="alert alert-danger" role="alert">
                Data Not Found!
                </div>
            <?php endif; ?>
            <ul class="list-group">
                <?php foreach( $books as $book ) : ?>
                <li class="list-group-item">
                    <?= $book['title']; ?>
                    <a class="badge text-bg-danger float-end btn-delete" href="<?= base_url(); ?>book/delete/<?= $book['id']; ?>">Delete</a>
                    <a class="badge text-bg-warning float-end" href="<?= base_url(); ?>book/update/<?= $book['id']; ?>">Update</a>
                    <a class="badge text-bg-primary float-end" href="<?= base_url(); ?>book/detail/<?= $book['id']; ?>">Detail</a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>