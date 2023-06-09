<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0" />
    <meta name="description" content="Suhadak Akbar is a Backend Developer that experienced in PHP (Laravel)">

    <link rel="icon" type="image/png" href="{{ asset('favicons/images-favicon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ asset('favicons/images-favicon-16x16.png') }}" sizes="16x16" />

    @env('production')
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-M7W57TGZ0D"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-M7W57TGZ0D');
    </script>
    @endenv
    @vite('resources/js/app.ts')
    @inertiaHead
</head>

@inertia

</html>
