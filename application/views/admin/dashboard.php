<!-- Main Content -->
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
    <!-- Welcome Section -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Welcome, <?php echo $this->session->userdata('username'); ?>!</h1>
        <p class="text-gray-600 mt-1">Here's what's happening in your LMS today.</p>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <!-- Users Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 text-blue-500">
                    <i class="fas fa-users text-2xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-gray-600">Total Users</p>
                    <h2 class="text-2xl font-semibold text-gray-800"><?php echo $total_users; ?></h2>
                </div>
            </div>
            <div class="mt-4">
                <p class="text-green-500 text-sm">
                    <i class="fas fa-user-check"></i>
                    <?php echo $active_users; ?> active users
                </p>
            </div>
        </div>

        <!-- Courses Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-100 text-green-500">
                    <i class="fas fa-book text-2xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-gray-600">Total Courses</p>
                    <h2 class="text-2xl font-semibold text-gray-800"><?php echo $total_courses; ?></h2>
                </div>
            </div>
            <div class="mt-4">
                <a href="<?php echo site_url('admin/courses'); ?>" class="text-blue-500 text-sm hover:underline">
                    <i class="fas fa-arrow-right"></i>
                    Manage courses
                </a>
            </div>
        </div>

        <!-- Assignments Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-purple-100 text-purple-500">
                    <i class="fas fa-tasks text-2xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-gray-600">Assignments</p>
                    <h2 class="text-2xl font-semibold text-gray-800"><?php echo $total_assignments; ?></h2>
                </div>
            </div>
            <div class="mt-4">
                <a href="<?php echo site_url('admin/assignments'); ?>" class="text-blue-500 text-sm hover:underline">
                    <i class="fas fa-arrow-right"></i>
                    View assignments
                </a>
            </div>
        </div>

        <!-- System Status Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-100 text-yellow-500">
                    <i class="fas fa-server text-2xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-gray-600">System Status</p>
                    <h2 class="text-lg font-semibold text-green-500">All Systems Active</h2>
                </div>
            </div>
            <div class="mt-4">
                <p class="text-gray-500 text-sm">
                    <i class="fas fa-clock"></i>
                    Last checked: <?php echo date('H:i'); ?>
                </p>
            </div>
        </div>
    </div>

    <!-- Recent Activity Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Users -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold text-gray-800">Recent Users</h3>
                <a href="<?php echo site_url('admin/users'); ?>" class="text-blue-500 hover:underline">View all</a>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left py-2">Username</th>
                            <th class="text-left py-2">Role</th>
                            <th class="text-left py-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sample data - replace with actual user data -->
                        <tr class="border-b">
                            <td class="py-2">john_doe</td>
                            <td class="py-2">Student</td>
                            <td class="py-2"><span class="px-2 py-1 bg-green-100 text-green-600 rounded-full text-sm">Active</span></td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2">jane_smith</td>
                            <td class="py-2">Teacher</td>
                            <td class="py-2"><span class="px-2 py-1 bg-green-100 text-green-600 rounded-full text-sm">Active</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Quick Actions</h3>
            <div class="grid grid-cols-2 gap-4">
                <a href="<?php echo site_url('admin/users/create'); ?>" class="flex items-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors">
                    <i class="fas fa-user-plus text-blue-500 text-xl mr-3"></i>
                    <span class="text-gray-700">Add New User</span>
                </a>
                <a href="<?php echo site_url('admin/courses/create'); ?>" class="flex items-center p-4 bg-green-50 rounded-lg hover:bg-green-100 transition-colors">
                    <i class="fas fa-book-medical text-green-500 text-xl mr-3"></i>
                    <span class="text-gray-700">Create Course</span>
                </a>
                <a href="<?php echo site_url('admin/assignments/create'); ?>" class="flex items-center p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition-colors">
                    <i class="fas fa-plus-circle text-purple-500 text-xl mr-3"></i>
                    <span class="text-gray-700">New Assignment</span>
                </a>
                <a href="<?php echo site_url('admin/reports'); ?>" class="flex items-center p-4 bg-yellow-50 rounded-lg hover:bg-yellow-100 transition-colors">
                    <i class="fas fa-chart-line text-yellow-500 text-xl mr-3"></i>
                    <span class="text-gray-700">View Reports</span>
                </a>
            </div>
        </div>
    </div>
</main>
