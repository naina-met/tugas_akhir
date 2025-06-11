<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="shortcut icon" href="{{ asset('siwit.jpg') }}" type="image/x-icon/jpg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <style>
        .marcellus-regular {
            font-family: "Marcellus", serif;
            font-weight: 400;
            font-style: normal;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Marcellus&display=swap" rel="stylesheet">
    <title>Percobaan</title>
</head>

<body class="relative h-screen w-screen overflow-hidden">

    {{-- header komponen ka--}}
    <x-header />

    <!-- Video background -->
    <video autoplay muted loop class="fixed top-0 left-0 w-full h-full object-cover z-[-1]">
        <source src="{{ asset('background2.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>


    <!-- Konten halaman -->
    <div
        class="marcellus-regular absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white w-full max-w-xl p-6 bg-transparent bg-opacity-80 rounded-2xl shadow-lg z-50">
        <h1 class="text-2xl font-bold text-center">
            Lorem ipsum dolor sit amet.
        </h1>
    </div>



</body>

</html>
