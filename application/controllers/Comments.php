<?php

    class Comments extends CI_Controller {

        // create comment
        public function create($post_id)
        {
            
            $slug = $this->input->post('slug');

            $data ['post'] = $this->post_model->getAllPosts($slug);
            $data['comments'] = $this->comment_model->get_comments_by_post($post_id);

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('body', 'Body', 'required');

            if($this->form_validation->run() == FALSE) {
                $this->load->view('templates/header');
                $this->load->view('posts/view', $data);
                $this->load->view('templates/footer');
            }else {
                echo $post_id ;
                $this->comment_model->create_comment($post_id);
                redirect('posts/'.$slug);
            }
        }

        // edit comments
        public function edit($id)
        {
            $data ['title'] = 'Edit comment';
            $data ['comment'] = $this->comment_model->get_comment($id);
            $data ['post'] = $this->post_model->get_post_by_id($data['comment'][0]['post_id']);

            // $data ['post'] = $this->post_model->getAllPosts($data['post_inod']);

            $this->load->view('templates/header');
            $this->load->view('comments/edit', $data);
            $this->load->view('templates/footer');
        }

        // update comment
        public function update()
        {


            $data ['title'] = 'Edit comment';
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('body', 'Body', 'required');

            if($this->form_validation->run() == FALSE) {
                $this->load->view('templates/header');
                $this->load->view('posts/view', $data);
                $this->load->view('templates/footer');
            }else {;
                $this->comment_model->update_comment();
                redirect('posts/'. $this->input->post('post_slug'));
            }
        }


        // delete comment
        public function delete($id)
        {
            $this->comment_model->delete_comment($id);
            
            redirect('posts/'. $this->input->post('slug'));
        }
    }