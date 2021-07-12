<?php

    class Comment_model extends CI_Model{
        public function __construct()
        {
            $this->load->database();
        }
        
        // get comments by post
        public function get_comments_by_post($post_id)
        {
            $query = $this->db->get_where('comments', array("post_id" => $post_id));
            
            return $query->result_array();
        }

        // get comment
        public function get_comment($id)
        {
            
            $query = $this->db->get_where('comments', array('id' => $id));
            return $query->result_array();
        }

        // create comment
        public function create_comment($post_id)
        {
            
            $data = array (
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'body' => $this->input->post('body'),
                'post_id' => $post_id
            );

            return $this->db->insert('comments', $data);
        }

        // update comment
        public function update_comment()
        {
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'body' => $this->input->post('body'),
            );

            $this->db->where('id', $this->input->post('id'));

            return $this->db->update('comments', $data);
        }

        // delete comment
        public function delete_comment($id)
        {
            $this->db->where('id', $id);
            return $this->db->delete('comments');
        }

        // delete comments by post_id
        public function delete_comment_by_post_id($id)
        {
            $this->db->where('post_id', $id);
            return $this->db->delete('comments');
        }
    }