<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        
        // Check if user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        
        // Check if user has admin role
        if ($this->session->userdata('role') !== 'admin') {
            $this->session->set_flashdata('error', 'Access denied. Admin privileges required.');
            redirect('login');
        }
    }

    public function index() {
        redirect('admin/dashboard');
    }

    public function dashboard() {
        $data = array(
            'total_users' => $this->db->count_all('users'),
            'active_users' => $this->db->where('is_active', 1)->count_all_results('users'),
            'total_courses' => 0, // You can add these tables later
            'total_assignments' => 0
        );

        $this->load->view('templates/dashboard/header');
        $this->load->view('templates/dashboard/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/dashboard/footer');
    }

    public function users() {
        $data['users'] = $this->db->get('users')->result();
        
        $this->load->view('templates/dashboard/header');
        $this->load->view('templates/dashboard/sidebar');
        $this->load->view('admin/users', $data);
        $this->load->view('templates/dashboard/footer');
    }

    public function courses() {
        $this->load->view('templates/dashboard/header');
        $this->load->view('templates/dashboard/sidebar');
        $this->load->view('admin/courses');
        $this->load->view('templates/dashboard/footer');
    }

    public function assignments() {
        $this->load->view('templates/dashboard/header');
        $this->load->view('templates/dashboard/sidebar');
        $this->load->view('admin/assignments');
        $this->load->view('templates/dashboard/footer');
    }

    public function reports() {
        $this->load->view('templates/dashboard/header');
        $this->load->view('templates/dashboard/sidebar');
        $this->load->view('admin/reports');
        $this->load->view('templates/dashboard/footer');
    }

    public function settings() {
        $this->load->view('templates/dashboard/header');
        $this->load->view('templates/dashboard/sidebar');
        $this->load->view('admin/settings');
        $this->load->view('templates/dashboard/footer');
    }
}
