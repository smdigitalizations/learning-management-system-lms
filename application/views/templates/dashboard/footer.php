</div> <!-- Close main content area -->
    </div> <!-- Close flex container -->

    <!-- Footer -->
    <footer class="bg-white shadow-lg mt-auto">
        <div class="max-w-full mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="text-sm text-gray-600">
                    &copy; <?php echo date('Y'); ?> LMS System. All rights reserved.
                </div>
                <div class="text-sm text-gray-600">
                    Version 1.0.0
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript for Mobile Menu Toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileSidebar = document.getElementById('mobile-sidebar');
            const closeSidebarButton = document.getElementById('close-sidebar');

            mobileMenuButton.addEventListener('click', function() {
                mobileSidebar.classList.remove('hidden');
            });

            closeSidebarButton.addEventListener('click', function() {
                mobileSidebar.classList.add('hidden');
            });

            // Close sidebar when clicking outside
            document.addEventListener('click', function(event) {
                if (!mobileSidebar.contains(event.target) && 
                    !mobileMenuButton.contains(event.target) && 
                    !mobileSidebar.classList.contains('hidden')) {
                    mobileSidebar.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>
