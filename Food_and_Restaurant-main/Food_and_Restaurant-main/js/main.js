// Active navbar on scroll
let nav = document.querySelector(".navigation-wrap");
window.onscroll = function () {
    if (document.documentElement.scrollTop > 20) {
        nav.classList.add("scroll-on");
    } else {
        nav.classList.remove("scroll-on");
    }
}

// Nav hide on mobile when clicking nav links
let navBar = document.querySelectorAll(".nav-link");
let navCollapse = document.querySelector(".navbar-collapse.collapse");
navBar.forEach(function (a) {
    a.addEventListener("click", function () {
        if (window.innerWidth < 992) {
            navCollapse.classList.remove("show");
        }
    })
})

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Counter design with improved performance
document.addEventListener("DOMContentLoaded", () => {
    function counter(id, start, end, duration) {
        let obj = document.getElementById(id),
            current = start,
            range = end - start,
            increment = end > start ? 1 : -1,
            step = Math.abs(Math.floor(duration / range)),
            timer = setInterval(() => {
                current += increment;
                obj.textContent = current.toLocaleString();
                if (current == end) {
                    clearInterval(timer);
                }
            }, step);
    }

    // Intersection Observer for counter animation
    const counterSection = document.querySelector('.counter-section');
    if (counterSection) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Start counters when section is visible
                    counter("count1", 0, 1287, 3000);
                    counter("count2", 100, 5786, 2500);
                    counter("count3", 0, 1400, 3000);
                    counter("count4", 0, 7110, 3000);
                    observer.unobserve(counterSection);
                }
            });
        }, { threshold: 0.5 });

        observer.observe(counterSection);
    }
});

// Form submission handling
document.addEventListener('DOMContentLoaded', function() {
    const newsletterForm = document.querySelector('.newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const submitBtn = this.querySelector('.main-btn');
            const originalText = submitBtn.innerHTML;
            
            // Show loading state
            submitBtn.innerHTML = '<span class="loading"></span> Subscribing...';
            submitBtn.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                alert('Thank you for subscribing to our newsletter!');
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
                newsletterForm.reset();
            }, 2000);
        });
    }
});

// Add loading animation to buttons
document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.main-btn, .white-btn');
    buttons.forEach(button => {
        button.addEventListener('click', function(e) {
            if (this.getAttribute('href') === '#' || !this.getAttribute('href')) {
                e.preventDefault();
                
                // Add click effect
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            }
        });
    });
});

// Navbar background change on scroll
window.addEventListener('scroll', function() {
    const scrolled = window.pageYOffset;
    const parallax = document.querySelector('.top-banner');
    if (parallax) {
        parallax.style.transform = `translateY(${scrolled * 0.5}px)`;
    }
});

// Image lazy loading
document.addEventListener('DOMContentLoaded', function() {
    const images = document.querySelectorAll('img');
    const config = {
        rootMargin: '50px 0px',
        threshold: 0.01
    };

    let observer = new IntersectionObserver((entries, self) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                preloadImage(entry.target);
                self.unobserve(entry.target);
            }
        });
    }, config);

    images.forEach(image => {
        observer.observe(image);
    });
});

function preloadImage(img) {
    const src = img.getAttribute('data-src');
    if (!src) return;
    img.src = src;
}

// Add to cart functionality
document.addEventListener('DOMContentLoaded', function() {
    const orderButtons = document.querySelectorAll('.explore-food .main-btn');
    orderButtons.forEach(button => {
        button.addEventListener('click', function() {
            const card = this.closest('.card');
            const itemName = card.querySelector('h4').textContent;
            const price = card.querySelector('span').textContent.split(' ')[0];
            
            // Add to cart animation
            this.innerHTML = '<i class="fas fa-check"></i> Added to Cart';
            this.style.backgroundColor = '#28a745';
            this.style.borderColor = '#28a745';
            
            setTimeout(() => {
                this.innerHTML = 'Order Now';
                this.style.backgroundColor = '';
                this.style.borderColor = '';
            }, 2000);
            
            // You can integrate with your cart system here
            console.log(`Added to cart: ${itemName} - ${price}`);
        });
    });
});

// Error handling for missing elements
window.addEventListener('error', function(e) {
    console.log('Error:', e.error);
});

// Performance monitoring
window.addEventListener('load', function() {
    const loadTime = performance.timing.loadEventEnd - performance.timing.navigationStart;
    console.log(`Page load time: ${loadTime}ms`);
});