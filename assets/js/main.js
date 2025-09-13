// Main JavaScript functionality
document.addEventListener('DOMContentLoaded', function() {
    // Theme toggle functionality
    const themeToggle = document.getElementById('themeToggle');
    const themeIcon = document.getElementById('themeIcon');
    const html = document.documentElement;
    
    // Load saved theme
    const savedTheme = localStorage.getItem('theme') || 'light';
    html.setAttribute('data-bs-theme', savedTheme);
    updateThemeIcon(savedTheme);
    
    // Theme toggle event (delegated since it's loaded dynamically)
    document.addEventListener('click', function(e) {
        if (e.target.closest('#themeToggle')) {
            const currentTheme = html.getAttribute('data-bs-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            
            html.setAttribute('data-bs-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateThemeIcon(newTheme);
            
            console.log('Theme toggled to:', newTheme);
        }
    });
    
    function updateThemeIcon(theme) {
        // Wait for navbar to load before updating icon
        setTimeout(() => {
            const icon = document.getElementById('themeIcon');
            if (icon) {
                icon.className = theme === 'dark' ? 'bi bi-sun' : 'bi bi-moon';
            }
        }, 100);
    }
    
    // Smooth scrolling for anchor links
    document.addEventListener('click', function(e) {
        const link = e.target.closest('a[href^="#"]');
        if (link) {
            e.preventDefault();
            const targetId = link.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            
            if (targetElement) {
                const offsetTop = targetElement.offsetTop - 80; // Account for fixed navbar
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
                
                // Update active nav link
                updateActiveNavLink(link);
            }
        }
    });
    
    // Update active navigation link
    function updateActiveNavLink(clickedLink) {
        setTimeout(() => {
            const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
            navLinks.forEach(link => link.classList.remove('active'));
            clickedLink.classList.add('active');
        }, 100);
    }
    
    // Navbar collapse on mobile after link click
    document.addEventListener('click', function(e) {
        const navLink = e.target.closest('.navbar-nav .nav-link');
        if (navLink && window.innerWidth < 992) {
            const navbarCollapse = document.querySelector('.navbar-collapse');
            if (navbarCollapse && navbarCollapse.classList.contains('show')) {
                const bsCollapse = new bootstrap.Collapse(navbarCollapse);
                bsCollapse.hide();
            }
        }
    });
    
    // Newsletter subscription
    document.addEventListener('click', function(e) {
        if (e.target.closest('[data-testid="button-newsletter"]')) {
            const email = document.querySelector('[data-testid="input-newsletter"]').value;
            if (email) {
                console.log('Newsletter subscription:', email);
                alert('Thank you for subscribing!');
                document.querySelector('[data-testid="input-newsletter"]').value = '';
            } else {
                alert('Please enter a valid email address.');
            }
        }
    });
    
    // Button click handlers
    document.addEventListener('click', function(e) {
        if (e.target.closest('[data-testid="button-get-started"]')) {
            console.log('Get Started button clicked');
            alert('Welcome! Let\'s get started building your website.');
        }
    });
});

// Global functions for hero section buttons
function handleOurServices() {
    console.log('Our Services button clicked');
    window.location.href = '/pages/services.html';
}

function handleViewWork() {
    console.log('View Our Work button clicked');
    window.location.href = '/pages/insights/portfolio.html';
}