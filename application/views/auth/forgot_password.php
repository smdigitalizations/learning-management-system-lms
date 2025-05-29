<h2 class="text-2xl font-bold mb-6 text-center">Forgot Password</h2>

<?php if($this->session->flashdata('success')): ?>
  <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
    <?php echo $this->session->flashdata('success'); ?>
  </div>
<?php endif; ?>

<?php if($this->session->flashdata('error')): ?>
  <div class="bg-red-200 text-red-800 p-3 rounded mb-4">
    <?php echo $this->session->flashdata('error'); ?>
  </div>
<?php endif; ?>

<?php echo form_open('forgot_password'); ?>
  <div class="mb-6">
    <label class="block text-gray-700">Email Address</label>
    <input type="email" name="email" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300" placeholder="Enter your email address" value="<?php echo set_value('email'); ?>">
    <?php echo form_error('email', '<small class="text-red-600">', '</small>'); ?>
  </div>
  <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition duration-200">Reset Password</button>
<?php echo form_close(); ?>

<div class="mt-4 text-center">
  <a href="<?php echo site_url('login'); ?>" class="text-blue-600 hover:underline">Back to Login</a>
</div>
