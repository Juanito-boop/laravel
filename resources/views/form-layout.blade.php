<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Esto es para que funcione el formulario -->
	<link rel="icon" type="image/png" href="{{ asset('img/image-removebg-preview.svg') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link rel="stylesheet" href="https://npuxpuelimayqrsmzqur.supabase.co/storage/v1/object/public/images/css/output.css">
	@vite('resources/css/app.css')
	<title>@yield('title')</title>
</head>

<body class="h-screen w-screen bg-[#424242]">

	@yield('content')

</body>

</html>
