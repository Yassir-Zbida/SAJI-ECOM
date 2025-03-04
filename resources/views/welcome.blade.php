<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAJI - Luxury Furniture & Dashboard Decor</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marcellus&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        darkblue: {
                            DEFAULT: '#0F2C59',
                            light: '#1A3A6C',
                            dark: '#091d3b'
                        },
                        pink: {
                            DEFAULT: '#FF6B98',
                            light: '#FFA5C0',
                            dark: '#E84A7A'
                        },
                        neutral: {
                            50: '#F8F9FA',
                            100: '#F1F3F5',
                            200: '#E9ECEF',
                            800: '#343A40',
                            900: '#212529'
                        }
                    },
                    fontFamily: {
                        'display': ['Marcellus', 'serif'],
                        'sans': ['Inter', 'sans-serif']
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.5s ease-in-out',
                        'slide-down': 'slideDown 0.3s ease-in-out',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(20px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        slideDown: {
                            '0%': { transform: 'translateY(-10px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        }
                    }
                }
            }
        }
    </script>
    <style type="text/tailwindcss">
        @layer utilities {
            .text-balance {
                text-wrap: balance;
            }
            .section-title {
                @apply font-display text-3xl md:text-4xl lg:text-5xl mb-4 relative;
            }
            .section-title::after {
                content: "";
                @apply absolute -bottom-2 left-0 w-16 h-1 bg-pink;
            }
            .btn-primary {
                @apply bg-darkblue text-white px-6 py-3 rounded-md font-medium hover:bg-darkblue-light transition-all duration-300 inline-flex items-center justify-center;
            }
            .btn-secondary {
                @apply bg-pink text-white px-6 py-3 rounded-md font-medium hover:bg-pink-light transition-all duration-300 inline-flex items-center justify-center;
            }
            .btn-outline {
                @apply border-2 border-darkblue text-darkblue px-6 py-3 rounded-md font-medium hover:bg-darkblue hover:text-white transition-all duration-300 inline-flex items-center justify-center;
            }
            .btn-white {
                @apply bg-white text-darkblue px-6 py-3 rounded-md font-medium hover:bg-neutral-100 transition-all duration-300 inline-flex items-center justify-center;
            }
            .quick-action-btn {
                @apply w-12 h-12 rounded-full bg-white/90 backdrop-blur-sm flex items-center justify-center text-darkblue hover:bg-darkblue hover:text-white transition-all duration-300 relative shadow-md;
            }
            .quick-action-btn::before {
                content: attr(data-tooltip);
                @apply absolute right-full mr-2 px-3 py-1.5 rounded-md bg-darkblue text-white text-xs whitespace-nowrap opacity-0 invisible transition-all duration-200 font-medium;
            }
            .quick-action-btn:hover::before {
                @apply opacity-100 visible;
            }
            .add-to-cart-btn {
                @apply w-full bg-darkblue text-white py-3 rounded-lg flex items-center justify-center font-medium hover:bg-pink transition-colors duration-300;
            }
            .mega-menu {
                @apply invisible opacity-0 absolute top-full left-0 w-full bg-white shadow-xl transition-all duration-300 transform -translate-y-2 pointer-events-none z-50;
            }
            .mega-menu.active {
                @apply visible opacity-100 translate-y-0 pointer-events-auto;
            }
            .mega-menu-item:hover .mega-menu {
                @apply visible opacity-100 translate-y-0 pointer-events-auto;
            }
            .modal-backdrop {
                @apply fixed inset-0 bg-black bg-opacity-50 z-50 opacity-0 pointer-events-none transition-opacity duration-300;
            }
            .modal-backdrop.active {
                @apply opacity-100 pointer-events-auto;
            }
            .modal-container {
                @apply fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-xl shadow-2xl z-50 w-11/12 max-w-4xl opacity-0 pointer-events-none transition-all duration-300 scale-95;
            }
            .modal-container.active {
                @apply opacity-100 pointer-events-auto scale-100;
            }
        }
    </style>
