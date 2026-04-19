<!DOCTYPE html>
<html class="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @php
    $brandName = $siteSettings['site_name'] ?? 'Diva Materials';
    $brandTagline = $siteSettings['site_tagline'] ?? 'Nền tảng nguyên liệu B2B';
    $defaultTitle = ($siteSettings['site_title'] ?? null) ?: ($brandName . ' | Nguyên liệu và phụ liệu mua sỉ');
    $defaultDescription = 'Nhà cung cấp nguyên liệu, hương liệu, sáp, bao bì và phụ liệu cho doanh nghiệp sản xuất, workshop và thương mại.';
    $seoTitle = trim($__env->yieldContent('title', $defaultTitle));
    $seoDescription = trim($__env->yieldContent('meta_description', $defaultDescription));
    $seoKeywords = trim($__env->yieldContent('meta_keywords', 'nguyên liệu, phụ liệu, sáp, hương liệu, bao bì, mua sỉ, b2b, diva materials'));
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
    <meta name="theme-color" content="#213868" />

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
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;500;600;700&amp;family=Cormorant+Garamond:wght@400;500;600;700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />

    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "surface-tint": "#1a7efb",
                        "inverse-on-surface": "#d7e4f6",
                        "on-error-container": "#7f1d1d",
                        "tertiary-fixed": "#eef6ff",
                        "surface-container-lowest": "#ffffff",
                        "background": "#f8fbff",
                        "error-container": "#fee2e2",
                        "primary-fixed-dim": "#d8e6f7",
                        "on-primary-fixed": "#213868",
                        "outline-variant": "#d6e2f1",
                        "tertiary-container": "#eef6ff",
                        "on-primary-container": "#213868",
                        "surface-container-low": "#fcfdff",
                        "inverse-surface": "#13213f",
                        "on-background": "#1a2d53",
                        "secondary-fixed": "#dfeefe",
                        "tertiary": "#6f8fb6",
                        "on-surface-variant": "#5a6f92",
                        "on-tertiary-fixed": "#213868",
                        "surface-dim": "#dae5f2",
                        "surface-container-highest": "#dfeafa",
                        "outline": "#9cb0c8",
                        "inverse-primary": "#bfd7f8",
                        "surface-variant": "#eef5fc",
                        "on-secondary-container": "#213868",
                        "secondary-container": "#e7f1ff",
                        "on-error": "#ffffff",
                        "on-secondary-fixed": "#213868",
                        "on-tertiary-container": "#213868",
                        "on-tertiary-fixed-variant": "#355b91",
                        "secondary": "#1a7efb",
                        "surface": "#ffffff",
                        "error": "#dc2626",
                        "on-primary-fixed-variant": "#355b91",
                        "surface-container": "#f0f7fe",
                        "on-tertiary": "#f8fbff",
                        "tertiary-dim": "#4a74a8",
                        "on-surface": "#1a2d53",
                        "primary-fixed": "#edf4fb",
                        "error-dim": "#b91c1c",
                        "surface-bright": "#ffffff",
                        "surface-container-high": "#e7f0fb",
                        "on-primary": "#ffffff",
                        "secondary-fixed-dim": "#cae2ff",
                        "primary-dim": "#2f4c81",
                        "primary": "#213868",
                        "on-secondary-fixed-variant": "#355b91",
                        "tertiary-fixed-dim": "#d9e6f8",
                        "secondary-dim": "#0f72e9",
                        "on-secondary": "#ffffff",
                        "primary-container": "#edf4fb"
                    },
                    fontFamily: {
                        "headline": ["Cormorant Garamond"],
                        "body": ["Be Vietnam Pro"],
                        "label": ["Be Vietnam Pro"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.375rem",
                        "lg": "0.75rem",
                        "xl": "1rem",
                        "full": "9999px"
                    },
                    boxShadow: {
                        "panel": "0 24px 60px rgba(26, 45, 83, 0.10)",
                        "soft": "0 18px 40px rgba(26, 45, 83, 0.08)"
                    }
                },
            },
        }
    </script>
    <style>
        :root {
            color-scheme: light;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
        }

        .glass-nav {
            background-color: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(18px);
        }

        body {
            background:
                radial-gradient(circle at top right, rgba(26, 126, 251, 0.10), transparent 28%),
                radial-gradient(circle at left center, rgba(33, 56, 104, 0.08), transparent 22%),
                #f8fbff;
        }

        .grid-pattern {
            background-image:
                linear-gradient(rgba(156, 176, 200, 0.12) 1px, transparent 1px),
                linear-gradient(90deg, rgba(156, 176, 200, 0.12) 1px, transparent 1px);
            background-size: 42px 42px;
        }

        .panel-soft {
            border: 1px solid rgba(214, 226, 241, 0.95);
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 20px 50px rgba(26, 45, 83, 0.08);
        }

        .panel-tint {
            border: 1px solid rgba(214, 226, 241, 0.95);
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.96) 0%, rgba(240, 247, 254, 0.96) 100%);
            box-shadow: 0 18px 40px rgba(26, 45, 83, 0.08);
        }

        .section-shell {
            position: relative;
        }

        .section-shell::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: 2rem;
            border: 1px solid rgba(214, 226, 241, 0.8);
            pointer-events: none;
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
