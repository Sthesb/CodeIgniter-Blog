<h3><?= $title ?></h3>

<?php foreach($comment as $item): ?>
    <?php echo form_open('comments/update'); ?>
        <div class="form-group">
            <label for="form-lable">Name</label>
            <input type="text" name="name" class="form-control" value="<?= $item['name'] ?>">
            <div  class="form-text" >Enter your name</div>
        </div>
        <div class="form-group">
            <label for="form-lable">Email</label>
            <input type="email" name="email" class="form-control" value="<?= $item['email'] ?>">
            <div  class="form-text" >Enter your email</div>
        </div>
        <div class="form-group mb-3">
            <label for="form-lable">Body</label>
            <textarea rows="3" cols="4" name="body" class="form-control" ><?= $item['body'] ?> </textarea>
            <div  class="form-text" >Enter the body of your comment</div>
        </div>
        <input type="hidden" name="post_slug" value="<?= $post[0]['slug'] ?>" >
        <input type="hidden" name="id" value="<?= $item['id'] ?>">
        <button type="submit" class="btn btn-primary">Submit</button>
    <?php echo form_close(); ?>
<?php endforeach; ?>