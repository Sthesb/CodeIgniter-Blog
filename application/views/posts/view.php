

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
                        <?php if($this->session->userdata('logged_in')) :  // check if user is logged in ?>
                        <a type="submit" href="<?php echo base_url(); ?>posts/edit/<?= $item['slug'] ?>" class="btn text-warning"><i class="fas fa-pen-alt text-warning "></i> edit</a>
                        <?php endif  // check if user is logged in ?>
                    </div>
                    <?php if($this->session->userdata('logged_in')) :  // check if user is logged in ?>
                        <?= form_open('posts/delete/' . $item['id'] ); ?>
                            <button type="submit" name="submit" class="btn outline-none text-danger "><i class="fas fa-trash-alt text-danger"></i> delete</button>
                        <?= form_close(); ?>
                    <?php endif ?>

                </div>
                <small ><?php echo $item["create_at"]; ?></small>
                <!-- <small style="background-color: #2c81ba; padding: 2px 5px; margin-left: 5px; color: #fff; border-radius: 5px;"><?php echo $item["name"]; ?></small> -->
                
                <hr>
                <p><?php echo $item["body"]; ?></p>
            </div>
        </div>
        
        
    </div>
    <hr>
    <!-- validations -->
    <div class="text-danger  ">
        <?php echo validation_errors(); ?>
    </div>



    <div class="container d-flex justify-content-between pb-2">
        <h5 class="fw-blod">Latest comments</h5>
        <!-- Button trigger modal -->
        <?php if($this->session->userdata('logged_in')) :  // check if user is logged in ?>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fas fa-plus text-white"></i> Add comment
            </button>
        <?php endif  // check if user is logged in ?>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <?php echo form_open_multipart('comments/create/'. $item['id']); ?>
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Comment</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                                <div  class="form-text" >Enter your name</div>
                            </div>
                            <div class="form-group">
                                <label for="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control">
                                <div  class="form-text" >Enter your email</div>
                            </div>
                            <div class="form-group">
                                <label for="form-label">Body</label>
                                <textarea rows="2" cols="1" name="body" id="body" class="form-control"></textarea>
                                <div  class="form-text" >Enter the bodyog your comment</div>
                            </div>
                            <input type="hidden" name="slug" value="<?= $item['slug'] ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" >Send</button>
                        </div>
                    </div>
                </div>
            <?php echo form_close(); ?>
        </div>


    </div>

    <!-- comments -->
<?php foreach($comments as $comment): ?>
    <div class="bg-light p-3 my-2">
        <div class="d-flex justify-content-between">
            <div class="d-flex justify-content-between">
                <h5 class="fw-bold"><?php echo $comment["name"]; ?>  </h5> &nbsp;&nbsp;
                <?php if($this->session->userdata('logged_in')) :  // check if user is logged in ?>
                <a type="submit" href="<?php echo base_url(); ?>comments/edit/<?= $comment['id'] ?>" class="btn text-warning p-0  ml-2"><i class="fas fa-pen-alt text-warning "></i> edit</a>
                <?php endif ?>
            </div>
            <?php if($this->session->userdata('logged_in')) :  // check if user is logged in ?>
                <?= form_open('comments/delete/' . $comment['id'] ); ?>
                    <input type="hidden" name="slug" value="<?= $item['slug'] ?>">
                    <button type="submit" name="submit" class="btn outline-none text-danger p-0  ml-2"><i class="fas fa-trash-alt text-danger"></i> delete</button>
                <?= form_close(); ?>
            <?php endif ?>
        </div>
        <small ><?php echo $comment["created_at"]; ?></small>
        <hr>
        <p class="m-0"><?php echo $comment["body"]; ?></p>
    </div>
<?php endforeach ?>

    
<?php  endforeach; ?>


