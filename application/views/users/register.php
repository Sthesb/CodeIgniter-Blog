<h3><?= $title ?></h3>

<div class="text-danger">
    <?php echo validation_errors(); ?>
</div>

<?php echo form_open('users/register'); ?>
    <div class="mb-3">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control">
        <div class="form-text">Enter name</div>
    </div>
    <div class=" mb-3">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" class="form-control">
        <div class="form-text">Enter username</div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control">
            <div class="form-text">Enter email</div>
        </div>
        <div class="col mb-3">
            <label for="zipcode">Zip Code</label>
            <input type="text" name="zipcode" id="zipcode" class="form-control">
            <div class="form-text">Enter zipcode</div>
        </div>
        
    </div>
    
    <div class="row">
        <div class="col mb-3">
            <label for="password">Passwrord</label>
            <input type="password" name="password" id="password" class="form-control">
            <div class="form-text">Enter password</div>
        </div>
        <div class="col mb-3">
            <label for="confPassword">Confirm Passwrord</label>
            <input type="password" name="password_2" id="password_2" class="form-control">
            <div class="form-text">Confirm password</div>
        </div>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Register</button>
    </div>


    

<?php echo form_close(); ?>