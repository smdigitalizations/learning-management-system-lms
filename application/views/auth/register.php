<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="max-w-md w-full space-y-8 p-8 bg-white rounded-lg shadow-md">
        <!-- Header -->
        <div class="text-center">
            <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                Create Account
            </h2>
            <p class="mt-2 text-sm text-gray-600">
                Join our learning management system
            </p>
        </div>

        <!-- Flash Messages -->
        <?php if($this->session->flashdata('success')): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <?php if($this->session->flashdata('error')): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <!-- Registration Form -->
        <?php echo form_open('auth/register', ['class' => 'mt-8 space-y-6']); ?>
            <div class="rounded-md shadow-sm -space-y-px">
                <!-- Employee ID -->
                <div>
                    <label for="employee_id" class="sr-only">Employee ID</label>
                    <input id="employee_id" 
                           name="employee_id" 
                           type="text" 
                           value="<?php echo set_value('employee_id'); ?>"
                           class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" 
                           placeholder="Employee ID">
                    <?php echo form_error('employee_id', '<small class="text-red-600">', '</small>'); ?>
                </div>

                <!-- Username -->
                <div>
                    <label for="username" class="sr-only">Username</label>
                    <input id="username" 
                           name="username" 
                           type="text" 
                           value="<?php echo set_value('username'); ?>"
                           class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" 
                           placeholder="Username">
                    <?php echo form_error('username', '<small class="text-red-600">', '</small>'); ?>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="sr-only">Email address</label>
                    <input id="email" 
                           name="email" 
                           type="email" 
                           value="<?php echo set_value('email'); ?>"
                           class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" 
                           placeholder="Email address">
                    <?php echo form_error('email', '<small class="text-red-600">', '</small>'); ?>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" 
                           name="password" 
                           type="password" 
                           class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" 
                           placeholder="Password">
                    <?php echo form_error('password', '<small class="text-red-600">', '</small>'); ?>
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="confirm_password" class="sr-only">Confirm Password</label>
                    <input id="confirm_password" 
                           name="confirm_password" 
                           type="password" 
                           class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" 
                           placeholder="Confirm Password">
                    <?php echo form_error('confirm_password', '<small class="text-red-600">', '</small>'); ?>
                </div>
            </div>

            <!-- Terms and Conditions -->
            <div class="flex items-center">
                <input id="terms" 
                       name="terms" 
                       type="checkbox" 
                       class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                <label for="terms" class="ml-2 block text-sm text-gray-900">
                    I agree to the 
                    <a href="#" class="font-medium text-blue-600 hover:text-blue-500">
                        Terms and Conditions
                    </a>
                </label>
            </div>

            <!-- Register Button -->
            <div>
                <button type="submit" 
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <i class="fas fa-user-plus"></i>
                    </span>
                    Create Account
                </button>
            </div>

            <!-- Login Link -->
            <div class="text-center">
                <p class="text-sm text-gray-600">
                    Already have an account? 
                    <a href="<?php echo site_url('auth/login'); ?>" class="font-medium text-blue-600 hover:text-blue-500">
                        Sign in here
                    </a>
                </p>
            </div>
        <?php echo form_close(); ?>

        <!-- Social Registration -->
        <div class="mt-6">
            <div class="relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-white text-gray-500">
                        Or register with
                    </span>
                </div>
            </div>

            <div class="mt-6 grid grid-cols-1 gap-3">
                <button type="button" 
                        class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <i class="fab fa-google w-5 h-5 text-red-500"></i>
                    <span class="ml-2">Register with Google</span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Add Font Awesome for icons -->
<script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>
