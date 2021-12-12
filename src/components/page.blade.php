<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

    <title>{{ $title }} - {{ config('app.name') }}</title>

    @if($metaDescription)
        <meta name="description" content="{{ $metaDescription }}">
    @endif

    <meta name="robots" content="{{ $metaRobots }}">

    @foreach($cssFiles as $file)
        <link rel="stylesheet" href="{{ $file }}">
    @endforeach
    @if($livewire)
        @livewireStyles
    @endif

    <x-html-header
        :title="$title"
        :metaDescription="$metaDescription"
        :shareImage="$shareImage"
    />
</head>
<body class="antialiased overflow-x-hidden {{ $background }} {{ $text }}">
<div class="{{ $height }}">
    <x-page-header/>

    <div class="container">
        @if($h1)
            <h1>{{ $h1 }}</h1>
        @endif
        {!! $header ?? '' !!}
        <x-user-messages/>
    </div>

    <div class="{{ $attributes->get('contentCssClasses', '') }} {{ $wrapContent ? 'container py-10' : '' }}">
        {{ $slot }}
    </div>
</div>

@stack('modals')

<x-page-footer
    :breadcrumbAttr="$breadcrumbAttr"
/>

@if($livewire)
    @livewireScripts
@endif

@foreach($jsFiles as $file)
    <script src="{{ $file }}"></script>
@endforeach

</body>
</html>
