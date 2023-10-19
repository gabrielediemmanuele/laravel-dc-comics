<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ env('APP_NAME') }}</title>

  @yield('font-awesome')

  <!-- Styles -->
  @vite('resources/js/app.js')
</head>

<body>
  @include('partials._navbar')

  <main>
    @if(session('message'))
      <div class="container mb-5 mt-5">
        <div class="alert alert-{{ session('message_type') ?? 'info'}}">
          {{ session('message') }}
        </div>
      </div>
    @endif

    @yield('main-content')
  </main>
  <footer>
    @yield('scripts')
  </footer>

</body>

</html>
