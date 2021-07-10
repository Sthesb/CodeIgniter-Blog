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
            $data ['title'] = 'Create Category';

            $this->form_validation->set_rules('name', 'Category Name', 'required');

            if($this->form_validation->run() == false){
                $this->load->view('templates/header');
                $this->load->view('categories/create', $data);
                $this->load->view('templates/footer');
            }else{
                $this->category_model->create_category();
                redirect('categories');
            }

        }

        // edit 
        public function edit($id)
        {
            $data['title'] = 'Edit Cagetory';
            $data['category'] = $this->category_model->get_single_category($id);

            $this->load->view('templates/header');
            $this->load->view('categories/edit', $data);
            $this->load->view('templates/footer');

        }

        // update category
        public function update()
        {
            echo $this->input->post('name');
            
            $this->category_model->update_catgory();
            redirect('categories');
        }

        // delete category
        public function delete($id)
        {
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