<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <h1>Название сайта</h1>
        <nav>
            <a href="/">Главная</a>
            <a href="/о_нас">О нас</a>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        &copy; {{ date('Y') }} Название сайта
    </footer>
</body>
</html>