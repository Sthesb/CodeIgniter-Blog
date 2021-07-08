<h2><?= $title ?></h2>
<?php echo validation_errors() ; ?>
<?php echo form_open_multipart('posts/create'); ?>
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" >
        <div  class="form-text"  >Title of the post.</div>
    </div>
    <div class="mb-3">
        <label class="form-label">Category</label>
        <select name="category" id="category" class="form-control" >
            <option value="">-- select category --</option>
            <?php foreach($categories as $category) : ?>
                
                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
            <?php endforeach; ?>
           
        </select>
        <div  class="form-text" >Select post category.</div>
    </div>
    <div class="mb-3">
        <label for="">Updload Image</label>
        <input type="file" name="userfile" size="20"  class="form-control">
        <div  class="form-text" >Upload post image.</div>
    </div>
    <div class="mb-3">
        <label class="form-label">Body</label>
        <textarea cols="3" rows="4" class="form-control" id="editor1" name="body"></textarea>
        <div  class="form-text" >Body of the post.</div>
    </div>
    
    
    <button type="submit" class="btn btn-primary mb-5">Submit</button>
<?php echo form_close(); ?>