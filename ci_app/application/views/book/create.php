<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Create New Book
                </div>
                <div class="card-body">
                   <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="title" class="form-label">Book Title</label>
                            <input type="text" class="form-control" id="title" name="title">
                            <div class="form-text"><?= form_error('title'); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="writer" class="form-label">Writer</label>
                            <input type="text" class="form-control" id="writer" name="writer">
                            <div class="form-text"><?= form_error('writer'); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="publication_year" class="form-label">Publication Year</label>
                            <input type="text" class="form-control" id="publication_year" name="publication_year">
                            <div class="form-text"><?= form_error('publication_year'); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="total_pages" class="form-label">Total Pages</label>
                            <input type="text" class="form-control" id="total_pages" name="total_pages">
                            <div class="form-text"><?= form_error('total_pages'); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="images" class="form-label">Image</label>
                            <input type="file" class="form-control" id="images" name="images">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary float-end">Create Book</button>
                   </form>
                </div>
            </div>

        </div>
    </div>
</div>