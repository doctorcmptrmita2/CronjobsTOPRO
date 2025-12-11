<!-- Cookie Consent Banner - GDPR & CCPA Compliant -->
<div id="cookie-consent" 
     class="fixed bottom-0 left-0 right-0 z-50 transform translate-y-full transition-transform duration-500 ease-out"
     style="display: none;">
    
    <!-- Backdrop blur -->
    <div class="absolute inset-0 bg-midnight-950/80 backdrop-blur-xl"></div>
    
    <!-- Close Button -->
    <button onclick="closeCookieBanner()" 
            class="absolute top-3 right-3 sm:top-4 sm:right-4 z-10 p-2 text-midnight-500 hover:text-midnight-200 hover:bg-midnight-800/50 rounded-lg transition-all duration-200"
            title="Close (Essential cookies only)">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <!-- Main Content Row -->
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            
            <!-- Content -->
            <div class="flex items-start gap-3 flex-1 pr-8 sm:pr-0">
                <!-- Cookie Icon -->
                <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-gradient-to-br from-amber-500/20 to-orange-500/20 border border-amber-500/30 flex-shrink-0">
                    <svg class="w-5 h-5 text-amber-400" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10c0-.34-.02-.67-.05-1-.35.26-.77.41-1.21.41-1.1 0-2-.9-2-2 0-.44.15-.86.41-1.21-.33-.03-.66-.05-1-.05-.55 0-1-.45-1-1s.45-1 1-1c.34 0 .67.02 1 .05-.26-.35-.41-.77-.41-1.21 0-1.1.9-2 2-2 .44 0 .86.15 1.21.41.03-.33.05-.66.05-1C22 6.48 17.52 2 12 2zM6.5 9C7.33 9 8 8.33 8 7.5S7.33 6 6.5 6 5 6.67 5 7.5 5.67 9 6.5 9zm0 6c.83 0 1.5-.67 1.5-1.5S7.33 12 6.5 12 5 12.67 5 13.5 5.67 15 6.5 15zm4-3c.83 0 1.5-.67 1.5-1.5S11.33 9 10.5 9 9 9.67 9 10.5s.67 1.5 1.5 1.5zm5 3c.83 0 1.5-.67 1.5-1.5s-.67-1.5-1.5-1.5-1.5.67-1.5 1.5.67 1.5 1.5 1.5z"/>
                    </svg>
                </div>
                
                <div class="min-w-0">
                    <p class="text-midnight-100 text-sm">
                        We use cookies to enhance your experience. 
                        <a href="{{ route('privacy') }}" class="text-accent-400 hover:text-accent-300 underline underline-offset-2">Learn more</a>
                    </p>
                </div>
            </div>
            
            <!-- Buttons -->
            <div class="flex items-center gap-2 flex-shrink-0">
                <!-- Customize Button -->
                <button onclick="toggleCookieSettings()" 
                        class="px-3 py-2 text-sm font-medium text-midnight-400 hover:text-midnight-100 transition-colors">
                    Customize
                </button>
                
                <!-- Accept All Button -->
                <button onclick="acceptAllCookies()" 
                        class="px-5 py-2 text-sm font-medium text-white bg-accent-500 hover:bg-accent-400 rounded-lg transition-all duration-200 whitespace-nowrap shadow-lg shadow-accent-500/25">
                    Accept All
                </button>
            </div>
        </div>
        
        <!-- Cookie Settings Panel (Hidden by default) -->
        <div id="cookie-settings" style="display: none;" class="mt-6 pt-6 border-t border-midnight-800">
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
                
                <!-- Essential Cookies -->
                <div class="p-4 rounded-xl bg-midnight-900/50 border border-midnight-800">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm font-medium text-midnight-100">Essential</span>
                        <span class="px-2 py-0.5 text-xs font-medium text-emerald-400 bg-emerald-500/10 rounded-full">Always On</span>
                    </div>
                    <p class="text-xs text-midnight-500">Required for basic site functionality, security, and session management.</p>
                </div>
                
                <!-- Analytics Cookies -->
                <div class="p-4 rounded-xl bg-midnight-900/50 border border-midnight-800">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm font-medium text-midnight-100">Analytics</span>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="cookie-analytics" class="sr-only peer" checked>
                            <div class="w-9 h-5 bg-midnight-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-midnight-400 after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-accent-500 peer-checked:after:bg-white"></div>
                        </label>
                    </div>
                    <p class="text-xs text-midnight-500">Help us understand how visitors interact with our website.</p>
                </div>
                
                <!-- Functional Cookies -->
                <div class="p-4 rounded-xl bg-midnight-900/50 border border-midnight-800">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm font-medium text-midnight-100">Functional</span>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="cookie-functional" class="sr-only peer" checked>
                            <div class="w-9 h-5 bg-midnight-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-midnight-400 after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-accent-500 peer-checked:after:bg-white"></div>
                        </label>
                    </div>
                    <p class="text-xs text-midnight-500">Enable personalized features and remember your preferences.</p>
                </div>
                
                <!-- Marketing Cookies -->
                <div class="p-4 rounded-xl bg-midnight-900/50 border border-midnight-800">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm font-medium text-midnight-100">Marketing</span>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="cookie-marketing" class="sr-only peer">
                            <div class="w-9 h-5 bg-midnight-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-midnight-400 after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-accent-500 peer-checked:after:bg-white"></div>
                        </label>
                    </div>
                    <p class="text-xs text-midnight-500">Used to deliver relevant ads and track campaign performance.</p>
                </div>
                
            </div>
            
            <div class="flex items-center justify-end gap-3 mt-4">
                <button onclick="rejectOptionalCookies()" 
                        class="px-4 py-2 text-sm font-medium text-midnight-400 hover:text-midnight-200 transition-colors">
                    Reject Optional
                </button>
                <button onclick="savePreferences()" 
                        class="px-6 py-2.5 text-sm font-medium text-midnight-950 bg-gradient-to-r from-accent-400 to-accent-500 hover:from-accent-300 hover:to-accent-400 rounded-lg transition-all duration-200">
                    Save Preferences
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    // Cookie Consent Functions
    const COOKIE_CONSENT_KEY = 'cronjobs_cookie_consent';
    const COOKIE_PREFERENCES_KEY = 'cronjobs_cookie_preferences';
    
    // Check if consent already given
    document.addEventListener('DOMContentLoaded', function() {
        const consent = localStorage.getItem(COOKIE_CONSENT_KEY);
        if (!consent) {
            showCookieConsent();
        }
    });
    
    function showCookieConsent() {
        const banner = document.getElementById('cookie-consent');
        banner.style.display = 'block';
        // Trigger animation
        setTimeout(() => {
            banner.classList.remove('translate-y-full');
            banner.classList.add('translate-y-0');
        }, 100);
    }
    
    function hideCookieConsent() {
        const banner = document.getElementById('cookie-consent');
        banner.classList.remove('translate-y-0');
        banner.classList.add('translate-y-full');
        setTimeout(() => {
            banner.style.display = 'none';
        }, 500);
    }
    
    function toggleCookieSettings() {
        const settings = document.getElementById('cookie-settings');
        if (settings.style.display === 'none') {
            settings.style.display = 'block';
        } else {
            settings.style.display = 'none';
        }
    }
    
    function acceptAllCookies() {
        const preferences = {
            essential: true,
            analytics: true,
            functional: true,
            marketing: true,
            timestamp: new Date().toISOString()
        };
        saveConsent(preferences);
    }
    
    function rejectOptionalCookies() {
        document.getElementById('cookie-analytics').checked = false;
        document.getElementById('cookie-functional').checked = false;
        document.getElementById('cookie-marketing').checked = false;
    }
    
    function closeCookieBanner() {
        // Close with essential cookies only
        const preferences = {
            essential: true,
            analytics: false,
            functional: false,
            marketing: false,
            timestamp: new Date().toISOString(),
            closedWithoutChoice: true
        };
        saveConsent(preferences);
    }
    
    function savePreferences() {
        const preferences = {
            essential: true, // Always true
            analytics: document.getElementById('cookie-analytics').checked,
            functional: document.getElementById('cookie-functional').checked,
            marketing: document.getElementById('cookie-marketing').checked,
            timestamp: new Date().toISOString()
        };
        saveConsent(preferences);
    }
    
    function saveConsent(preferences) {
        localStorage.setItem(COOKIE_CONSENT_KEY, 'true');
        localStorage.setItem(COOKIE_PREFERENCES_KEY, JSON.stringify(preferences));
        
        // Dispatch event for other scripts to listen
        window.dispatchEvent(new CustomEvent('cookieConsentUpdated', { detail: preferences }));
        
        // Show success feedback
        showConsentToast();
        hideCookieConsent();
    }
    
    function showConsentToast() {
        const toast = document.createElement('div');
        toast.className = 'fixed bottom-4 right-4 z-50 px-4 py-3 bg-emerald-500/90 backdrop-blur-sm text-white text-sm font-medium rounded-lg shadow-lg transform translate-y-0 opacity-100 transition-all duration-300';
        toast.innerHTML = '✓ Cookie preferences saved';
        document.body.appendChild(toast);
        
        setTimeout(() => {
            toast.classList.add('opacity-0', 'translate-y-2');
            setTimeout(() => toast.remove(), 300);
        }, 2000);
    }
    
    // Helper function to check cookie preferences
    window.getCookiePreferences = function() {
        const prefs = localStorage.getItem(COOKIE_PREFERENCES_KEY);
        return prefs ? JSON.parse(prefs) : null;
    };
    
    // Helper function to check if a specific cookie type is allowed
    window.isCookieAllowed = function(type) {
        const prefs = getCookiePreferences();
        return prefs ? prefs[type] === true : false;
    };
</script>