</head>
<body class="font-sans text-neutral-800 overflow-x-hidden">
    <!-- Announcement Bar -->
    <div class="bg-darkblue text-white text-center py-2 text-sm">
        Free shipping on orders over $150 | Use code SAJI20 for 20% off your first order
    </div>

    <!-- Navigation -->
    <nav id="navbar" class="px-16 bg-white/80 backdrop-blur-md shadow-md">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <!-- Logo -->
                <a href="#" class="flex-shrink-0 flex items-center">
                    <span class="text-3xl font-display font-bold text-darkblue transition-colors duration-300" id="logo">SAJI HOME</span>
                </a>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <div class="relative group">
                        <a href="#" class="text-darkblue hover:text-pink flex items-center">
                            Shop
                            <i class="ri-arrow-down-s-line ml-1 group-hover:rotate-180 transition-transform"></i>
                        </a>
                        <!-- Dropdown Menu -->
                        <div class="absolute top-full left-0 w-64 bg-white shadow-lg rounded-lg p-4 opacity-0 invisible group-hover:visible group-hover:opacity-100 transition-all duration-300 mt-2">
                            <h4 class="text-darkblue font-semibold mb-3">Categories</h4>
                            <ul class="space-y-2">
                                <li><a href="#" class="text-neutral-700 hover:text-pink flex items-center">Living Room</a></li>
                                <li><a href="#" class="text-neutral-700 hover:text-pink flex items-center">Bedroom</a></li>
                                <li><a href="#" class="text-neutral-700 hover:text-pink flex items-center">Dining</a></li>
                                <li><a href="#" class="text-neutral-700 hover:text-pink flex items-center">Decor</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="relative group">
                        <a href="#" class="text-darkblue hover:text-pink flex items-center">
                            Collections
                            <i class="ri-arrow-down-s-line ml-1 group-hover:rotate-180 transition-transform"></i>
                        </a>
                        <!-- Dropdown Menu -->
                        <div class="absolute top-full left-0 w-64 bg-white shadow-lg rounded-lg p-4 opacity-0 invisible group-hover:visible group-hover:opacity-100 transition-all duration-300 mt-2">
                            <h4 class="text-darkblue font-semibold mb-3">Featured Collections</h4>
                            <ul class="space-y-2">
                                <li><a href="#" class="text-neutral-700 hover:text-pink flex items-center">Modern</a></li>
                                <li><a href="#" class="text-neutral-700 hover:text-pink flex items-center">Scandinavian</a></li>
                                <li><a href="#" class="text-neutral-700 hover:text-pink flex items-center">Minimalist</a></li>
                            </ul>
                        </div>
                    </div>

                    <a href="#" class="text-darkblue hover:text-pink">About</a>
                    <a href="#" class="text-darkblue hover:text-pink">Contact</a>
                </div>

                <!-- Desktop Icons -->
                <div class="hidden md:flex items-center space-x-4">
                    <button class="text-darkblue hover:text-pink transition-colors">
                        <i class="ri-search-line text-2xl"></i>
                    </button>
                    <button class="text-darkblue hover:text-pink transition-colors">
                        <i class="ri-user-line text-2xl"></i>
                    </button>
                    <button class="text-darkblue hover:text-pink transition-colors relative">
                        <i class="ri-shopping-bag-line text-xl"></i>
                        <span class="absolute -top-2 -right-2 bg-pink text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">2</span>
                    </button>
                </div>

                <!-- Mobile Menu Toggle -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-toggle" class="text-darkblue hover:text-pink transition-colors">
                        <i class="ri-menu-line text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="fixed inset-0 z-[100] bg-darkblue/90 hidden md:hidden">
        <div class="absolute top-0 right-0 w-3/4 h-full bg-white shadow-2xl animate-menu-slide">
            <div class="p-6">
                <!-- Close Button -->
                <button id="mobile-menu-close" class="absolute top-4 right-4 text-neutral-500 hover:text-darkblue">
                    <i class="ri-close-line text-2xl"></i>
                </button>

                <!-- Mobile Menu Content -->
                <div class="mt-12">
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between items-center" x-data="{ open: false }">
                                <a href="#" class="text-darkblue text-lg font-medium">Shop</a>
                                <button class="text-neutral-500" @click="open = !open">
                                    <i class="ri-arrow-down-s-line" :class="{'rotate-180': open}"></i>
                                </button>
                            </div>
                            <div class="mt-2 pl-4 space-y-2 hidden" id="shop-submenu">
                                <a href="#" class="block text-neutral-700 hover:text-pink">Living Room</a>
                                <a href="#" class="block text-neutral-700 hover:text-pink">Bedroom</a>
                                <a href="#" class="block text-neutral-700 hover:text-pink">Dining</a>
                                <a href="#" class="block text-neutral-700 hover:text-pink">Decor</a>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between items-center">
                                <a href="#" class="text-darkblue text-lg font-medium">Collections</a>
                                <button class="text-neutral-500" id="collections-toggle">
                                    <i class="ri-arrow-down-s-line"></i>
                                </button>
                            </div>
                            <div class="mt-2 pl-4 space-y-2 hidden" id="collections-submenu">
                                <a href="#" class="block text-neutral-700 hover:text-pink">Modern</a>
                                <a href="#" class="block text-neutral-700 hover:text-pink">Scandinavian</a>
                                <a href="#" class="block text-neutral-700 hover:text-pink">Minimalist</a>
                            </div>
                        </div>

                        <a href="#" class="block text-darkblue text-lg font-medium">About</a>
                        <a href="#" class="block text-darkblue text-lg font-medium">Contact</a>
                    </div>

                    <!-- Mobile Menu Icons -->
                    <div class="mt-8 flex justify-between">
                        <button class="text-darkblue hover:text-pink">
                            <i class="ri-search-line text-xl"></i>
                        </button>
                        <button class="text-darkblue hover:text-pink">
                            <i class="ri-user-line text-xl"></i>
                        </button>
                        <button class="text-darkblue hover:text-pink relative">
                            <i class="ri-shopping-bag-line text-xl"></i>
                            <span class="absolute -top-2 -right-2 bg-pink text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">2</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Mobile Menu Toggle
        const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
        const mobileMenuClose = document.getElementById('mobile-menu-close');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuToggle.addEventListener('click', () => {
            mobileMenu.classList.remove('hidden');
            document.body.classList.add('mobile-menu-open');
        });

        mobileMenuClose.addEventListener('click', () => {
            mobileMenu.classList.add('hidden');
            document.body.classList.remove('mobile-menu-open');
        });

        // Submenu Toggles
        const shopToggle = document.querySelector('[id="shop-submenu"]');
        const shopToggleBtn = document.querySelector('[id="shop-submenu"]').previousElementSibling.querySelector('button');
        
        const collectionsToggle = document.getElementById('collections-submenu');
        const collectionsToggleBtn = document.getElementById('collections-toggle');

        shopToggleBtn.addEventListener('click', () => {
            shopToggle.classList.toggle('hidden');
            shopToggleBtn.querySelector('i').classList.toggle('rotate-180');
        });

        collectionsToggleBtn.addEventListener('click', () => {
            collectionsToggle.classList.toggle('hidden');
            collectionsToggleBtn.querySelector('i').classList.toggle('rotate-180');
        });
    </script>

    <!-- Hero Section -->
    <section class="relative h-screen w-full bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80')">
        <div class="absolute inset-0 bg-darkblue/60"></div>
        <div class="absolute inset-0 flex flex-col justify-center items-start p-6 md:p-16 lg:p-24 container mx-auto">
            <div class="max-w-2xl animate-fade-in">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-display font-bold text-white mb-6 leading-tight">
                    Elevate Your <span class="text-pink">Living Space</span>
                </h1>
                <p class="text-lg md:text-xl text-white/90 mb-8 max-w-lg font-light">
                    Discover our curated collection of luxury furniture and decor pieces designed to transform your home into a sanctuary of style and comfort.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <button class="btn-secondary">
                        Shop Collection <i class="ri-arrow-right-line ml-2"></i>
                    </button>
                    <button class="border-2 border-white text-white px-6 py-3 rounded-md font-medium hover:bg-white hover:text-darkblue transition-colors duration-300 inline-flex items-center justify-center">
                        View Lookbook <i class="ri-eye-line ml-2"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="absolute bottom-8 left-0 right-0 flex justify-center">
            <div class="flex space-x-2">
                <button class="w-3 h-3 rounded-full bg-pink"></button>
                <button class="w-3 h-3 rounded-full bg-white/50"></button>
                <button class="w-3 h-3 rounded-full bg-white/50"></button>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-neutral-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="flex flex-col items-center text-center p-6 animate-slide-up" style="animation-delay: 0.1s;">
                    <div class="w-16 h-16 bg-pink/10 rounded-full flex items-center justify-center mb-4">
                        <i class="ri-truck-line text-pink text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-darkblue mb-2">Free Shipping</h3>
                    <p class="text-neutral-600">On all orders over $150</p>
                </div>
                <div class="flex flex-col items-center text-center p-6 animate-slide-up" style="animation-delay: 0.2s;">
                    <div class="w-16 h-16 bg-pink/10 rounded-full flex items-center justify-center mb-4">
                        <i class="ri-refresh-line text-pink text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-darkblue mb-2">Easy Returns</h3>
                    <p class="text-neutral-600">30-day return policy</p>
                </div>
                <div class="flex flex-col items-center text-center p-6 animate-slide-up" style="animation-delay: 0.3s;">
                    <div class="w-16 h-16 bg-pink/10 rounded-full flex items-center justify-center mb-4">
                        <i class="ri-shield-check-line text-pink text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-darkblue mb-2">Secure Payment</h3>
                    <p class="text-neutral-600">100% secure checkout</p>
                </div>
                <div class="flex flex-col items-center text-center p-6 animate-slide-up" style="animation-delay: 0.4s;">
                    <div class="w-16 h-16 bg-pink/10 rounded-full flex items-center justify-center mb-4">
                        <i class="ri-customer-service-2-line text-pink text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-darkblue mb-2">Customer Support</h3>
                    <p class="text-neutral-600">24/7 dedicated service</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-20 px-6 md:px-16 container mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-center mb-12">
            <h2 class="section-title text-darkblue">Browse Categories</h2>
            <a href="#" class="flex items-center text-darkblue hover:text-pink transition-colors group">
                <span class="font-medium">View All Categories</span>
                <i class="ri-arrow-right-line ml-2 group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="group relative overflow-hidden rounded-xl h-80 shadow-lg">
                <img src="https://images.unsplash.com/photo-1616137422495-1e9e46e2aa77?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Living Room" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-darkblue/80 via-darkblue/40 to-transparent flex flex-col justify-end p-6 transition-all duration-300">
                    <h3 class="text-2xl font-display text-white group-hover:text-pink-light transition-colors">Living Room</h3>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-sm text-white/90">42 items</span>
                        <div class="w-8 h-8 rounded-full bg-pink flex items-center justify-center transform translate-x-0 group-hover:translate-x-2 transition-transform">
                            <i class="ri-arrow-right-line text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="group relative overflow-hidden rounded-xl h-80 shadow-lg">
                <img src="https://images.unsplash.com/photo-1616594039964-ae9021a400a0?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Bedroom" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-darkblue/80 via-darkblue/40 to-transparent flex flex-col justify-end p-6 transition-all duration-300">
                    <h3 class="text-2xl font-display text-white group-hover:text-pink-light transition-colors">Bedroom</h3>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-sm text-white/90">38 items</span>
                        <div class="w-8 h-8 rounded-full bg-pink flex items-center justify-center transform translate-x-0 group-hover:translate-x-2 transition-transform">
                            <i class="ri-arrow-right-line text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="group relative overflow-hidden rounded-xl h-80 shadow-lg">
                <img src="https://images.unsplash.com/photo-1617104678098-de229db51175?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Dining" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-darkblue/80 via-darkblue/40 to-transparent flex flex-col justify-end p-6 transition-all duration-300">
                    <h3 class="text-2xl font-display text-white group-hover:text-pink-light transition-colors">Dining</h3>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-sm text-white/90">27 items</span>
                        <div class="w-8 h-8 rounded-full bg-pink flex items-center justify-center transform translate-x-0 group-hover:translate-x-2 transition-transform">
                            <i class="ri-arrow-right-line text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="group relative overflow-hidden rounded-xl h-80 shadow-lg">
                <img src="https://images.unsplash.com/photo-1616046229478-9901c5536a45?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Decor" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-darkblue/80 via-darkblue/40 to-transparent flex flex-col justify-end p-6 transition-all duration-300">
                    <h3 class="text-2xl font-display text-white group-hover:text-pink-light transition-colors">Decor</h3>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-sm text-white/90">64 items</span>
                        <div class="w-8 h-8 rounded-full bg-pink flex items-center justify-center transform translate-x-0 group-hover:translate-x-2 transition-transform">
                            <i class="ri-arrow-right-line text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Collection -->
    <section class="py-20 px-6 md:px-16 bg-gradient-to-r from-darkblue to-darkblue-light">
        <div class="container mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-center mb-12">
                <h2 class="section-title text-white after:bg-pink">Featured Collection</h2>
                <a href="#" class="flex items-center text-white hover:text-pink-light transition-colors group">
                    <span class="font-medium">View All Products</span>
                    <i class="ri-arrow-right-line ml-2 group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Product Card 1 -->
                <div class="product-card group">
                    <div class="relative aspect-[3/4] overflow-hidden rounded-xl bg-white">
                        <img 
                            src="https://images.unsplash.com/photo-1567538096630-e0c55bd6374c?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                            alt="Modern Accent Chair" 
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                            data-product-id="1"
                            data-product-name="Modern Accent Chair"
                            data-product-price="649.00"
                            data-product-regular-price="799.00"
                            data-product-category="Living Room"
                            data-product-rating="4.8"
                            data-product-description="Elevate your living space with this modern accent chair. Featuring a sleek design with premium upholstery and sturdy construction for lasting comfort and style."
                        >
                        <!-- Quick Actions -->
                        <div class="absolute top-4 right-4 flex flex-col gap-2 opacity-0 translate-x-4 transition-all duration-300 group-hover:opacity-100 group-hover:translate-x-0">
                            <button class="quick-action-btn" data-tooltip="Add to Wishlist">
                                <i class="ri-heart-3-line text-xl"></i>
                            </button>
                            <button class="quick-action-btn quick-view-btn" data-tooltip="Quick View" data-product-id="1">
                                <i class="ri-eye-line text-xl"></i>
                            </button>
                            <button class="quick-action-btn" data-tooltip="Compare">
                                <i class="ri-scales-3-line text-xl"></i>
                            </button>
                        </div>
                        <!-- Status Badge -->
                        <div class="absolute top-4 left-4">
                            <span class="bg-pink text-white text-xs px-3 py-1.5 rounded-full">
                                New Arrival
                            </span>
                        </div>
                        <!-- Add to Cart -->
                        <div class="absolute -bottom-20 left-0 right-0 p-4 bg-white/90 backdrop-blur-sm transition-all duration-300 group-hover:bottom-0">
                            <button class="add-to-cart-btn">
                                <i class="ri-shopping-bag-3-line mr-2 text-lg"></i>
                                Add to Cart
                            </button>
                        </div>
                    </div>
                    <!-- Product Info -->
                    <div class="mt-4 space-y-2">
                        <div class="flex items-center justify-between">
                            <p class="text-xs uppercase tracking-wider text-neutral-400">Living Room</p>
                            <div class="flex gap-1 text-white">
                                <i class="ri-star-fill text-pink text-sm"></i>
                                <span class="text-sm">4.8</span>
                            </div>
                        </div>
                        <h3 class="font-display text-xl text-white">Modern Accent Chair</h3>
                        <div class="flex items-end gap-2">
                            <span class="text-lg font-semibold text-white">$649.00</span>
                            <span class="text-sm text-neutral-400 line-through">$799.00</span>
                        </div>
                    </div>
                </div>

                <!-- Product Card 2 -->
                <div class="product-card group">
                    <div class="relative aspect-[3/4] overflow-hidden rounded-xl bg-white">
                        <img 
                            src="https://images.unsplash.com/photo-1532372576444-dda954194ad0?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                            alt="Wooden Coffee Table" 
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                            data-product-id="2"
                            data-product-name="Wooden Coffee Table"
                            data-product-price="499.00"
                            data-product-regular-price="499.00"
                            data-product-category="Living Room"
                            data-product-rating="4.6"
                            data-product-description="This elegant wooden coffee table combines form and function with its spacious surface and minimalist design. Crafted from sustainable hardwood with a natural finish."
                        >
                        <!-- Quick Actions -->
                        <div class="absolute top-4 right-4 flex flex-col gap-2 opacity-0 translate-x-4 transition-all duration-300 group-hover:opacity-100 group-hover:translate-x-0">
                            <button class="quick-action-btn" data-tooltip="Add to Wishlist">
                                <i class="ri-heart-3-line text-xl"></i>
                            </button>
                            <button class="quick-action-btn quick-view-btn" data-tooltip="Quick View" data-product-id="2">
                                <i class="ri-eye-line text-xl"></i>
                            </button>
                            <button class="quick-action-btn" data-tooltip="Compare">
                                <i class="ri-scales-3-line text-xl"></i>
                            </button>
                        </div>
                        <!-- Add to Cart -->
                        <div class="absolute -bottom-20 left-0 right-0 p-4 bg-white/90 backdrop-blur-sm transition-all duration-300 group-hover:bottom-0">
                            <button class="add-to-cart-btn">
                                <i class="ri-shopping-bag-3-line mr-2 text-lg"></i>
                                Add to Cart
                            </button>
                        </div>
                    </div>
                    <!-- Product Info -->
                    <div class="mt-4 space-y-2">
                        <div class="flex items-center justify-between">
                            <p class="text-xs uppercase tracking-wider text-neutral-400">Living Room</p>
                            <div class="flex gap-1 text-white">
                                <i class="ri-star-fill text-pink text-sm"></i>
                                <span class="text-sm">4.6</span>
                            </div>
                        </div>
                        <h3 class="font-display text-xl text-white">Wooden Coffee Table</h3>
                        <div class="flex items-end gap-2">
                            <span class="text-lg font-semibold text-white">$499.00</span>
                        </div>
                    </div>
                </div>

                <!-- Product Card 3 -->
                <div class="product-card group">
                    <div class="relative aspect-[3/4] overflow-hidden rounded-xl bg-white">
                        <img 
                            src="https://images.unsplash.com/photo-1540932239986-30128078f3c5?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                            alt="Pendant Light" 
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                            data-product-id="3"
                            data-product-name="Modern Pendant Light"
                            data-product-price="329.00"
                            data-product-regular-price="399.00"
                            data-product-category="Lighting"
                            data-product-rating="4.9"
                            data-product-description="Illuminate your space with this contemporary pendant light. The sleek design features adjustable height and provides warm, ambient lighting perfect for dining areas or entryways."
                        >
                        <!-- Quick Actions -->
                        <div class="absolute top-4 right-4 flex flex-col gap-2 opacity-0 translate-x-4 transition-all duration-300 group-hover:opacity-100 group-hover:translate-x-0">
                            <button class="quick-action-btn" data-tooltip="Add to Wishlist">
                                <i class="ri-heart-3-line text-xl"></i>
                            </button>
                            <button class="quick-action-btn quick-view-btn" data-tooltip="Quick View" data-product-id="3">
                                <i class="ri-eye-line text-xl"></i>
                            </button>
                            <button class="quick-action-btn" data-tooltip="Compare">
                                <i class="ri-scales-3-line text-xl"></i>
                            </button>
                        </div>
                        <!-- Status Badge -->
                        <div class="absolute top-4 left-4">
                            <span class="bg-darkblue text-white text-xs px-3 py-1.5 rounded-full">
                                Best Seller
                            </span>
                        </div>
                        <!-- Add to Cart -->
                        <div class="absolute -bottom-20 left-0 right-0 p-4 bg-white/90 backdrop-blur-sm transition-all duration-300 group-hover:bottom-0">
                            <button class="add-to-cart-btn">
                                <i class="ri-shopping-bag-3-line mr-2 text-lg"></i>
                                Add to Cart
                            </button>
                        </div>
                    </div>
                    <!-- Product Info -->
                    <div class="mt-4 space-y-2">
                        <div class="flex items-center justify-between">
                            <p class="text-xs uppercase tracking-wider text-neutral-400">Lighting</p>
                            <div class="flex gap-1 text-white">
                                <i class="ri-star-fill text-pink text-sm"></i>
                                <span class="text-sm">4.9</span>
                            </div>
                        </div>
                        <h3 class="font-display text-xl text-white">Modern Pendant Light</h3>
                        <div class="flex items-end gap-2">
                            <span class="text-lg font-semibold text-white">$329.00</span>
                            <span class="text-sm text-neutral-400 line-through">$399.00</span>
                        </div>
                    </div>
                </div>

                <!-- Product Card 4 -->
                <div class="product-card group">
                    <div class="relative aspect-[3/4] overflow-hidden rounded-xl bg-white">
                        <img 
                            src="https://images.unsplash.com/photo-1526057565006-20beab8dd2ed?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                            alt="Ceramic Vase Set" 
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                            data-product-id="4"
                            data-product-name="Ceramic Vase Set"
                            data-product-price="129.00"
                            data-product-regular-price="129.00"
                            data-product-category="Decor"
                            data-product-rating="4.7"
                            data-product-description="Add an artistic touch to your home with this set of three handcrafted ceramic vases. Each piece features a unique glaze finish and organic shape, perfect for displaying fresh or dried flowers."
                        >
                        <!-- Quick Actions -->
                        <div class="absolute top-4 right-4 flex flex-col gap-2 opacity-0 translate-x-4 transition-all duration-300 group-hover:opacity-100 group-hover:translate-x-0">
                            <button class="quick-action-btn" data-tooltip="Add to Wishlist">
                                <i class="ri-heart-3-line text-xl"></i>
                            </button>
                            <button class="quick-action-btn quick-view-btn" data-tooltip="Quick View" data-product-id="4">
                                <i class="ri-eye-line text-xl"></i>
                            </button>
                            <button class="quick-action-btn" data-tooltip="Compare">
                                <i class="ri-scales-3-line text-xl"></i>
                            </button>
                        </div>
                        <!-- Add to Cart -->
                        <div class="absolute -bottom-20 left-0 right-0 p-4 bg-white/90 backdrop-blur-sm transition-all duration-300 group-hover:bottom-0">
                            <button class="add-to-cart-btn">
                                <i class="ri-shopping-bag-3-line mr-2 text-lg"></i>
                                Add to Cart
                            </button>
                        </div>
                    </div>
                    <!-- Product Info -->
                    <div class="mt-4 space-y-2">
                        <div class="flex items-center justify-between">
                            <p class="text-xs uppercase tracking-wider text-neutral-400">Decor</p>
                            <div class="flex gap-1 text-white">
                                <i class="ri-star-fill text-pink text-sm"></i>
                                <span class="text-sm">4.7</span>
                            </div>
                        </div>
                        <h3 class="font-display text-xl text-white">Ceramic Vase Set</h3>
                        <div class="flex items-end gap-2">
                            <span class="text-lg font-semibold text-white">$129.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-20 px-6 md:px-16 bg-neutral-50">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="relative h-[500px] w-full rounded-2xl overflow-hidden shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1616137422495-1e9e46e2aa77?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="SAJI workshop" class="w-full h-full object-cover">
                    <div class="absolute bottom-0 left-0 w-full h-1/3 bg-gradient-to-t from-darkblue/70 to-transparent"></div>
                    <div class="absolute bottom-6 left-6 bg-pink text-white px-4 py-2 rounded-md font-medium">
                        Since 2015
                    </div>
                </div>
                <div class="animate-slide-up">
                    <h2 class="section-title text-darkblue">The SAJI Story</h2>
                    <p class="text-neutral-700 mb-6 text-lg leading-relaxed">
                        Founded with a passion for beautiful, functional spaces, SAJI brings together timeless design and quality craftsmanship to create furniture and decor that transforms your home.
                    </p>
                    <p class="text-neutral-700 mb-8 text-lg leading-relaxed">
                        Each piece in our collection is thoughtfully designed to blend aesthetics with everyday comfort, using sustainable materials and ethical production practices.
                    </p>
                    <button class="btn-outline">
                        Discover Our Journey <i class="ri-arrow-right-line ml-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-darkblue text-white">
        <div class="container mx-auto py-16 px-6 md:px-16 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <div>
                    <h3 class="text-3xl font-display font-bold text-white">SAJI</h3>
                    <p class="mt-4 text-white/70 leading-relaxed">
                        Elevating homes with thoughtfully designed furniture and decor since 2015.
                    </p>
                    <div class="flex space-x-4 mt-6">
                        <a href="#" class="w-10 h-10 rounded-full bg-darkblue-light flex items-center justify-center text-white hover:bg-pink transition-colors">
                            <i class="ri-instagram-line"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-darkblue-light flex items-center justify-center text-white hover:bg-pink transition-colors">
                            <i class="ri-facebook-fill"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-darkblue-light flex items-center justify-center text-white hover:bg-pink transition-colors">
                            <i class="ri-twitter-fill"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-darkblue-light flex items-center justify-center text-white hover:bg-pink transition-colors">
                            <i class="ri-pinterest-fill"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-6 text-pink">Shop</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-white/70 hover:text-pink transition-colors">Living Room</a></li>
                        <li><a href="#" class="text-white/70 hover:text-pink transition-colors">Bedroom</a></li>
                        <li><a href="#" class="text-white/70 hover:text-pink transition-colors">Dining</a></li>
                        <li><a href="#" class="text-white/70 hover:text-pink transition-colors">Decor</a></li>
                        <li><a href="#" class="text-white/70 hover:text-pink transition-colors">New Arrivals</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-6 text-pink">Company</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-white/70 hover:text-pink transition-colors">About Us</a></li>
                        <li><a href="#" class="text-white/70 hover:text-pink transition-colors">Sustainability</a></li>
                        <li><a href="#" class="text-white/70 hover:text-pink transition-colors">Careers</a></li>
                        <li><a href="#" class="text-white/70 hover:text-pink transition-colors">Press</a></li>
                        <li><a href="#" class="text-white/70 hover:text-pink transition-colors">Blog</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-6 text-pink">Customer Service</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-white/70 hover:text-pink transition-colors">Contact Us</a></li>
                        <li><a href="#" class="text-white/70 hover:text-pink transition-colors">Shipping & Delivery</a></li>
                        <li><a href="#" class="text-white/70 hover:text-pink transition-colors">Returns & Exchanges</a></li>
                        <li><a href="#" class="text-white/70 hover:text-pink transition-colors">FAQ</a></li>
                        <li><a href="#" class="text-white/70 hover:text-pink transition-colors">Warranty</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-darkblue-light mt-12 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-white/70 text-sm">
                    © 2023 SAJI. All rights reserved.
                </p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="text-white/70 hover:text-pink text-sm transition-colors">
                        Privacy Policy
                    </a>
                    <a href="#" class="text-white/70 hover:text-pink text-sm transition-colors">
                        Terms of Service
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Quick View Modal -->
    <div id="quick-view-modal" class="modal-backdrop">
        <div class="modal-container">
            <div class="relative p-6">
                <button id="close-modal" class="absolute top-4 right-4 text-neutral-500 hover:text-darkblue transition-colors">
                    <i class="ri-close-line text-2xl"></i>
                </button>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="relative h-[400px] rounded-lg overflow-hidden">
                        <img id="modal-product-image" src="/placeholder.svg" alt="" class="w-full h-full object-cover">
                    </div>
                    <div class="flex flex-col">
                        <span id="modal-product-category" class="text-sm text-neutral-500 uppercase tracking-wider"></span>
                        <h3 id="modal-product-name" class="text-2xl font-display text-darkblue mt-2"></h3>
                        <div class="flex items-center mt-2">
                            <div class="flex text-pink">
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-half-fill"></i>
                            </div>
                            <span id="modal-product-rating" class="ml-2 text-sm text-neutral-600"></span>
                        </div>
                        <div class="flex items-end gap-3 mt-4">
                            <span id="modal-product-price" class="text-2xl font-semibold text-darkblue"></span>
                            <span id="modal-product-regular-price" class="text-neutral-500 line-through"></span>
                        </div>
                        <p id="modal-product-description" class="mt-6 text-neutral-700 leading-relaxed"></p>
                        <div class="mt-8">
                            <button class="btn-secondary w-full">
                                <i class="ri-shopping-bag-3-line mr-2"></i>
                                Add to Cart
                            </button>
                        </div>
                        <div class="flex justify-between items-center mt-6 pt-6 border-t border-neutral-200">
                            <button class="flex items-center text-darkblue hover:text-pink transition-colors">
                                <i class="ri-heart-3-line mr-2"></i>
                                Add to Wishlist
                            </button>
                            <button class="flex items-center text-darkblue hover:text-pink transition-colors">
                                <i class="ri-scales-3-line mr-2"></i>
                                Compare
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // Wishlist Toggle
        document.querySelectorAll('[data-tooltip="Add to Wishlist"]').forEach(btn => {
            btn.addEventListener('click', (e) => {
                const icon = e.currentTarget.querySelector('i');
                icon.classList.toggle('ri-heart-3-line');
                icon.classList.toggle('ri-heart-3-fill');
                icon.classList.toggle('text-pink');
            });
        });

        // Quick View Modal
        const modal = document.getElementById('quick-view-modal');
        const modalContainer = modal.querySelector('.modal-container');
        const closeModalBtn = document.getElementById('close-modal');
        
        // Open modal
        document.querySelectorAll('.quick-view-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                const productId = e.currentTarget.getAttribute('data-product-id');
                const productCard = document.querySelector(`img[data-product-id="${productId}"]`);
                
                // Get product data from data attributes
                const productName = productCard.getAttribute('data-product-name');
                const productPrice = productCard.getAttribute('data-product-price');
                const productRegularPrice = productCard.getAttribute('data-product-regular-price');
                const productCategory = productCard.getAttribute('data-product-category');
                const productRating = productCard.getAttribute('data-product-rating');
                const productDescription = productCard.getAttribute('data-product-description');
                const productImage = productCard.getAttribute('src');
                
                // Populate modal with product data
                document.getElementById('modal-product-name').textContent = productName;
                document.getElementById('modal-product-price').textContent = `$${productPrice}`;
                document.getElementById('modal-product-category').textContent = productCategory;
                document.getElementById('modal-product-rating').textContent = `${productRating} reviews`;
                document.getElementById('modal-product-description').textContent = productDescription;
                document.getElementById('modal-product-image').src = productImage;
                document.getElementById('modal-product-image').alt = productName;
                
                // Handle regular price display
                const regularPriceElement = document.getElementById('modal-product-regular-price');
                if (productPrice !== productRegularPrice) {
                    regularPriceElement.textContent = `$${productRegularPrice}`;
                    regularPriceElement.classList.remove('hidden');
                } else {
                    regularPriceElement.classList.add('hidden');
                }
                
                // Show modal
                modal.classList.add('active');
                setTimeout(() => {
                    modalContainer.classList.add('active');
                }, 10);
                
                // Prevent body scrolling
                document.body.style.overflow = 'hidden';
            });
        });
        
        // Close modal
        closeModalBtn.addEventListener('click', closeModal);
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeModal();
            }
        });
        
        function closeModal() {
            modalContainer.classList.remove('active');
            setTimeout(() => {
                modal.classList.remove('active');
                // Re-enable body scrolling
                document.body.style.overflow = '';
            }, 300);
        }
        
        // Close modal with Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && modal.classList.contains('active')) {
                closeModal();
            }
        });  && modal.classList.contains('active')) {
                closeModal();
            }
        });
    </script>
</body>
</html>