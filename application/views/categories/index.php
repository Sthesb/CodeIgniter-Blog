<h3><?= $title ?></h3>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Category</th>
            <th scope="col">
                <a href="<?php echo base_url(); ?>categories/create" class="btn btn-success "><i class="fas fa-plus text-white"></i>   add</a>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($categories as $category): ?>
        <tr>
            <td>
                <a href="<?php echo base_url(); ?>categories/posts/<?= $category['id'] ?>"><?= $category['name'] ?></a>
            </td>
            <td class="d-flex">
                <a href="<?php echo base_url(); ?>categories/edit/<?= $category['id'] ?>" class="btn"><i class="fas fa-pen-alt text-warning "></i> edit</a>
                <?= form_open('categories/delete/' . $category['id'] ); ?>
                    <button class="btn" name="submit"><i class="fa fa-trash-alt text-danger"></i> delete</button>
                <?= form_close(); ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
