
<div class="text-danger">
    <?php echo validation_errors(); ?>
</div>

<?php echo form_open('users/login'); ?>
    
    <div class=" row ">
       

        <div class="d-block col-md-4 col-md-offset-4"> 
            <h3 class="d-block "><?= $title ?></h3>
            <div class=" mb-3">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control">
                <div class="form-text">Enter username</div>
            </div>
            <div class=" mb-3">
                <label for="password">Passwrord</label>
                <input type="password" name="password" id="password" class="form-control">
                <div class="form-text">Enter password</div>
            </div>

            
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </div>
    </div>


    

<?php echo form_close(); ?>