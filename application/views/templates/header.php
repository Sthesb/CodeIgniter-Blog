<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CI Blog</title>
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    

        <!-- ckeditor -->
        <script src="http:///cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url(); ?>">ciBlog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo base_url(); ?>">Home
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>
                
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>posts">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <?php if($this->session->userdata('logged_in'))  : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>categories">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>posts/create">Create Post</a>
                        </li>
                    <?php endif ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if($this->session->userdata('logged_in'))  : ?>
                        <li class="nav-item">
                            <a class="nav-link"><?= $this->session->userdata('username')?></a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>users/logout" class="nav-link">Logout</a>
                        </li>
                    <?php endif ?>
                    <?php if(!$this->session->userdata('logged_in'))  : ?>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>users/login" class="nav-link">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>users/register" class="nav-link">Signup</a>
                        </li>
                    <?php endif ?>
                    
                </ul>
                
            </div>
        </div>
    </nav>
    <div class="container pt-5">
        <!-- check messagee -->
        <?php if($this->session->flashdata('user_registered')): ?>
            <?php echo'
                <div class="alert alert-success ">
                    '.$this->session->flashdata('user_registered').'
                </div>
            '; ?>
        <?php endif; ?>

        <?php if($this->session->flashdata('post_created')): ?>
            <?php echo'
                <div class="alert alert-success ">
                    '.$this->session->flashdata('post_created').'
                </div>
            '; ?>
        <?php endif; ?>
        
        <?php if($this->session->flashdata('post_updated')): ?>
            <?php echo'
                <div class="alert alert-success ">
                    '.$this->session->flashdata('post_updated').'
                </div>
            '; ?>
        <?php endif; ?>

        <?php if($this->session->flashdata('category_created')): ?>
            <?php echo'
                <div class="alert alert-success ">
                    '.$this->session->flashdata('category_created').'
                </div>
            '; ?>
        <?php endif; ?>

        <?php if($this->session->flashdata('category_updated')): ?>
            <?php echo'
                <div class="alert alert-success ">
                    '.$this->session->flashdata('category_updated').'
                </div>
            '; ?>
        <?php endif; ?>

        <?php if($this->session->flashdata('comment_created')): ?>
            <?php echo'
                <div class="alert alert-success ">
                    '.$this->session->flashdata('comment_created').'
                </div>
            '; ?>
        <?php endif; ?>

        <?php if($this->session->flashdata('comment_updated')): ?>
            <?php echo'
                <div class="alert alert-success ">
                    '.$this->session->flashdata('comment_updated').'
                </div>
            '; ?>
        <?php endif; ?>

        <?php if($this->session->flashdata('user_loggedin')): ?>
            <?php echo'
                <div class="alert alert-success ">
                    '.$this->session->flashdata('user_loggedin').'
                </div>
            '; ?>
        <?php endif; ?>

        <?php if($this->session->flashdata('wrong_user_credentails')): ?>
            <?php echo'
                <div class="alert alert-danger ">
                    '.$this->session->flashdata('wrong_user_credentails').'
                </div>
            '; ?>
        <?php endif; ?>

        <?php if($this->session->flashdata('user_loggedout')): ?>
            <?php echo'
                <div class="alert alert-success ">
                    '.$this->session->flashdata('user_loggedout').'
                </div>
            '; ?>
        <?php endif; ?>

        

