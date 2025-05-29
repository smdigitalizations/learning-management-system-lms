<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    protected $table = 'users';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Get user by username or email
     */
    public function get_user_by_username_or_email($identifier) {
        $this->db->where('username', $identifier);
        $this->db->or_where('email', $identifier);
        return $this->db->get($this->table)->row();
    }

    /**
     * Get user by ID
     */
    public function get_user_by_id($user_id) {
        return $this->db->get_where($this->table, ['user_id' => $user_id])->row();
    }

    /**
     * Create new user
     */
    public function create_user($data) {
        return $this->db->insert($this->table, $data);
    }

    /**
     * Update user
     */
    public function update_user($user_id, $data) {
        $this->db->where('user_id', $user_id);
        return $this->db->update($this->table, $data);
    }

    /**
     * Delete user
     */
    public function delete_user($user_id) {
        $this->db->where('user_id', $user_id);
        return $this->db->delete($this->table);
    }

    /**
     * Get all users with optional filters
     */
    public function get_users($filters = [], $limit = null, $offset = 0) {
        if (!empty($filters)) {
            foreach ($filters as $key => $value) {
                if ($value !== '') {
                    $this->db->where($key, $value);
                }
            }
        }

        if ($limit) {
            $this->db->limit($limit, $offset);
        }

        return $this->db->get($this->table)->result();
    }

    /**
     * Count total users with optional filters
     */
    public function count_users($filters = []) {
        if (!empty($filters)) {
            foreach ($filters as $key => $value) {
                if ($value !== '') {
                    $this->db->where($key, $value);
                }
            }
        }

        return $this->db->count_all_results($this->table);
    }

    /**
     * Save password reset token
     */
    public function save_reset_token($user_id, $token) {
        $data = [
            'reset_token' => $token,
            'reset_token_created_at' => date('Y-m-d H:i:s')
        ];
        
        $this->db->where('user_id', $user_id);
        return $this->db->update($this->table, $data);
    }

    /**
     * Verify reset token
     */
    public function verify_reset_token($token) {
        $this->db->where('reset_token', $token);
        $this->db->where('reset_token_created_at >', date('Y-m-d H:i:s', strtotime('-24 hours')));
        return $this->db->get($this->table)->row();
    }

    /**
     * Update password
     */
    public function update_password($user_id, $hashed_password) {
        $data = [
            'hashed_password' => $hashed_password,
            'reset_token' => null,
            'reset_token_created_at' => null
        ];
        
        $this->db->where('user_id', $user_id);
        return $this->db->update($this->table, $data);
    }

    /**
     * Check if email exists
     */
    public function email_exists($email, $exclude_user_id = null) {
        $this->db->where('email', $email);
        if ($exclude_user_id) {
            $this->db->where('user_id !=', $exclude_user_id);
        }
        return $this->db->get($this->table)->num_rows() > 0;
    }

    /**
     * Check if username exists
     */
    public function username_exists($username, $exclude_user_id = null) {
        $this->db->where('username', $username);
        if ($exclude_user_id) {
            $this->db->where('user_id !=', $exclude_user_id);
        }
        return $this->db->get($this->table)->num_rows() > 0;
    }

    /**
     * Get active users count
     */
    public function count_active_users() {
        $this->db->where('is_active', 1);
        return $this->db->count_all_results($this->table);
    }

    /**
     * Get users by role
     */
    public function get_users_by_role($role) {
        return $this->db->get_where($this->table, ['role' => $role])->result();
    }
}
