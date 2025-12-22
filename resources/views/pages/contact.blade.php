<x-public-layout 
    title="Contact Us" 
    description="Get in touch with Cronjobs.to support team. We're here to help with technical issues, general inquiries, and more. Response within 24 hours."
    keywords="contact cronjobs.to, support, help, technical support, customer service"
>
    <div class="min-h-screen py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Hero -->
            <div class="text-center mb-12">
                <h1 class="text-4xl sm:text-5xl font-bold text-midnight-50 mb-4">
                    Get in Touch
                </h1>
                <p class="text-xl text-midnight-400">
                    Have a question or need help? We're here for you.
                </p>
            </div>

            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Contact Info -->
                <aside class="lg:col-span-1 space-y-6">
                    <div class="card p-6">
                        <div class="w-12 h-12 bg-accent-500/10 rounded-xl flex items-center justify-center mb-4" aria-hidden="true">
                            <svg class="w-6 h-6 text-accent-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h2 class="text-lg font-semibold text-midnight-50 mb-2">Email Us</h2>
                        <p class="text-midnight-400 text-sm mb-3">For general inquiries</p>
                        <a href="mailto:hello@cronjobs.to" class="text-accent-400 hover:underline">hello@cronjobs.to</a>
                    </div>

                    <div class="card p-6">
                        <div class="w-12 h-12 bg-emerald-500/10 rounded-xl flex items-center justify-center mb-4" aria-hidden="true">
                            <svg class="w-6 h-6 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <h2 class="text-lg font-semibold text-midnight-50 mb-2">Support</h2>
                        <p class="text-midnight-400 text-sm mb-3">For technical issues</p>
                        <a href="mailto:support@cronjobs.to" class="text-emerald-400 hover:underline">support@cronjobs.to</a>
                    </div>

                    <div class="card p-6">
                        <div class="w-12 h-12 bg-red-500/10 rounded-xl flex items-center justify-center mb-4" aria-hidden="true">
                            <svg class="w-6 h-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <h2 class="text-lg font-semibold text-midnight-50 mb-2">Report Abuse</h2>
                        <p class="text-midnight-400 text-sm mb-3">Report malicious activity</p>
                        <a href="mailto:abuse@cronjobs.to" class="text-red-400 hover:underline">abuse@cronjobs.to</a>
                    </div>

                    <div class="card p-6 bg-gradient-to-br from-midnight-800 to-midnight-900">
                        <h2 class="text-lg font-semibold text-midnight-50 mb-3">Response Time</h2>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-midnight-400">General:</span>
                                <span class="text-midnight-200">24 hours</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-midnight-400">Support:</span>
                                <span class="text-midnight-200">12 hours</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-midnight-400">Pro Support:</span>
                                <span class="text-accent-400">4 hours</span>
                            </div>
                        </div>
                    </div>
                </aside>

                <!-- Contact Form -->
                <div class="lg:col-span-2">
                    <div class="card p-8">
                        @if(session('success'))
                            <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/30 rounded-lg text-emerald-400 flex items-center gap-3" role="alert">
                                <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                            @csrf
                            
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="label">Your Name <span class="text-red-400" aria-hidden="true">*</span></label>
                                    <input type="text" name="name" id="name" required
                                           class="input @error('name') border-red-500 @enderror"
                                           value="{{ old('name') }}"
                                           placeholder="John Doe"
                                           aria-describedby="name-error">
                                    @error('name')
                                        <p id="name-error" class="mt-1 text-sm text-red-400" role="alert">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="email" class="label">Email Address <span class="text-red-400" aria-hidden="true">*</span></label>
                                    <input type="email" name="email" id="email" required
                                           class="input @error('email') border-red-500 @enderror"
                                           value="{{ old('email') }}"
                                           placeholder="john@example.com"
                                           aria-describedby="email-error">
                                    @error('email')
                                        <p id="email-error" class="mt-1 text-sm text-red-400" role="alert">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="type" class="label">Inquiry Type <span class="text-red-400" aria-hidden="true">*</span></label>
                                <select name="type" id="type" required class="select">
                                    <option value="general" {{ old('type', request('type')) === 'general' ? 'selected' : '' }}>General Inquiry</option>
                                    <option value="support" {{ old('type', request('type')) === 'support' ? 'selected' : '' }}>Technical Support</option>
                                    <option value="abuse" {{ old('type', request('type')) === 'abuse' ? 'selected' : '' }}>Report Abuse</option>
                                    <option value="other" {{ old('type', request('type')) === 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>

                            <div>
                                <label for="subject" class="label">Subject <span class="text-red-400" aria-hidden="true">*</span></label>
                                <input type="text" name="subject" id="subject" required
                                       class="input @error('subject') border-red-500 @enderror"
                                       value="{{ old('subject') }}"
                                       placeholder="How can we help?"
                                       aria-describedby="subject-error">
                                @error('subject')
                                    <p id="subject-error" class="mt-1 text-sm text-red-400" role="alert">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="message" class="label">Message <span class="text-red-400" aria-hidden="true">*</span></label>
                                <textarea name="message" id="message" rows="6" required
                                          class="input resize-none @error('message') border-red-500 @enderror"
                                          placeholder="Please describe your question or issue in detail..."
                                          aria-describedby="message-error">{{ old('message') }}</textarea>
                                @error('message')
                                    <p id="message-error" class="mt-1 text-sm text-red-400" role="alert">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="btn-primary w-full justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Page Schema -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "ContactPage",
        "name": "Contact Cronjobs.to",
        "description": "Get in touch with Cronjobs.to support team for technical issues, general inquiries, and more.",
        "url": "{{ route('contact') }}",
        "mainEntity": {
            "@@type": "Organization",
            "name": "Cronjobs.to",
            "email": "support@@cronjobs.to",
            "contactPoint": [
                {
                    "@@type": "ContactPoint",
                    "contactType": "customer support",
                    "email": "support@@cronjobs.to",
                    "availableLanguage": ["English", "Turkish", "German"]
                },
                {
                    "@@type": "ContactPoint",
                    "contactType": "sales",
                    "email": "hello@@cronjobs.to"
                }
            ]
        }
    }
    </script>

    <!-- BreadcrumbList Schema -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "BreadcrumbList",
        "itemListElement": [
            {
                "@@type": "ListItem",
                "position": 1,
                "name": "Home",
                "item": "{{ url('/') }}"
            },
            {
                "@@type": "ListItem",
                "position": 2,
                "name": "Contact",
                "item": "{{ route('contact') }}"
            }
        ]
    }
    </script>
</x-public-layout>
