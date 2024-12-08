<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detail Data Book
                </div>
                <div class="card-body">

                    <div class="container">
                        <div class="row align-items-start">
                            <div class="col-md-7 ms-3">
                                <h5 class="card-title"><?= $book['title']; ?></h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary"><?= $book['writer']; ?></h6>
                                <p class="card-text">Publication Year : <?= $book['publication_year']; ?></p>
                                <p class="card-text">Total Pages : <?= $book['total_pages']; ?></p>
                                <a href="<?= base_url(); ?>book" class="btn btn-primary">Go Back</a>
                            </div>
                            <div class="col text-center">
                                <img class="img" src="<?= base_url(); ?>assets/img/<?= $book['images']; ?>" width="130">
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</div>