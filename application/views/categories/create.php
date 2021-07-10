<h3><?= $title ?></h3>

<div class="text-danger">
    <?php echo validation_errors(); ?>
</div>

<?php echo form_open_multipart('categories/create'); ?>
    <div class="mb-3">
        <label for="category">Category</label>
        <input type="text" name="name" id="name" class="form-control">
        <div class="form-text">Enter category name</div>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

<?php echo form_close(); ?>