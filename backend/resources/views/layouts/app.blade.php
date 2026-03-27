<!DOCTYPE html>
<html class="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>@yield('title', 'The Tactile Sanctuary | Cánh Cửa Bước Vào Thế Giới Hương Thơm')</title>
    
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
    @yield('extra_css')
</head>
<body class="bg-background text-on-surface font-body selection:bg-primary-container selection:text-on-primary-container">
    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    @yield('extra_js')
</body>
</html>
