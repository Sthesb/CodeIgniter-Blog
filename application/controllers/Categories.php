<?php

    class Categories extends CI_Controller {
        

        // index

        public function index()
        {
            $data ['title'] = 'Categories';
            $data ['categories'] = $this->category_model->get_all_categories();

            $this->load->view('templates/header');
            $this->load->view('categories/index', $data);
            $this->load->view('templates/footer');
        }

        // create
        public function create()
        {
            // check if user is logged in
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            $data ['title'] = 'Create Category';

            $this->form_validation->set_rules('name', 'Category Name', 'required');

            if($this->form_validation->run() == false){
                $this->load->view('templates/header');
                $this->load->view('categories/create', $data);
                $this->load->view('templates/footer');
            }else{
                $this->category_model->create_category();
                // set message
                $this->session->set_flashdata('category_created', 
                'Category Created');

                redirect('categories');
            }

        }

        // edit 
        public function edit($id)
        {
            // check if user is logged in
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            $data['title'] = 'Edit Cagetory';
            $data['category'] = $this->category_model->get_single_category($id);

            $this->load->view('templates/header');
            $this->load->view('categories/edit', $data);
            $this->load->view('templates/footer');

        }

        // update category
        public function update()
        {
            // check if user is logged in
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            echo $this->input->post('name');
            
            $this->category_model->update_catgory();
            // set message
            $this->session->set_flashdata('category_updated', 
            'Category Updated');
            redirect('categories');
        }

        // delete category
        public function delete($id)
        {
            // check if user is logged in
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            
            $this->category_model->delete_category($id);
            redirect('categories');
        }

        // get all posts by category
        public function posts($id)
        {
            $data ['title'] = $this->category_model->get_single_category($id)[0]['name'];
            $data ['posts'] = $this->post_model->get_posts_by_category($id);

            // print_r($data['posts']);
            // exit;

            $this->load->view('templates/header');
            $this->load->view('posts/index', $data);
            $this->load->view('templates/footer');

        }

    }