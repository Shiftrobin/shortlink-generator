<!doctype html>
<html lang="en">

<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('public/frontend') }}/member/assets/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('public/frontend') }}/member/assets/font/bootstrap-icons.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/member/assets/css/custom.css" />
    <script src="{{ asset('public/frontend') }}/member/assets/js/custom.js"></script>
    <link rel="icon" type="image/png" href="{{ asset('public/frontend') }}/images/favicon.png">
    <title>{{ $user->name ?? '' }}</title>
</head>

<body>
