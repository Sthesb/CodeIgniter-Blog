<?php 
    class User_model extends CI_Model{
        public function __construct()
        {
            $this->load->database();
        }
        
        // register
        public function register($password)
        {
            $data = array(
                'name' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'zipcode' => $this->input->post('zipcode'),
                'password' => $password
            );

            return $this->db->insert('users', $data);
        }


        // check if user exists
        public function check_username_exists($username)
        {
            $query = $this->db->get_where('users', array('username' => $username));

            if(empty($query->row_array()))
            {
                return true;
            }else{
                return false;
            }
        }

        // check if email exists
        public function check_email_exists($email)
        {
            $query = $this->db->get_where('users', array('email' => $email));

            if(empty($query->row_array()))
            {
                return true;
            }else{
                return false;
            }
        }

        // login
        public function login($username, $password)
        {
            $this->db->where('username', $username);
            $this->db->where('password', $password);

            $results = $this->db->get('users');

            if($results->num_rows() == 1)
            {
                print_r($results->row(0)->user_id) ;
                return $results->row(0)->user_id;
            }else{
                return false;
            }

            
        }
    }