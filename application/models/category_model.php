<?php 

    class Category_Model extends CI_Model {
        public function __construct()
        {
           $this->load->database(); 
        }

        // get all categries
        public function get_all_categories()
        {
            $this->db->order_by('name');
            $query = $this->db->get('categories');
            return $query->result_array();
        }

        // get single category
        public function get_single_category($id)
        {
            $data = array(
                'id' => $id
            );

            $query = $this->db->get_where('categories', $data);
            return $query->result_array();

        }

        // create category
        public function create_category()
        {
            $data = array(
                'name' => $this->input->post('name')
            );

            return $this->db->insert('categories', $data);
        }

        // update category
        public function update_catgory()
        {
            // echo $this->input->post('name');
            // exit;
            $data = array(
                'name' => $this->input->post('name'),
            );

            $this->db->where('id', $this->input->post('id'));
            return $this->db->update('categories', $data);
        }

        // delete categories
        public function delete_category($id)
        {
            
            $this->db->where('id', $id);
            return $this->db->delete('categories');
        }
    }