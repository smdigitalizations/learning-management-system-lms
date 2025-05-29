<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(['form_validation', 'session']);
        $this->load->helper(['url', 'form']);
        $this->load->model('User_model');
    }

    public function index() {
        if ($this->session->userdata('user_id')) {
            redirect('admin/dashboard');
        }
        redirect('login');
    }

    public function login() {
        if ($this->session->userdata('user_id')) {
            redirect('admin/dashboard');
        }

        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('identifier', 'Username/Email', 'required|trim');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run()) {
                $identifier = $this->input->post('identifier');
                $password = $this->input->post('password');

                $user = $this->User_model->get_user_by_username_or_email($identifier);

                if ($user && password_verify($password, $user->hashed_password)) {
                    if (!$user->is_active) {
                        $this->session->set_flashdata('error', 'Your account is inactive. Please contact administrator.');
                        redirect('login');
                    }

                    // Set session data
                    $this->session->set_userdata([
                        'user_id' => $user->user_id,
                        'username' => $user->username,
                        'email' => $user->email,
                        'role' => $user->role
                    ]);

                    // Redirect based on role
                    if ($user->role === 'admin') {
                        redirect('admin/dashboard');
                    } else {
                        redirect('dashboard');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Invalid username/email or password');
                    redirect('login');
                }
            }
        }

        $this->load->view('templates/header');
        $this->load->view('auth/login');
        $this->load->view('templates/footer');
    }

    public function register() {
        if ($this->session->userdata('user_id')) {
            redirect('admin/dashboard');
        }

        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('employee_id', 'Employee ID', 'required|trim|is_unique[users.employee_id]');
            $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

            if ($this->form_validation->run()) {
                $data = [
                    'employee_id' => $this->input->post('employee_id'),
                    'username' => $this->input->post('username'),
                    'email' => $this->input->post('email'),
                    'hashed_password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'role' => 'student', // Default role
                    'is_active' => 1,
                    'google_login' => 0
                ];

                if ($this->User_model->create_user($data)) {
                    $this->session->set_flashdata('success', 'Registration successful! You can now login.');
                    redirect('login');
                } else {
                    $this->session->set_flashdata('error', 'Registration failed. Please try again.');
                    redirect('register');
                }
            }
        }

        $this->load->view('templates/header');
        $this->load->view('auth/register');
        $this->load->view('templates/footer');
    }

    public function forgot_password() {
        if ($this->session->userdata('user_id')) {
            redirect('admin/dashboard');
        }

        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

            if ($this->form_validation->run()) {
                $email = $this->input->post('email');
                $user = $this->User_model->get_user_by_username_or_email($email);

                if ($user) {
                    // Generate password reset token
                    $token = bin2hex(random_bytes(32));
                    $this->User_model->save_reset_token($user->user_id, $token);

                    // Send password reset email (implement email sending logic)
                    // For now, just show success message
                    $this->session->set_flashdata('success', 'Password reset instructions have been sent to your email.');
                } else {
                    $this->session->set_flashdata('error', 'No account found with that email address.');
                }
                redirect('forgot_password');
            }
        }

        $this->load->view('templates/header');
        $this->load->view('auth/forgot_password');
        $this->load->view('templates/footer');
    }

    public function logout() {
        $this->session->unset_userdata(['user_id', 'username', 'email', 'role']);
        $this->session->set_flashdata('success', 'You have been successfully logged out.');
        redirect('login');
    }
}
