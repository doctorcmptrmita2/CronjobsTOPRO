<?php if (isset($component)) { $__componentOriginal58c831a7c3cbf004f2e66a23aed50e5b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal58c831a7c3cbf004f2e66a23aed50e5b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.public-layout','data' => ['title' => 'FAQ - Frequently Asked Questions','description' => 'Find answers to common questions about Cronjobs.to. Learn about scheduling, monitoring, alerts, pricing, security, and more.','keywords' => 'cronjobs faq, cron job questions, scheduler help, job monitoring faq, uptime monitoring questions']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('public-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'FAQ - Frequently Asked Questions','description' => 'Find answers to common questions about Cronjobs.to. Learn about scheduling, monitoring, alerts, pricing, security, and more.','keywords' => 'cronjobs faq, cron job questions, scheduler help, job monitoring faq, uptime monitoring questions']); ?>
    <!-- Hero Section -->
    <section class="pt-24 pb-12 bg-midnight-950">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-accent-500/10 border border-accent-500/30 rounded-full text-sm text-accent-200 mb-4">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    FAQ
                </div>
                <h1 class="text-4xl sm:text-5xl font-bold text-midnight-50 mb-4">
                    Frequently Asked <span class="text-gradient">Questions</span>
                </h1>
                <p class="text-lg text-midnight-300 max-w-2xl mx-auto">
                    Get instant answers to common questions about scheduling, monitoring, and managing your cron jobs
                </p>
            </div>

            <!-- Search Bar (Functional) -->
            <div class="mb-8">
                <div class="relative max-w-2xl mx-auto">
                    <label for="faq-search" class="sr-only">Search questions</label>
                    <input type="text" id="faq-search" 
                           class="w-full bg-midnight-900 border border-midnight-700 rounded-xl px-5 py-4 pl-12 text-midnight-100 placeholder-midnight-500 focus:border-accent-500 focus:ring-2 focus:ring-accent-500/20 transition" 
                           placeholder="Search questions... (e.g., pricing, alerts, cron expression)"
                           aria-label="Search frequently asked questions">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-midnight-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <div id="search-count" class="absolute inset-y-0 right-3 flex items-center text-xs text-midnight-500 hidden"></div>
                </div>
            </div>

            <!-- Category Quick Links -->
            <div class="flex flex-wrap justify-center gap-2 mb-8">
                <button onclick="scrollToCategory('getting-started')" class="category-pill px-4 py-2 bg-midnight-900 border border-midnight-700 rounded-full text-sm text-midnight-300 hover:text-accent-400 hover:border-accent-500/50 transition">
                    <svg class="w-4 h-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    Getting Started
                </button>
                <button onclick="scrollToCategory('scheduling')" class="category-pill px-4 py-2 bg-midnight-900 border border-midnight-700 rounded-full text-sm text-midnight-300 hover:text-accent-400 hover:border-accent-500/50 transition">
                    <svg class="w-4 h-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Scheduling
                </button>
                <button onclick="scrollToCategory('monitoring')" class="category-pill px-4 py-2 bg-midnight-900 border border-midnight-700 rounded-full text-sm text-midnight-300 hover:text-accent-400 hover:border-accent-500/50 transition">
                    <svg class="w-4 h-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    Alerts
                </button>
                <button onclick="scrollToCategory('security')" class="category-pill px-4 py-2 bg-midnight-900 border border-midnight-700 rounded-full text-sm text-midnight-300 hover:text-accent-400 hover:border-accent-500/50 transition">
                    <svg class="w-4 h-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    Security
                </button>
                <button onclick="scrollToCategory('billing')" class="category-pill px-4 py-2 bg-midnight-900 border border-midnight-700 rounded-full text-sm text-midnight-300 hover:text-accent-400 hover:border-accent-500/50 transition">
                    <svg class="w-4 h-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                    </svg>
                    Billing
                </button>
            </div>
        </div>
    </section>

    <!-- FAQ Content -->
    <section class="py-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div id="faq-container" class="space-y-8">
                <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryIndex => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <section id="category-<?php echo e(Str::slug($category['category'])); ?>" class="faq-category scroll-mt-24" data-category="<?php echo e(strtolower($category['category'])); ?>">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 rounded-xl flex items-center justify-center
                                <?php if($category['category'] === 'Getting Started'): ?> bg-accent-500/10
                                <?php elseif($category['category'] === 'Scheduling'): ?> bg-orange-500/10
                                <?php elseif($category['category'] === 'Monitoring & Alerts'): ?> bg-purple-500/10
                                <?php elseif($category['category'] === 'Security & Reliability'): ?> bg-emerald-500/10
                                <?php else: ?> bg-blue-500/10
                                <?php endif; ?>">
                                <?php if($category['category'] === 'Getting Started'): ?>
                                    <svg class="w-5 h-5 text-accent-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                <?php elseif($category['category'] === 'Scheduling'): ?>
                                    <svg class="w-5 h-5 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                <?php elseif($category['category'] === 'Monitoring & Alerts'): ?>
                                    <svg class="w-5 h-5 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                    </svg>
                                <?php elseif($category['category'] === 'Security & Reliability'): ?>
                                    <svg class="w-5 h-5 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                <?php else: ?>
                                    <svg class="w-5 h-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                    </svg>
                                <?php endif; ?>
                            </div>
                            <h2 class="text-2xl font-bold text-midnight-50"><?php echo e($category['category']); ?></h2>
                        </div>

                        <div class="space-y-3">
                            <?php $__currentLoopData = $category['questions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $qa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="faq-item group" data-question="<?php echo e(strtolower($qa['q'])); ?>" data-answer="<?php echo e(strtolower($qa['a'])); ?>">
                                    <button type="button" 
                                            class="faq-toggle w-full p-5 text-left flex items-center justify-between gap-4 bg-midnight-900 border border-midnight-800 rounded-xl hover:border-accent-500/50 hover:bg-midnight-900/80 transition-all duration-200"
                                            onclick="toggleFaq(this)"
                                            aria-expanded="false"
                                            aria-controls="faq-answer-<?php echo e($categoryIndex); ?>-<?php echo e($index); ?>">
                                        <span class="font-semibold text-midnight-50 text-base pr-4"><?php echo e($qa['q']); ?></span>
                                        <svg class="faq-icon w-5 h-5 text-midnight-500 group-hover:text-accent-400 flex-shrink-0 transition-all duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </button>
                                    <div id="faq-answer-<?php echo e($categoryIndex); ?>-<?php echo e($index); ?>" class="faq-answer overflow-hidden transition-all duration-300" style="max-height: 0;">
                                        <div class="px-5 pt-4 pb-5 bg-midnight-900 border-x border-b border-midnight-800 rounded-b-xl">
                                            <p class="text-midnight-300 leading-relaxed"><?php echo e($qa['a']); ?></p>
                                            
                                            <!-- Helpful Feedback -->
                                            <div class="mt-4 pt-4 border-t border-midnight-800/50 flex items-center justify-between">
                                                <span class="text-xs text-midnight-500">Was this helpful?</span>
                                                <div class="flex gap-2">
                                                    <button class="helpful-btn px-3 py-1.5 text-xs bg-midnight-800 hover:bg-emerald-500/20 border border-midnight-700 hover:border-emerald-500/50 rounded-lg text-midnight-400 hover:text-emerald-400 transition-all">
                                                        <svg class="w-4 h-4 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                                        </svg>
                                                        Yes
                                                    </button>
                                                    <button class="helpful-btn px-3 py-1.5 text-xs bg-midnight-800 hover:bg-red-500/20 border border-midnight-700 hover:border-red-500/50 rounded-lg text-midnight-400 hover:text-red-400 transition-all">
                                                        <svg class="w-4 h-4 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14H5.236a2 2 0 01-1.789-2.894l3.5-7A2 2 0 018.736 3h4.018a2 2 0 01.485.06l3.76.94m-7 10v5a2 2 0 002 2h.096c.5 0 .905-.405.905-.904 0-.715.211-1.413.608-2.008L17 13V4m-7 10h2m5-10h2a2 2 0 012 2v6a2 2 0 01-2 2h-2.5" />
                                                        </svg>
                                                        No
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </section>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <!-- No Results Message -->
                <div id="no-results" class="hidden text-center py-12">
                    <div class="w-16 h-16 bg-midnight-900 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-midnight-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-midnight-50 mb-2">No results found</h3>
                    <p class="text-midnight-400 mb-6">Try different keywords or browse all questions below</p>
                    <button onclick="clearSearch()" class="text-accent-400 hover:text-accent-300 text-sm font-medium">
                        Clear search
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-midnight-900/30">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="card p-10 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-accent-500/5 via-transparent to-accent-500/5"></div>
                
                <div class="relative">
                    <div class="w-16 h-16 bg-accent-500/10 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-accent-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-midnight-50 mb-3">Still Have Questions?</h2>
                    <p class="text-midnight-400 mb-8 max-w-md mx-auto">
                        Can't find what you're looking for? Our support team typically responds within 24 hours.
                    </p>
                    <div class="flex flex-col sm:flex-row justify-center gap-4">
                        <a href="<?php echo e(route('contact')); ?>" class="btn-primary inline-flex items-center justify-center gap-2 px-6 py-3">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Contact Support
                        </a>
                        <a href="<?php echo e(route('docs')); ?>" class="btn-secondary inline-flex items-center justify-center gap-2 px-6 py-3">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            View Documentation
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
            <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryIndex => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $category['questions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qaIndex => $qa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            {
                "@type": "Question",
                "name": "<?php echo e(addslashes($qa['q'])); ?>",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "<?php echo e(addslashes($qa['a'])); ?>"
                }
            }<?php if(!($loop->last && $loop->parent->last)): ?>,<?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ]
    }
    </script>

    <!-- Enhanced JavaScript -->
    <script>
        // Toggle FAQ accordion
        function toggleFaq(button) {
            const item = button.closest('.faq-item');
            const answer = item.querySelector('.faq-answer');
            const icon = item.querySelector('.faq-icon');
            const isExpanded = button.getAttribute('aria-expanded') === 'true';
            
            if (isExpanded) {
                // Close
                button.setAttribute('aria-expanded', 'false');
                answer.style.maxHeight = '0';
                icon.style.transform = 'rotate(0deg)';
            } else {
                // Open
                button.setAttribute('aria-expanded', 'true');
                answer.style.maxHeight = answer.scrollHeight + 'px';
                icon.style.transform = 'rotate(180deg)';
            }
        }

        // Scroll to category
        function scrollToCategory(categorySlug) {
            const element = document.getElementById('category-' + categorySlug);
            if (element) {
                element.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }

        // Clear search
        function clearSearch() {
            document.getElementById('faq-search').value = '';
            performSearch('');
        }

        // Search functionality
        function performSearch(query) {
            const items = document.querySelectorAll('.faq-item');
            const categories = document.querySelectorAll('.faq-category');
            const noResults = document.getElementById('no-results');
            let visibleCount = 0;
            
            items.forEach(item => {
                const question = item.dataset.question || '';
                const answer = item.dataset.answer || '';
                const matches = query === '' || question.includes(query) || answer.includes(query);
                
                if (matches) {
                    item.style.display = 'block';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });

            // Hide empty categories
            categories.forEach(category => {
                const visibleItems = Array.from(category.querySelectorAll('.faq-item'))
                    .filter(item => item.style.display !== 'none');
                category.style.display = visibleItems.length > 0 ? 'block' : 'none';
            });

            // Show/hide no results message
            if (visibleCount === 0 && query !== '') {
                noResults.classList.remove('hidden');
            } else {
                noResults.classList.add('hidden');
            }

            // Update search count
            const searchCount = document.getElementById('search-count');
            if (query !== '' && visibleCount > 0) {
                searchCount.textContent = `${visibleCount} result${visibleCount !== 1 ? 's' : ''}`;
                searchCount.classList.remove('hidden');
            } else {
                searchCount.classList.add('hidden');
            }
        }

        // Search input handler with debounce
        let searchTimeout;
        document.getElementById('faq-search').addEventListener('input', function(e) {
            clearTimeout(searchTimeout);
            const query = e.target.value.toLowerCase().trim();
            searchTimeout = setTimeout(() => performSearch(query), 150);
        });

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            // / key to focus search
            if (e.key === '/' && document.activeElement !== document.getElementById('faq-search')) {
                e.preventDefault();
                document.getElementById('faq-search').focus();
            }
            
            // Escape to clear search
            if (e.key === 'Escape' && document.activeElement === document.getElementById('faq-search')) {
                clearSearch();
            }
        });

        // Auto-expand if URL hash matches
        window.addEventListener('DOMContentLoaded', function() {
            if (window.location.hash) {
                const targetId = window.location.hash.substring(1);
                const target = document.getElementById(targetId);
                if (target) {
                    setTimeout(() => {
                        target.scrollIntoView({ behavior: 'smooth' });
                    }, 100);
                }
            }
        });

        // Helpful feedback (local storage tracking)
        document.addEventListener('click', function(e) {
            if (e.target.closest('.helpful-btn')) {
                const btn = e.target.closest('.helpful-btn');
                const isHelpful = btn.textContent.trim().includes('Yes');
                
                // Visual feedback
                btn.classList.add(isHelpful ? 'bg-emerald-500/30' : 'bg-red-500/30');
                btn.disabled = true;
                
                // Show thank you message
                setTimeout(() => {
                    const feedback = btn.closest('.faq-answer').querySelector('.helpful-btn').parentElement;
                    feedback.innerHTML = '<span class="text-xs text-emerald-400">✓ Thank you for your feedback!</span>';
                }, 300);
            }
        });
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal58c831a7c3cbf004f2e66a23aed50e5b)): ?>
<?php $attributes = $__attributesOriginal58c831a7c3cbf004f2e66a23aed50e5b; ?>
<?php unset($__attributesOriginal58c831a7c3cbf004f2e66a23aed50e5b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal58c831a7c3cbf004f2e66a23aed50e5b)): ?>
<?php $component = $__componentOriginal58c831a7c3cbf004f2e66a23aed50e5b; ?>
<?php unset($__componentOriginal58c831a7c3cbf004f2e66a23aed50e5b); ?>
<?php endif; ?>
<?php /**PATH C:\wamp64\www\CronjobsTOPRO\resources\views/pages/faq.blade.php ENDPATH**/ ?>