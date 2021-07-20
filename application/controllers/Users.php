<?php 
    class Users extends CI_Controller{
       
        // register
        public function register()
        {
            $data['title'] = 'Sign Up';

            // validation
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
            $this->form_validation->set_rules('zipcode', 'Zip Code', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password_2', 'Confirm Password', 'matches[password]');

            if($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header');
                $this->load->view('users/register', $data);
                $this->load->view('templates/footer');
            }else{
                // encrypt password
                $enc_password = md5($this->input->post('password'));
                $this->user_model->register($enc_password);
                
                // set message

                $this->session->set_flashdata('user_registered', 
                'You are now a registered user and can login');

                redirect('users/login');
            }
        }

        //  check if username exitsts
        public function check_username_exists($username)
        {
            $this->form_validation->set_message(
                'check_username_exists', 'Username is already taken');

            if($this->user_model->check_username_exists($username))
            {
                
                return true;
            }else{
                return false;
            }
        }

        //  check if email exitsts
        public function check_email_exists($email)
        {
            $this->form_validation->set_message(
                'check_email_exists', 'Email is already taken');

            if($this->user_model->check_email_exists($email))
            {
                
                return true;
            }else{
                return false;
            }
        }


        // login
        public function login()
        {
            $data['title'] = 'Login';

            // validationd');
            $this->form_validation->set_rules('username', 'Username', 'required');
            
            $this->form_validation->set_rules('password', 'Password', 'required');
            

            if($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header');
                $this->load->view('users/login', $data);
                $this->load->view('templates/footer');
            }else{
                // get username
                $username = $this->input->post('username');
                // get and encrypt password
                $password = md5($this->input->post('password'));

                // Login user

                $user_id = $this->user_model->login($username, $password);
                
                if(isset($user_id)) {
                    // create user session
                    $user_data = array(
                        'user_id' => $user_id,
                        'username' => $username,
                        'logged_in' => true
                    );

                    $this->session->set_userdata($user_data);
                    // set message
                    $this->session->set_flashdata('user_loggedin', 
                    'You are now logged in');

                    redirect('posts');
                }else{
                    // set message
                    $this->session->set_flashdata('wrong_user_credentails', 
                    'Username or Password incorrect');

                    redirect('users/login');
                }
                
                

                
            }
        }

        public function logout()
        {       
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('username');

            // set message
            $this->session->set_flashdata('user_loggedout', 
            'You are now logged out');

            redirect('users/login');
        }

    }