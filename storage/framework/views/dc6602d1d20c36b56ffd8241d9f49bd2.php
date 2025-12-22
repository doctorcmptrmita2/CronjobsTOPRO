<?php if (isset($component)) { $__componentOriginal58c831a7c3cbf004f2e66a23aed50e5b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal58c831a7c3cbf004f2e66a23aed50e5b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.public-layout','data' => ['title' => 'Terms of Service - Usage Agreement','description' => 'Cronjobs.to Terms of Service. Understand your rights, responsibilities, and our service guarantees. Fair terms, plain language. Last updated December 2025.','keywords' => 'terms of service, user agreement, service terms, acceptable use, cronjobs.to terms, legal agreement, SLA']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('public-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Terms of Service - Usage Agreement','description' => 'Cronjobs.to Terms of Service. Understand your rights, responsibilities, and our service guarantees. Fair terms, plain language. Last updated December 2025.','keywords' => 'terms of service, user agreement, service terms, acceptable use, cronjobs.to terms, legal agreement, SLA']); ?>
    <div class="min-h-screen py-24">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Header -->
            <div class="text-center mb-16">
                <h1 class="text-4xl sm:text-5xl font-bold text-midnight-50 mb-4">Terms of Service</h1>
                <p class="text-midnight-400">Last updated: <?php echo e(now()->format('F d, Y')); ?></p>
            </div>

            <!-- Summary Box -->
            <div class="card p-6 mb-12 border-l-4 border-l-accent-500">
                <p class="text-midnight-300">
                    <strong class="text-accent-400">TL;DR:</strong> Use our service for good, pay if you're on Pro, don't attack anyone, and we're all happy.
                </p>
            </div>

            <!-- Content -->
            <div class="space-y-12">
                
                <section>
                    <h2 class="text-xl font-bold text-midnight-50 mb-4">1. The Service</h2>
                    <p class="text-midnight-300 mb-3">Cronjobs.to is a cloud-based cron job scheduling service:</p>
                    <ul class="space-y-2 text-midnight-300">
                        <li>• Schedule HTTP requests to your URLs</li>
                        <li>• Monitor execution and provide logs</li>
                        <li>• Send alerts when jobs fail</li>
                    </ul>
                </section>

                <section>
                    <h2 class="text-xl font-bold text-midnight-50 mb-4">2. Your Account</h2>
                    <ul class="space-y-2 text-midnight-300">
                        <li>• Be at least 16 years old</li>
                        <li>• Provide accurate information</li>
                        <li>• Keep your password secure</li>
                        <li>• You're responsible for all account activity</li>
                    </ul>
                </section>

                <section>
                    <h2 class="text-xl font-bold text-midnight-50 mb-4">3. Acceptable Use</h2>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="card p-4 border-l-4 border-l-emerald-500">
                            <p class="text-emerald-400 font-medium mb-2">✓ You can</p>
                            <ul class="text-sm text-midnight-400 space-y-1">
                                <li>• Schedule to URLs you own</li>
                                <li>• Personal or business use</li>
                                <li>• API access within limits</li>
                            </ul>
                        </div>
                        <div class="card p-4 border-l-4 border-l-red-500">
                            <p class="text-red-400 font-medium mb-2">✗ You cannot</p>
                            <ul class="text-sm text-midnight-400 space-y-1">
                                <li>• DDoS or spam</li>
                                <li>• Scrape without permission</li>
                                <li>• Distribute malware</li>
                            </ul>
                        </div>
                    </div>
                </section>

                <section>
                    <h2 class="text-xl font-bold text-midnight-50 mb-4">4. Payment</h2>
                    <div class="flex gap-4">
                        <div class="card p-4 flex-1 text-center">
                            <p class="text-midnight-100 font-medium">Free</p>
                            <p class="text-2xl font-bold text-midnight-50">$0</p>
                        </div>
                        <div class="card p-4 flex-1 text-center border-accent-500/50">
                            <p class="text-accent-400 font-medium">Pro</p>
                            <p class="text-2xl font-bold text-midnight-50">$5<span class="text-sm text-midnight-500">/mo</span></p>
                        </div>
                    </div>
                    <p class="text-midnight-500 text-sm mt-3">Fees are non-refundable. Price changes with 30 days notice.</p>
                </section>

                <section>
                    <h2 class="text-xl font-bold text-midnight-50 mb-4">5. Service Availability</h2>
                    <ul class="space-y-2 text-midnight-300">
                        <li>• <strong class="text-midnight-100">Free:</strong> Best effort, no SLA</li>
                        <li>• <strong class="text-midnight-100">Pro:</strong> 99.9% uptime SLA</li>
                    </ul>
                </section>

                <section>
                    <h2 class="text-xl font-bold text-midnight-50 mb-4">6. Intellectual Property</h2>
                    <p class="text-midnight-300">We own the service. You own your data and configurations.</p>
                </section>

                <section>
                    <h2 class="text-xl font-bold text-midnight-50 mb-4">7. Liability</h2>
                    <p class="text-midnight-300">Service provided "as is". Maximum liability: $100 or 12 months of fees paid.</p>
                </section>

                <section>
                    <h2 class="text-xl font-bold text-midnight-50 mb-4">8. Termination</h2>
                    <ul class="space-y-2 text-midnight-300">
                        <li>• You can cancel anytime</li>
                        <li>• We can suspend for violations</li>
                        <li>• Data deleted per retention policy</li>
                    </ul>
                </section>

                <section>
                    <h2 class="text-xl font-bold text-midnight-50 mb-4">9. Changes</h2>
                    <p class="text-midnight-300">Material changes notified 30 days in advance. Continued use = acceptance.</p>
                </section>

                <section>
                    <h2 class="text-xl font-bold text-midnight-50 mb-4">10. Legal</h2>
                    <p class="text-midnight-300">Governed by Delaware law, USA. Disputes via binding arbitration.</p>
                </section>

                <section>
                    <h2 class="text-xl font-bold text-midnight-50 mb-4">11. Contact</h2>
                    <p class="text-midnight-300">
                        Questions? Email <a href="mailto:legal@cronjobs.to" class="text-accent-400 hover:underline">legal@cronjobs.to</a> or use our <a href="<?php echo e(route('contact')); ?>" class="text-accent-400 hover:underline">contact form</a>.
                    </p>
                </section>

            </div>
        </div>
    </div>
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
<?php /**PATH C:\wamp64\www\CronjobsTOPRO\resources\views/pages/terms.blade.php ENDPATH**/ ?>