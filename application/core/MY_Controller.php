<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    
    protected $data = array();
    
    public function __construct() {
        parent::__construct();
        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['url', 'form']);
        
        // Set default page title
        $this->data['page_title'] = 'LMS System';
        
        // Check if user is logged in
        $this->data['is_logged_in'] = $this->session->userdata('user_id') ? TRUE : FALSE;
        
        if ($this->data['is_logged_in']) {
            $this->data['current_user'] = (object)[
                'user_id' => $this->session->userdata('user_id'),
                'username' => $this->session->userdata('username'),
                'email' => $this->session->userdata('email'),
                'role' => $this->session->userdata('role')
            ];
        }
    }
    
    protected function require_login() {
        if (!$this->data['is_logged_in']) {
            $this->session->set_flashdata('error', 'Please login to access this page.');
            redirect('login');
        }
    }
    
    protected function require_admin() {
        $this->require_login();
        
        if ($this->data['current_user']->role !== 'admin') {
            $this->session->set_flashdata('error', 'Access denied. Admin privileges required.');
            redirect('dashboard');
        }
    }
    
    protected function render($view, $layout = 'default') {
        // Add CSRF token to all forms
        $this->data['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        
        if ($layout === 'default') {
            $this->load->view('templates/header', $this->data);
            $this->load->view($view, $this->data);
            $this->load->view('templates/footer', $this->data);
        } elseif ($layout === 'dashboard') {
            $this->load->view('templates/dashboard/header', $this->data);
            $this->load->view('templates/dashboard/sidebar', $this->data);
            $this->load->view($view, $this->data);
            $this->load->view('templates/dashboard/footer', $this->data);
        } else {
            // For custom layouts or no layout
            $this->load->view($view, $this->data);
        }
    }
    
    protected function json_response($data, $status_code = 200) {
        $this->output
            ->set_content_type('application/json')
            ->set_status_header($status_code)
            ->set_output(json_encode($data));
    }
    
    protected function handle_ajax_request($callback) {
        if (!$this->input->is_ajax_request()) {
            $this->json_response(['error' => 'Invalid request method'], 400);
            return;
        }
        
        try {
            $result = call_user_func($callback);
            $this->json_response($result);
        } catch (Exception $e) {
            $this->json_response(['error' => $e->getMessage()], 500);
        }
    }
    
    protected function set_validation_rules($rules) {
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() === FALSE) {
            $errors = array();
            foreach ($rules as $rule) {
                $field = $rule['field'];
                if (form_error($field)) {
                    $errors[$field] = strip_tags(form_error($field));
                }
            }
            return $errors;
        }
        
        return TRUE;
    }
    
    protected function send_json_success($message = '', $data = array()) {
        $response = array('success' => TRUE);
        
        if (!empty($message)) {
            $response['message'] = $message;
        }
        
        if (!empty($data)) {
            $response['data'] = $data;
        }
        
        $this->json_response($response);
    }
    
    protected function send_json_error($message = '', $data = array(), $status_code = 400) {
        $response = array('success' => FALSE);
        
        if (!empty($message)) {
            $response['message'] = $message;
        }
        
        if (!empty($data)) {
            $response['data'] = $data;
        }
        
        $this->json_response($response, $status_code);
    }
}

// Admin Controller
class Admin_Controller extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->require_admin();
    }
}

// Auth Controller
class Auth_Controller extends MY_Controller {
    public function __construct() {
        parent::__construct();
        
        // Redirect to dashboard if already logged in
        if ($this->data['is_logged_in'] && 
            $this->router->fetch_class() === 'auth' && 
            $this->router->fetch_method() !== 'logout') {
            redirect('dashboard');
        }
    }
}

// User Controller
class User_Controller extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->require_login();
    }
}
