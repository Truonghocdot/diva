<!DOCTYPE html>
<html class="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @php
    $brandName = $siteSettings['site_name'] ?? 'Diva Materials';
    $brandTagline = $siteSettings['site_tagline'] ?? 'B2B Supply Hub';
    $defaultTitle = ($siteSettings['site_title'] ?? null) ?: ($brandName . ' | Nguyen Lieu Va Phu Lieu Mua Si');
    $defaultDescription = 'Nha cung cap nguyen lieu, huong lieu, sap, bao bi va phu lieu cho doanh nghiep san xuat, workshop va thuong mai.';
    $seoTitle = trim($__env->yieldContent('title', $defaultTitle));
    $seoDescription = trim($__env->yieldContent('meta_description', $defaultDescription));
    $seoKeywords = trim($__env->yieldContent('meta_keywords', 'nguyen lieu, phu lieu, sap, huong lieu, bao bi, mua si, b2b, diva materials'));
    $seoCanonical = trim($__env->yieldContent('canonical_url', request()->fullUrl()));
    $seoRobots = trim($__env->yieldContent('meta_robots', 'index,follow,max-image-preview:large'));
    $ogType = trim($__env->yieldContent('og_type', 'website'));
    $ogImage = trim($__env->yieldContent('og_image', asset('og-image.jpg')));
    $twitterCard = trim($__env->yieldContent('twitter_card', 'summary_large_image'));
    $gaId = config('services.google.analytics_id');
    $adsId = config('services.google.ads_id');
    $adsConversionLabel = config('services.google.ads_conversion_label');
    @endphp
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>{{ $seoTitle }}</title>
    <meta name="description" content="{{ $seoDescription }}" />
    <meta name="keywords" content="{{ $seoKeywords }}" />
    <meta name="robots" content="{{ $seoRobots }}" />
    <link rel="canonical" href="{{ $seoCanonical }}" />
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}" />
    <meta property="og:type" content="{{ $ogType }}" />
    <meta property="og:title" content="{{ $seoTitle }}" />
    <meta property="og:description" content="{{ $seoDescription }}" />
    <meta property="og:url" content="{{ $seoCanonical }}" />
    <meta property="og:site_name" content="{{ $brandName }}" />
    <meta property="og:image" content="{{ $ogImage }}" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta name="twitter:card" content="{{ $twitterCard }}" />
    <meta name="twitter:title" content="{{ $seoTitle }}" />
    <meta name="twitter:description" content="{{ $seoDescription }}" />
    <meta name="twitter:image" content="{{ $ogImage }}" />
    <meta name="theme-color" content="#2563eb" />

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}" />
    <link rel="manifest" href="{{ asset('site.webmanifest') }}" />

    @if($gaId || $adsId)
    @php
    $primaryTagId = $gaId ?: $adsId;
    @endphp
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $primaryTagId }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        @if($gaId)
        gtag('config', '{{ $gaId }}');
        @endif
        @if($adsId)
        gtag('config', '{{ $adsId }}');
        @endif
        @if($adsId && $adsConversionLabel)
        window.trackAdsConversion = function(callbackUrl) {
            const callback = function() {
                if (typeof callbackUrl !== 'undefined') {
                    window.location = callbackUrl;
                }
            };

            gtag('event', 'conversion', {
                'send_to': '{{ $adsId }}/{{ $adsConversionLabel }}',
                'event_callback': callback
            });

            return false;
        };
        @endif
    </script>
    @endif

    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,container-queries,line-clamp"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,300;0,400;0,700;1,300&amp;family=Manrope:wght@300;400;500;700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />

    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "surface-tint": "#2563eb",
                        "inverse-on-surface": "#94a3b8",
                        "on-error-container": "#7f1d1d",
                        "tertiary-fixed": "#eff6ff",
                        "surface-container-lowest": "#ffffff",
                        "background": "#f5f9ff",
                        "error-container": "#fee2e2",
                        "primary-fixed-dim": "#bfdbfe",
                        "on-primary-fixed": "#172554",
                        "outline-variant": "#cbd5e1",
                        "tertiary-container": "#eff6ff",
                        "on-primary-container": "#1d4ed8",
                        "surface-container-low": "#f8fbff",
                        "inverse-surface": "#0f172a",
                        "on-background": "#0f172a",
                        "secondary-fixed": "#dbeafe",
                        "tertiary": "#1e40af",
                        "on-surface-variant": "#475569",
                        "on-tertiary-fixed": "#1e3a8a",
                        "surface-dim": "#e2e8f0",
                        "surface-container-highest": "#eaf2ff",
                        "outline": "#94a3b8",
                        "inverse-primary": "#bfdbfe",
                        "surface-variant": "#eff6ff",
                        "on-secondary-container": "#1e3a8a",
                        "secondary-container": "#dbeafe",
                        "on-error": "#ffffff",
                        "on-secondary-fixed": "#1e3a8a",
                        "on-tertiary-container": "#1e40af",
                        "on-tertiary-fixed-variant": "#1d4ed8",
                        "secondary": "#3b82f6",
                        "surface": "#ffffff",
                        "error": "#dc2626",
                        "on-primary-fixed-variant": "#1d4ed8",
                        "surface-container": "#eff6ff",
                        "on-tertiary": "#eff6ff",
                        "tertiary-dim": "#1d4ed8",
                        "on-surface": "#0f172a",
                        "primary-fixed": "#dbeafe",
                        "error-dim": "#b91c1c",
                        "surface-bright": "#ffffff",
                        "surface-container-high": "#f1f7ff",
                        "on-primary": "#ffffff",
                        "secondary-fixed-dim": "#bfdbfe",
                        "primary-dim": "#1d4ed8",
                        "primary": "#2563eb",
                        "on-secondary-fixed-variant": "#1d4ed8",
                        "tertiary-fixed-dim": "#dbeafe",
                        "secondary-dim": "#2563eb",
                        "on-secondary": "#ffffff",
                        "primary-container": "#dbeafe"
                    },
                    fontFamily: {
                        "headline": ["Noto Serif"],
                        "body": ["Manrope"],
                        "label": ["Manrope"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
        }

        .glass-nav {
            background-color: rgba(255, 255, 255, 0.84);
            backdrop-filter: blur(22px);
        }
    </style>
    @php
    $organizationSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => $brandName,
    'url' => url('/'),
    'logo' => asset('favicon.ico'),
    ];
    @endphp
    <script type="application/ld+json">
        {!! json_encode($organizationSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
    </script>
    @yield('structured_data')
    @livewireStyles
    @yield('extra_css')
</head>

<body class="bg-background font-body text-on-surface selection:bg-primary-container selection:text-on-primary-container">
    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    @livewireScripts
    @yield('extra_js')
</body>

</html>
