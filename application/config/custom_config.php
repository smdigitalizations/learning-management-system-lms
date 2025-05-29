<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Custom Configuration Settings
|--------------------------------------------------------------------------
|
| This file contains custom configuration settings for the LMS application
|
*/

// Application Settings
$config['app_name'] = 'LMS System';
$config['app_version'] = '1.0.0';
$config['admin_email'] = 'admin@example.com';
$config['support_email'] = 'support@example.com';

// Authentication Settings
$config['auth'] = [
    'min_password_length' => 6,
    'max_login_attempts' => 5,
    'lockout_time' => 15, // minutes
    'remember_me_expiry' => 30, // days
    'reset_token_expiry' => 24, // hours
    'session_expiry' => 7200, // seconds (2 hours)
    'allowed_roles' => ['admin', 'teacher', 'student']
];

// Upload Settings
$config['uploads'] = [
    'allowed_types' => 'gif|jpg|jpeg|png|pdf|doc|docx',
    'max_size' => 5120, // 5MB
    'upload_path' => './uploads/',
    'profile_image_path' => './uploads/profile_images/',
    'course_materials_path' => './uploads/course_materials/',
    'assignments_path' => './uploads/assignments/'
];

// Pagination Settings
$config['pagination'] = [
    'per_page' => 10,
    'num_links' => 5,
    'use_page_numbers' => TRUE,
    'page_query_string' => FALSE,
    'reuse_query_string' => TRUE,
    'full_tag_open' => '<nav class="flex justify-center"><ul class="pagination flex">',
    'full_tag_close' => '</ul></nav>',
    'first_link' => '«',
    'first_tag_open' => '<li class="page-item">',
    'first_tag_close' => '</li>',
    'last_link' => '»',
    'last_tag_open' => '<li class="page-item">',
    'last_tag_close' => '</li>',
    'next_link' => '›',
    'next_tag_open' => '<li class="page-item">',
    'next_tag_close' => '</li>',
    'prev_link' => '‹',
    'prev_tag_open' => '<li class="page-item">',
    'prev_tag_close' => '</li>',
    'cur_tag_open' => '<li class="page-item active"><span class="page-link">',
    'cur_tag_close' => '</span></li>',
    'num_tag_open' => '<li class="page-item">',
    'num_tag_close' => '</li>',
    'attributes' => ['class' => 'page-link']
];

// Email Settings
$config['email'] = [
    'protocol' => 'smtp',
    'smtp_host' => 'smtp.gmail.com',
    'smtp_port' => 587,
    'smtp_user' => 'your-email@gmail.com',
    'smtp_pass' => 'your-password',
    'mailtype' => 'html',
    'charset' => 'utf-8',
    'wordwrap' => TRUE,
    'newline' => "\r\n"
];

// Dashboard Settings
$config['dashboard'] = [
    'widgets' => [
        'total_users' => TRUE,
        'active_users' => TRUE,
        'total_courses' => TRUE,
        'pending_assignments' => TRUE
    ],
    'charts' => [
        'user_registration' => TRUE,
        'course_completion' => TRUE,
        'assignment_submission' => TRUE
    ],
    'notifications' => [
        'show_count' => 5,
        'refresh_interval' => 300 // 5 minutes
    ]
];

// Course Settings
$config['courses'] = [
    'categories' => [
        'programming' => 'Programming',
        'design' => 'Design',
        'business' => 'Business',
        'marketing' => 'Marketing',
        'other' => 'Other'
    ],
    'difficulty_levels' => [
        'beginner' => 'Beginner',
        'intermediate' => 'Intermediate',
        'advanced' => 'Advanced'
    ],
    'max_students' => 50,
    'allow_waitlist' => TRUE,
    'enable_reviews' => TRUE
];

// Security Settings
$config['security'] = [
    'enable_csrf' => TRUE,
    'csrf_token_name' => 'csrf_token',
    'csrf_cookie_name' => 'csrf_cookie',
    'csrf_expire' => 7200,
    'enable_xss_clean' => TRUE,
    'allowed_domains' => ['localhost', 'yourdomain.com'],
    'maintenance_mode' => FALSE,
    'maintenance_ips' => ['127.0.0.1']
];

// API Settings
$config['api'] = [
    'enable_rate_limiting' => TRUE,
    'rate_limit_requests' => 100,
    'rate_limit_time' => 3600, // 1 hour
    'require_authentication' => TRUE,
    'token_expiry' => 86400 // 24 hours
];

// Cache Settings
$config['cache'] = [
    'driver' => 'file', // file, redis, memcached
    'backup_driver' => 'file',
    'prefix' => 'lms_',
    'ttl' => 3600, // 1 hour
    'enable_query_cache' => TRUE
];

// Notification Settings
$config['notifications'] = [
    'channels' => [
        'database' => TRUE,
        'email' => TRUE,
        'push' => FALSE
    ],
    'types' => [
        'course_enrollment' => TRUE,
        'assignment_submission' => TRUE,
        'grade_posted' => TRUE,
        'announcement' => TRUE
    ]
];
