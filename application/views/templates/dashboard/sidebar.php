<!-- Sidebar Navigation -->
<aside class="bg-gray-800 text-white w-64 min-h-screen hidden lg:block">
    <div class="p-4">
        <div class="flex items-center mb-8">
            <img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="Logo" class="w-8 h-8 mr-2">
            <span class="text-xl font-bold">LMS System</span>
        </div>

        <nav>
            <ul class="space-y-2">
                <!-- Dashboard -->
                <li>
                    <a href="<?php echo site_url('admin/dashboard'); ?>" class="flex items-center px-4 py-2 rounded hover:bg-gray-700 <?php echo $this->uri->segment(2) == 'dashboard' ? 'bg-gray-700' : ''; ?>">
                        <i class="fas fa-home w-5 h-5 mr-3"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Users Management -->
                <li>
                    <a href="<?php echo site_url('admin/users'); ?>" class="flex items-center px-4 py-2 rounded hover:bg-gray-700 <?php echo $this->uri->segment(2) == 'users' ? 'bg-gray-700' : ''; ?>">
                        <i class="fas fa-users w-5 h-5 mr-3"></i>
                        <span>Users</span>
                    </a>
                </li>

                <!-- Courses -->
                <li>
                    <a href="<?php echo site_url('admin/courses'); ?>" class="flex items-center px-4 py-2 rounded hover:bg-gray-700 <?php echo $this->uri->segment(2) == 'courses' ? 'bg-gray-700' : ''; ?>">
                        <i class="fas fa-book w-5 h-5 mr-3"></i>
                        <span>Courses</span>
                    </a>
                </li>

                <!-- Assignments -->
                <li>
                    <a href="<?php echo site_url('admin/assignments'); ?>" class="flex items-center px-4 py-2 rounded hover:bg-gray-700 <?php echo $this->uri->segment(2) == 'assignments' ? 'bg-gray-700' : ''; ?>">
                        <i class="fas fa-tasks w-5 h-5 mr-3"></i>
                        <span>Assignments</span>
                    </a>
                </li>

                <!-- Reports -->
                <li>
                    <a href="<?php echo site_url('admin/reports'); ?>" class="flex items-center px-4 py-2 rounded hover:bg-gray-700 <?php echo $this->uri->segment(2) == 'reports' ? 'bg-gray-700' : ''; ?>">
                        <i class="fas fa-chart-bar w-5 h-5 mr-3"></i>
                        <span>Reports</span>
                    </a>
                </li>

                <!-- Settings -->
                <li>
                    <a href="<?php echo site_url('admin/settings'); ?>" class="flex items-center px-4 py-2 rounded hover:bg-gray-700 <?php echo $this->uri->segment(2) == 'settings' ? 'bg-gray-700' : ''; ?>">
                        <i class="fas fa-cog w-5 h-5 mr-3"></i>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

<!-- Mobile Sidebar -->
<div class="lg:hidden">
    <div id="mobile-sidebar" class="fixed inset-0 z-40 hidden">
        <!-- Background overlay -->
        <div class="fixed inset-0 bg-gray-600 opacity-75"></div>
        
        <!-- Sidebar -->
        <div class="fixed inset-y-0 left-0 w-64 bg-gray-800 text-white">
            <div class="p-4">
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center">
                        <img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="Logo" class="w-8 h-8 mr-2">
                        <span class="text-xl font-bold">LMS System</span>
                    </div>
                    <button id="close-sidebar" class="text-white">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                
                <!-- Mobile Navigation Menu (same as desktop) -->
                <nav>
                    <ul class="space-y-2">
                        <!-- Same items as desktop sidebar -->
                        <li>
                            <a href="<?php echo site_url('admin/dashboard'); ?>" class="flex items-center px-4 py-2 rounded hover:bg-gray-700">
                                <i class="fas fa-home w-5 h-5 mr-3"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <!-- ... other menu items ... -->
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
