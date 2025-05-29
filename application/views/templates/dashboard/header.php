<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS Admin Dashboard</title>
    <link href="<?php echo base_url('assets/css/tailwind.css'); ?>" rel="stylesheet">
    <!-- Add Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Top Navigation Bar -->
    <nav class="bg-white shadow-lg fixed w-full z-10">
        <div class="max-w-full mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <!-- Mobile menu button -->
                    <button id="mobile-menu-button" class="lg:hidden">
                        <i class="fas fa-bars text-gray-600 text-2xl"></i>
                    </button>
                    <div class="ml-4">
                        <span class="text-xl font-semibold">LMS Admin</span>
                    </div>
                </div>
                
                <!-- Right side navigation items -->
                <div class="flex items-center space-x-4">
                    <!-- Notifications -->
                    <button class="text-gray-600 hover:text-gray-800">
                        <i class="fas fa-bell"></i>
                    </button>
                    
                    <!-- Profile Dropdown -->
                    <div class="relative group">
                        <button class="flex items-center space-x-2">
                            <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name=<?php echo $this->session->userdata('username'); ?>" alt="Profile">
                            <span class="hidden md:block"><?php echo $this->session->userdata('username'); ?></span>
                        </button>
                        <div class="absolute right-0 w-48 mt-2 py-2 bg-white rounded-lg shadow-xl hidden group-hover:block">
                            <a href="<?php echo site_url('profile'); ?>" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                                <i class="fas fa-user mr-2"></i> Profile
                            </a>
                            <a href="<?php echo site_url('settings'); ?>" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                                <i class="fas fa-cog mr-2"></i> Settings
                            </a>
                            <hr class="my-2">
                            <a href="<?php echo site_url('auth/logout'); ?>" class="block px-4 py-2 text-red-600 hover:bg-gray-100">
                                <i class="fas fa-sign-out-alt mr-2"></i> Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex h-screen pt-16">
