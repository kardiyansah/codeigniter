<div class="container">
    <h3 class="mt-3">List Of Peoples</h3>

    <div class="row">
        <div class="col-md-6">
            <form action="<?= base_url('peoples'); ?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Press The Keyword Here" aria-label="Recipient's username" aria-describedby="button-addon2" name="keyword" autofocus autocomplete="off">
                    <input type="submit" class="btn btn-primary" name="submit">
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10">
            <h5>Results : <?= $total_rows; ?></h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ( empty($peoples) ) : ?>
                        <tr>
                            <td colspan="4">
                                <div class="alert alert-danger" role="alert">
                                    Data Not Found!
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php foreach( $peoples as $people) : ?>
                    <tr>
                        <th><?= ++$start; ?></th>
                        <td><?= $people['name']; ?></td>
                        <td><?= $people['email']; ?></td>
                        <td>
                            <a href="" class="badge text-bg-primary">Detail</a>
                            <a href="" class="badge text-bg-warning">Update</a>
                            <a href="" class="badge text-bg-danger">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <?= $this->pagination->create_links();; ?>

        </div>
    </div>
</div>