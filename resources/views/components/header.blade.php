<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <title>Document</title>
</head>

<body class="container-xl ">
    <header class="bg-transparent m-2 text-white">
        <div class="flex justify-between p-4">
            <img class="rounded-full w-12 h-auto" src="{{ asset('siwit.jpg') }}" alt="ini siwit">
            <h1 class="text-2xl mt-2 invisible">Ini Wm</h1>
            <nav class="gap-3 mt-2 mr-2">
                <ul class="flex gap-4">
                    <li class="hover:text-blue-400 marcellus-regular animate duration-500"><a href="/">Home</a></li>
                    <li class="hover:text-blue-400 marcellus-regular animate duration-500"><a href="/about">About</a></li>
                    <li class="hover:text-blue-400 marcellus-regular animate duration-500"><a href="/contact">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>
</body>

</html>
