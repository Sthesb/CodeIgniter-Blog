<?php

    class Posts extends CI_Controller {
        // all posts
        public function index( )
        {
            $data ['title'] = 'Latest Posts';
            $data ['posts'] = $this->post_model->getAllPosts();
            
            
            
            $this->load->view('templates/header');
            $this->load->view('posts/index', $data);
            $this->load->view('templates/footer');
        }

        // get single post
        public function view($slug)
        {
            
            $data['post'] = $this->post_model->getAllPosts($slug);
            
            $post_id = $data['post'][0]['id'];
            $data['comments'] = $this->comment_model->get_comments_by_post($post_id);


            if(empty($data['post']))
            {
                show_404();
            }

            $this->load->view('templates/header');
            $this->load->view('posts/view', $data);
            $this->load->view('templates/footer');
        }

        // create post
        public function create()
        {
            // check if user is logged in
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            $data ['title'] = 'Create Post';
            $data ['categories'] = $this->post_model->get_categories();

            $this->form_validation->set_rules('title', 'Title', 'required' );
            $this->form_validation->set_rules('body', 'Body', 'required' );
            $this->form_validation->set_rules('category', 'Category', 'required' );

            if($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header');
                $this->load->view('posts/create', $data);
                $this->load->view('templates/footer');
            }else{

                // upload image
                $config['upload_path'] = './assets/images/posts/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                // $config['max_width'] = '500';
                // $config['max_height'] = '500';

                $this->load->library('upload', $config);

                if(!$this->upload->do_upload()){
                    $errors = array('error' => $this->upload->display_errors());
                   
                    $post_image = 'noimage.png';
                }else{
                    $data = array('upload_data' => $this->upload->data());
                    $post_image = $_FILES['userfile']['name'];

                
                }


                $this->post_model->create_post($post_image);
                // set message

                $this->session->set_flashdata('post_created', 
                'Post created');
                redirect('posts');
            }
            
        }

        // delete post
        public function delete($id)
        {
            // check if user is logged in
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            
            $this->post_model->delete_post($id);
            $this->comment_model->delete_comment_by_post_id($id);
            
            redirect('posts');
        }

        // edit post
        public function edit($slug)
        {
            // check if user is logged in
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            // echo $slug;
            // exit();

            $data ['title'] = 'Edit Post';
            $data ['categories'] = $this->post_model->get_categories();
            $data['post'] = $this->post_model->getAllPosts($slug);
            if(empty($data['post']))
            {
                show_404();
            }

            // print_r($data['post']);
            // exit();

            $this->load->view('templates/header');
            $this->load->view('posts/edit', $data);
            $this->load->view('templates/footer');
        }

        // update post
        public function update()
        {

            $this->post_model->update_post();
            $this->session->set_flashdata('post_updated', 
            'Post upated');
            redirect('posts');
        }


    }


  