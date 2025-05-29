// App.js - Main JavaScript file for LMS System

document.addEventListener('DOMContentLoaded', function() {
    // Initialize all components
    initializeComponents();
    
    // Setup AJAX defaults
    setupAjaxDefaults();
    
    // Initialize form handlers
    initializeForms();
    
    // Initialize dashboard features
    if (document.querySelector('.dashboard')) {
        initializeDashboard();
    }
});

// Initialize UI Components
function initializeComponents() {
    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileSidebar = document.getElementById('mobile-sidebar');
    
    if (mobileMenuButton && mobileSidebar) {
        mobileMenuButton.addEventListener('click', () => {
            mobileSidebar.classList.toggle('hidden');
        });

        // Close sidebar when clicking outside
        document.addEventListener('click', (e) => {
            if (!mobileSidebar.contains(e.target) && 
                !mobileMenuButton.contains(e.target) && 
                !mobileSidebar.classList.contains('hidden')) {
                mobileSidebar.classList.add('hidden');
            }
        });
    }

    // Dropdowns
    document.querySelectorAll('.dropdown-toggle').forEach(dropdown => {
        dropdown.addEventListener('click', (e) => {
            e.preventDefault();
            const menu = dropdown.nextElementSibling;
            menu.classList.toggle('hidden');
        });
    });

    // Flash Messages Auto-hide
    document.querySelectorAll('.alert-dismissible').forEach(alert => {
        setTimeout(() => {
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        }, 5000);
    });
}

// Setup AJAX Defaults
function setupAjaxDefaults() {
    // Add CSRF token to all AJAX requests
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;
    if (csrfToken) {
        document.querySelectorAll('form').forEach(form => {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'csrf_token';
            input.value = csrfToken;
            form.appendChild(input);
        });
    }
}

// Initialize Form Handlers
function initializeForms() {
    // Password strength indicator
    const passwordInput = document.getElementById('password');
    const strengthIndicator = document.getElementById('password-strength');
    
    if (passwordInput && strengthIndicator) {
        passwordInput.addEventListener('input', () => {
            const strength = calculatePasswordStrength(passwordInput.value);
            updatePasswordStrengthIndicator(strength, strengthIndicator);
        });
    }

    // Form validation
    document.querySelectorAll('form[data-validate]').forEach(form => {
        form.addEventListener('submit', (e) => {
            if (!validateForm(form)) {
                e.preventDefault();
            }
        });
    });
}

// Initialize Dashboard Features
function initializeDashboard() {
    // Chart initialization (if charts are present)
    const charts = document.querySelectorAll('[data-chart]');
    charts.forEach(initializeChart);

    // Real-time notifications
    initializeNotifications();

    // Data tables
    initializeDataTables();
}

// Password Strength Calculator
function calculatePasswordStrength(password) {
    let strength = 0;
    
    // Length check
    if (password.length >= 8) strength += 1;
    
    // Contains number
    if (/\d/.test(password)) strength += 1;
    
    // Contains letter
    if (/[a-zA-Z]/.test(password)) strength += 1;
    
    // Contains special character
    if (/[^A-Za-z0-9]/.test(password)) strength += 1;

    return strength;
}

// Update Password Strength Indicator
function updatePasswordStrengthIndicator(strength, indicator) {
    const classes = [
        'bg-red-500',    // Weak
        'bg-yellow-500', // Fair
        'bg-blue-500',   // Good
        'bg-green-500'   // Strong
    ];

    const messages = [
        'Weak',
        'Fair',
        'Good',
        'Strong'
    ];

    indicator.className = 'h-2 transition-all duration-300 rounded ' + classes[strength];
    indicator.style.width = ((strength + 1) * 25) + '%';
    indicator.setAttribute('data-strength', messages[strength]);
}

// Form Validation
function validateForm(form) {
    let isValid = true;
    
    // Clear previous errors
    form.querySelectorAll('.error-message').forEach(error => error.remove());
    
    // Required fields
    form.querySelectorAll('[required]').forEach(field => {
        if (!field.value.trim()) {
            showFieldError(field, 'This field is required');
            isValid = false;
        }
    });
    
    // Email validation
    form.querySelectorAll('[type="email"]').forEach(field => {
        if (field.value && !isValidEmail(field.value)) {
            showFieldError(field, 'Please enter a valid email address');
            isValid = false;
        }
    });
    
    // Password confirmation
    const password = form.querySelector('[name="password"]');
    const confirm = form.querySelector('[name="confirm_password"]');
    if (password && confirm && password.value !== confirm.value) {
        showFieldError(confirm, 'Passwords do not match');
        isValid = false;
    }
    
    return isValid;
}

// Show Field Error
function showFieldError(field, message) {
    const error = document.createElement('div');
    error.className = 'error-message text-red-500 text-sm mt-1';
    error.textContent = message;
    field.parentNode.appendChild(error);
    field.classList.add('border-red-500');
}

// Email Validation
function isValidEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

// Initialize Chart
function initializeChart(chartElement) {
    const type = chartElement.dataset.chart;
    const data = JSON.parse(chartElement.dataset.chartData || '{}');
    
    // Add chart initialization logic here
    // Example using Chart.js
    if (typeof Chart !== 'undefined') {
        new Chart(chartElement, {
            type: type,
            data: data,
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    }
}

// Initialize Notifications
function initializeNotifications() {
    const notificationButton = document.getElementById('notification-button');
    const notificationCount = document.getElementById('notification-count');
    
    if (notificationButton && notificationCount) {
        // Fetch notifications periodically
        setInterval(() => {
            fetchNotifications();
        }, 60000); // Every minute
    }
}

// Fetch Notifications
function fetchNotifications() {
    fetch('/api/notifications')
        .then(response => response.json())
        .then(data => {
            updateNotificationBadge(data.unread);
            updateNotificationList(data.notifications);
        })
        .catch(console.error);
}

// Update Notification Badge
function updateNotificationBadge(count) {
    const badge = document.getElementById('notification-count');
    if (badge) {
        badge.textContent = count;
        badge.classList.toggle('hidden', count === 0);
    }
}

// Initialize Data Tables
function initializeDataTables() {
    document.querySelectorAll('[data-table]').forEach(table => {
        const searchInput = table.querySelector('.table-search');
        const rows = table.querySelectorAll('tbody tr');
        
        if (searchInput) {
            searchInput.addEventListener('input', (e) => {
                const searchTerm = e.target.value.toLowerCase();
                
                rows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    row.classList.toggle('hidden', !text.includes(searchTerm));
                });
            });
        }
    });
}

// Export functions for use in other files
window.App = {
    initializeComponents,
    calculatePasswordStrength,
    validateForm,
    showFieldError,
    isValidEmail
};
