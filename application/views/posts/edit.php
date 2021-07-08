<h2><?= $title ?></h2>


<?php echo validation_errors() ; ?>
<?php echo form_open_multipart('posts/update'); ?>

    <?php foreach($post as $item) : ?>
        
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="<?= $item['title'] ?>">
            <div  class="form-text"  >Title of the post.</div>
        </div>
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category" id="category" class="form-control" >
                <option value="">-- select category --</option>
                <?php foreach($categories as $category) : ?>
                    
                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                <?php endforeach; ?>
                <div  class="form-text" >Select post category.</div>
            </select>
        </div>
        <div class="mb-3">
            <label for="">Updload Image</label>
            <input type="file" name="userfile" size="20"  class="form-control" >
            <div  class="form-text" >Upload post image.</div>
        </div>
        <div class="mb-3">
            <label class="form-label">Body</label>
            <textarea cols="3" rows="4" class="form-control" id="editor1" name="body" value=""><?= $item['body'] ?></textarea>
            <div  class="form-text" >Body of the post.</div>
        </div>
        <input type="hidden" name = "id" value="<?= $item['id'] ?>" >
        
        <button type="submit" class="btn btn-primary mb-5">Submit</button>

    <?php  endforeach; ?>
<?php echo form_close(); ?>