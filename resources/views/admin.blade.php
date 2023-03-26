<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0" />
    <meta name="robots" content="noindex">

    <link rel="icon" type="image/png" href="{{ asset('favicons/images-favicon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ asset('favicons/images-favicon-16x16.png') }}" sizes="16x16" />
    @vite(['resources/js/admin.ts', 'resources/css/app.css'])
    @inertiaHead
</head>

@inertia

</html>
