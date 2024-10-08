<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{config('app.name')}}</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
  @vite('resources/css/app.css')
  @yield('css')
  

</head>
<body>
    @yield('content')
</body>
</html>
