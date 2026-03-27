<!DOCTYPE html>
<html class="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @php
        $defaultTitle = 'Diva | Cánh Cửa Bước Vào Thế Giới Hương Thơm';
        $defaultDescription = 'Nến thơm thủ công cao cấp với hồ sơ mùi hương tinh tế, giúp không gian sống thư thái và sang trọng.';
        $seoTitle = trim($__env->yieldContent('title', $defaultTitle));
        $seoDescription = trim($__env->yieldContent('meta_description', $defaultDescription));
        $seoKeywords = trim($__env->yieldContent('meta_keywords', 'nến thơm, nến thơm cao cấp, nến thủ công, candle, scented candle'));
        $seoCanonical = trim($__env->yieldContent('canonical_url', request()->fullUrl()));
        $seoRobots = trim($__env->yieldContent('meta_robots', 'index,follow,max-image-preview:large'));
        $ogType = trim($__env->yieldContent('og_type', 'website'));
        $ogImage = trim($__env->yieldContent('og_image', asset('favicon.ico')));
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
    <meta property="og:site_name" content="Diva - The Tactile Sanctuary" />
    <meta property="og:image" content="{{ $ogImage }}" />
    <meta name="twitter:card" content="{{ $twitterCard }}" />
    <meta name="twitter:title" content="{{ $seoTitle }}" />
    <meta name="twitter:description" content="{{ $seoDescription }}" />
    <meta name="twitter:image" content="{{ $ogImage }}" />

    @if($gaId || $adsId)
        @php
            $primaryTagId = $gaId ?: $adsId;
        @endphp
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $primaryTagId }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            @if($gaId)
            gtag('config', '{{ $gaId }}');
            @endif
            @if($adsId)
            gtag('config', '{{ $adsId }}');
            @endif
            @if($adsId && $adsConversionLabel)
            window.trackAdsConversion = function (callbackUrl) {
                const callback = function () {
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

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,300;0,400;0,700;1,300&amp;family=Manrope:wght@300;400;500;700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />

    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "surface-tint": "#53644d",
                        "inverse-on-surface": "#9b9d9d",
                        "on-error-container": "#6e1400",
                        "tertiary-fixed": "#fffbff",
                        "surface-container-lowest": "#ffffff",
                        "background": "#f8faf9",
                        "error-container": "#fd795a",
                        "primary-fixed-dim": "#c7dabe",
                        "on-primary-fixed": "#34432f",
                        "outline-variant": "#adb3b3",
                        "tertiary-container": "#fffbff",
                        "on-primary-container": "#465640",
                        "surface-container-low": "#f1f4f4",
                        "inverse-surface": "#0c0f0f",
                        "on-background": "#2d3434",
                        "secondary-fixed": "#f0e0d1",
                        "tertiary": "#615f5a",
                        "on-surface-variant": "#5a6060",
                        "on-tertiary-fixed": "#504e4a",
                        "surface-dim": "#d5dbdb",
                        "surface-container-highest": "#dde4e3",
                        "outline": "#757c7c",
                        "inverse-primary": "#e1f4d7",
                        "surface-variant": "#dde4e3",
                        "on-secondary-container": "#5a5044",
                        "secondary-container": "#f0e0d1",
                        "on-error": "#fff7f6",
                        "on-secondary-fixed": "#473e33",
                        "on-tertiary-container": "#62605b",
                        "on-tertiary-fixed-variant": "#6d6b66",
                        "secondary": "#685d51",
                        "surface": "#f8faf9",
                        "error": "#a73b21",
                        "on-primary-fixed-variant": "#4f604a",
                        "surface-container": "#eaefee",
                        "on-tertiary": "#fdf8f1",
                        "tertiary-dim": "#54534e",
                        "on-surface": "#2d3434",
                        "primary-fixed": "#d5e8cc",
                        "error-dim": "#791903",
                        "surface-bright": "#f8faf9",
                        "surface-container-high": "#e4e9e9",
                        "on-primary": "#ecffe1",
                        "secondary-fixed-dim": "#e1d2c3",
                        "primary-dim": "#475842",
                        "primary": "#53644d",
                        "on-secondary-fixed-variant": "#655a4e",
                        "tertiary-fixed-dim": "#f1ede6",
                        "secondary-dim": "#5c5146",
                        "on-secondary": "#fff7f3",
                        "primary-container": "#d5e8cc"
                    },
                    fontFamily: {
                        "headline": ["Noto Serif"],
                        "body": ["Manrope"],
                        "label": ["Manrope"]
                    },
                    borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" },
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
        }

        .bg-glass {
            backdrop-filter: blur(20px);
            background-color: rgba(221, 228, 227, 0.6);
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .scent-gradient {
            background: linear-gradient(135deg, #53644d 0%, #d5e8cc 100%);
        }

        .glass-nav {
            background-color: rgba(248, 250, 249, 0.6);
            backdrop-filter: blur(20px);
        }

        .ghost-border {
            border: 1px solid rgba(173, 179, 179, 0.15);
        }
    </style>
    @php
        $organizationSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => 'Diva - The Tactile Sanctuary',
            'url' => url('/'),
            'logo' => asset('favicon.ico'),
        ];
    @endphp
    <script type="application/ld+json">{!! json_encode($organizationSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
    @yield('structured_data')
    @livewireStyles
    @yield('extra_css')
</head>
<body class="bg-background text-on-surface font-body selection:bg-primary-container selection:text-on-primary-container">
    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    @livewireScripts
    @yield('extra_js')
</body>
</html>
