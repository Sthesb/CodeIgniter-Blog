<?php
    class Post_model extends CI_Model {
        public function __construct()
        {
            $this->load->database();
        }

        // get all or single post
        public function getAllPosts($slug = FALSE)
        {
            
            if($slug === FALSE){
                $this->db->order_by('create_at', 'DESC');
                $this->db->join('categories', 'categories.id = posts.category_id');
                $query = $this->db->get('posts');
                return $query->result_array();
            }

            // $this->db->inner_join('categories', 'categories.id = posts.category_id');
            // $this->db->join('comments', 'comments.post_id = posts.id');
            $query = $this->db->get_where('posts', array("slug" => $slug));
            
            return $query->result_array();

        }

        // get post by id
        public function get_post_by_id($id)
        {
            $query = $this->db->get_where('posts', array("id" => $id));
            
            return $query->result_array();
        }

        // get posts by category
        public function get_posts_by_category($id)
        {
            $this->db->order_by('create_at', 'DESC');
            $this->db->where('category_id', $id);
            $this->db->join('categories', 'categories.id = posts.category_id');

            $query = $this->db->get('posts');
            return $query->result_array();
        }

        // create post
        public function create_post($post_image)
        {
            $slug = url_title($this->input->post('title'));

            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'body' => $this->input->post('body'),
                'category_id' => $this->input->post('category'),
                'post_image' => $post_image
            );

            return $this->db->insert('posts', $data);
        }

        // update post
        public function update_post()
        {
            $slug = url_title($this->input->post('title'));
            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'body' => $this->input->post('body'),
                'category_id' => $this->input->post('category')
            );

            $this->db->where('id', $this->input->post('id'));
            return $this->db->update('posts', $data);
        }

        // delete post
        public function delete_post($id)
        {
            
            $this->db->where('id', $id);
            $this->db->delete('posts');

            return true;
        }

        // get all categries
        public function get_categories()
        {
            $this->db->order_by('name');
            $query = $this->db->get('categories');
            return $query->result_array();
        }
    }