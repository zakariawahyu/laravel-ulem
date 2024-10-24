<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @if (!empty($meta))
    <title>{{ $meta->title }}</title>
    <link rel="icon" href="{{ asset('storage/'.$meta->custom_data->icon) }}"/>

    <meta name="keywords" content="{{ $meta->custom_data->keywords }}" />
    <meta name="title" content="{{ $meta->title }}" />
    <meta name="description" content="{{ $meta->description }}" />

    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="@zakariayunanda" />
    <meta property="og:url" content="{{ config('app.url') }}" />
    <meta property="og:title" content="{{ $meta->title }}" />
    <meta property="og:description" content="{{ $meta->description }}" />
    <meta property="og:image" content="{{ asset('storage/'.$meta->image) }}"/>
    <meta property="og:locale" content="id_ID" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="650" />
    <meta property="og:image:height" content="366" />
    <meta property="og:image:alt" content="{{ $meta->title }}" />

    <meta property="ia:markup_url" content="{{ config('app.url') }}" />
    <meta property="ia:markup_url_dev" content="{{ config('app.url') }}" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@zakariayunanda" />
    <meta name="twitter:title" content="{{ $meta->title }}" />
    <meta name="twitter:description" content="{{ $meta->description }}" />
    <meta name="twitter:image:src" content="{{ asset('storage/'.$meta->image) }}"/>

    <meta itemprop="title" content="{{ $meta->title }}" />
    <meta itemprop="name" content="{{ $meta->title }}" />
    <meta itemprop="description" content="{{ $meta->description }}" />
    <meta itemprop="image"content="{{ asset('storage/'.asset('storage/'.$meta->image)) }}"/>

    <meta name="robots" content="index, follow">
    <meta name="author" content="{{ $meta->custom_data->author }}">
    <meta name="publisher" content="{{ $meta->custom_data->author }}">
    <meta name="thumbnailUrl" content="{{ asset('storage/'.$meta->image) }}" itemprop="thumbnailUrl"/>
    @endif

    <!-- Preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />

    <!-- fonts -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/font.min.css')}}" />

    <!-- styles libraries -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/libs/bootstrap/5.1.3/css/bootstrap.min.css')}}" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- styles custom -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/styles.min.css')}}?v=2" />
    <style>
        input.error,
        select.error {
            margin-bottom: 0px !important;
        }

        label.error {
            display: block;
            width: 100%;
            margin-bottom: 0.5rem;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type="number"] {
            -moz-appearance: textfield;
        }
    </style>
</head>