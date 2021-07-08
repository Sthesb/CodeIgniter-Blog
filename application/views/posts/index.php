<h3><?= $title ?></h3>

<?php foreach($posts as $post) : ?>
    <div class="container border my-3 py-3 px-5 shadow">
        <div class="row">
            <div class="col-md-3">
                <img class="post_thumb" src="<?php echo site_url(); ?>assets/images/posts/<?= $post['post_image'] ?>" alt="image" srcset="">
                </div>
            <div class="col-md-9">
                <div class="d-flex justify-content-between">
                    <h3><?php echo $post["title"]; ?>  </h3>
                    
                </div>
                <small ><?php echo $post["create_at"]; ?></small> 
                <small style="background-color: #2c81ba; padding: 2px 5px; margin-left: 5px; color: #fff; border-radius: 5px;"><?php echo $post["name"]; ?></small>
                
                <hr>
                <p><?php echo word_limiter($post["body"], 50); ?></p>
                <p><a class="btn btn-info" href="<?php echo site_url("posts/". $post["slug"]); ?>">view post</a></p>
            </div>
        </div>
    </div>
<?php  endforeach; ?>