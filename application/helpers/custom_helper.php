<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Custom Helper Functions
 */

if (!function_exists('format_date')) {
    /**
     * Format date to readable format
     * 
     * @param string $date
     * @param string $format
     * @return string
     */
    function format_date($date, $format = 'M d, Y') {
        return date($format, strtotime($date));
    }
}

if (!function_exists('time_elapsed_string')) {
    /**
     * Returns time elapsed string (e.g., 2 hours ago)
     * 
     * @param string $datetime
     * @return string
     */
    function time_elapsed_string($datetime) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );

        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$string) return 'just now';
        return array_shift($string) . ' ago';
    }
}

if (!function_exists('get_gravatar')) {
    /**
     * Get Gravatar URL for an email
     * 
     * @param string $email
     * @param int $size
     * @return string
     */
    function get_gravatar($email, $size = 80) {
        $hash = md5(strtolower(trim($email)));
        return "https://www.gravatar.com/avatar/{$hash}?s={$size}&d=mp";
    }
}

if (!function_exists('format_file_size')) {
    /**
     * Format file size in bytes to human readable format
     * 
     * @param int $bytes
     * @return string
     */
    function format_file_size($bytes) {
        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            return $bytes . ' bytes';
        } elseif ($bytes == 1) {
            return $bytes . ' byte';
        } else {
            return '0 bytes';
        }
    }
}

if (!function_exists('generate_random_string')) {
    /**
     * Generate random string
     * 
     * @param int $length
     * @return string
     */
    function generate_random_string($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $string .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $string;
    }
}

if (!function_exists('is_active_menu')) {
    /**
     * Check if current page matches menu item
     * 
     * @param string $menu
     * @return string
     */
    function is_active_menu($menu) {
        $CI =& get_instance();
        return ($CI->uri->segment(2) == $menu) ? 'active' : '';
    }
}

if (!function_exists('format_currency')) {
    /**
     * Format number to currency
     * 
     * @param float $amount
     * @param string $currency
     * @return string
     */
    function format_currency($amount, $currency = 'USD') {
        return number_format($amount, 2) . ' ' . $currency;
    }
}

if (!function_exists('get_file_extension')) {
    /**
     * Get file extension
     * 
     * @param string $filename
     * @return string
     */
    function get_file_extension($filename) {
        return strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    }
}

if (!function_exists('sanitize_filename')) {
    /**
     * Sanitize filename
     * 
     * @param string $filename
     * @return string
     */
    function sanitize_filename($filename) {
        // Remove any character that is not alphanumeric, dot, or dash
        $filename = preg_replace('/[^a-zA-Z0-9.-]/', '_', $filename);
        // Remove multiple consecutive dots
        $filename = preg_replace('/\.+/', '.', $filename);
        // Remove multiple consecutive underscores
        $filename = preg_replace('/_+/', '_', $filename);
        return $filename;
    }
}

if (!function_exists('get_user_role_badge')) {
    /**
     * Get HTML badge for user role
     * 
     * @param string $role
     * @return string
     */
    function get_user_role_badge($role) {
        $badges = [
            'admin' => 'bg-purple-100 text-purple-800',
            'teacher' => 'bg-blue-100 text-blue-800',
            'student' => 'bg-green-100 text-green-800'
        ];

        $class = $badges[$role] ?? 'bg-gray-100 text-gray-800';
        return '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ' . $class . '">' 
             . ucfirst($role) . '</span>';
    }
}

if (!function_exists('get_status_badge')) {
    /**
     * Get HTML badge for status
     * 
     * @param bool $status
     * @param string $true_text
     * @param string $false_text
     * @return string
     */
    function get_status_badge($status, $true_text = 'Active', $false_text = 'Inactive') {
        $class = $status 
            ? 'bg-green-100 text-green-800' 
            : 'bg-red-100 text-red-800';
        $text = $status ? $true_text : $false_text;
        
        return '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ' . $class . '">' 
             . $text . '</span>';
    }
}

if (!function_exists('truncate_text')) {
    /**
     * Truncate text to specified length
     * 
     * @param string $text
     * @param int $length
     * @param string $suffix
     * @return string
     */
    function truncate_text($text, $length = 100, $suffix = '...') {
        if (strlen($text) <= $length) {
            return $text;
        }
        return substr($text, 0, $length) . $suffix;
    }
}

if (!function_exists('is_ajax_request')) {
    /**
     * Check if request is AJAX
     * 
     * @return bool
     */
    function is_ajax_request() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
               strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
    }
}

if (!function_exists('array_to_csv')) {
    /**
     * Convert array to CSV string
     * 
     * @param array $array
     * @param array $header_row
     * @return string
     */
    function array_to_csv($array, $header_row = []) {
        if (empty($array)) return '';
        
        ob_start();
        $df = fopen("php://output", 'w');
        if (!empty($header_row)) {
            fputcsv($df, $header_row);
        }
        foreach ($array as $row) {
            fputcsv($df, $row);
        }
        fclose($df);
        return ob_get_clean();
    }
}

/* End of file custom_helper.php */
