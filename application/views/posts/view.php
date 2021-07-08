<!-- <?= print_r($post); ?> -->
<?php foreach($post as $item) : ?>
    <div class="container border my-3 py-3 px-5 shadow">
        <div class="row">
            <div class="col-md-3 col-sm:text-center">
                <!-- image  -->
                <img class=" img-fluid " src="<?php echo site_url(); ?>assets/images/posts/<?= $item['post_image'] ?>" alt="image" srcset="">
            </div>
            <div class="col-md-9 pl-3">
                <div class="d-flex justify-content-between">
                    <div class="d-flex justify-content-between">
                        <h3 ><?php echo $item["title"]; ?>  </h3>
                        <a type="submit" href="<?php echo base_url(); ?>posts/edit/<?= $item['slug'] ?>" class="btn text-warning"><i class="fas fa-pen-alt text-warning "></i> edit</a>
                    </div>
                    <?= form_open('posts/delete/' . $item['id'] ); ?>
                        <button type="submit" name="submit" class="btn outline-none text-danger "><i class="fas fa-trash-alt text-danger"></i> delete</button>
                    <?= form_close(); ?>
                </div>
                <small ><?php echo $item["create_at"]; ?></small>
                <!-- <small style="background-color: #2c81ba; padding: 2px 5px; margin-left: 5px; color: #fff; border-radius: 5px;"><?php echo $item["name"]; ?></small> -->
                
                <hr>
                <p><?php echo $item["body"]; ?></p>
            </div>
        </div>
        
        
    </div>
   
    
<?php  endforeach; ?>


