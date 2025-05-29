</div> <!-- End Content Container -->

    <!-- Footer -->
    <footer class="relative z-10 bg-white shadow-lg mt-8">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <div class="text-sm text-gray-500">
                    &copy; <?php echo date('Y'); ?> LMS. All rights reserved.
                </div>
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <span class="sr-only">Terms</span>
                        Terms of Service
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <span class="sr-only">Privacy</span>
                        Privacy Policy
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <span class="sr-only">Contact</span>
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript for Notifications -->
    <script>
        // Auto-hide flash messages after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const flashMessages = document.querySelectorAll('.bg-green-100, .bg-red-100');
            flashMessages.forEach(function(message) {
                setTimeout(function() {
                    message.style.transition = 'opacity 0.5s ease-in-out';
                    message.style.opacity = '0';
                    setTimeout(function() {
                        message.remove();
                    }, 500);
                }, 5000);
            });
        });

        // Add loading state to forms
        document.querySelectorAll('form').forEach(function(form) {
            form.addEventListener('submit', function() {
                const submitButton = this.querySelector('button[type="submit"]');
                if (submitButton) {
                    submitButton.disabled = true;
                    submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Processing...';
                }
            });
        });

        // Password strength indicator
        const passwordInput = document.getElementById('password');
        if (passwordInput) {
            passwordInput.addEventListener('input', function() {
                const password = this.value;
                let strength = 0;
                
                // Length check
                if (password.length >= 8) strength += 1;
                
                // Contains number
                if (/\d/.test(password)) strength += 1;
                
                // Contains letter
                if (/[a-zA-Z]/.test(password)) strength += 1;
                
                // Contains special character
                if (/[^A-Za-z0-9]/.test(password)) strength += 1;

                // Update strength indicator (you can add visual feedback here)
                console.log('Password strength:', strength);
            });
        }
    </script>

    <!-- Optional: Add any additional scripts here -->
</body>
</html>
