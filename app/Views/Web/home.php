<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <title><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></title>
</head>
<body class="bg-gray-100 min-h-screen">

<main class="max-w-2xl mx-auto px-4 py-10">

    <header class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Bem-vindo ao Sistema</h1>
        <p class="text-gray-500 mt-1">Projeto MVC em PHP puro</p>
    </header>

    <!-- Flash Messages -->
    <?php include __DIR__ . '/../partials/flash.php'; ?>

    <section class="mt-6">
        <a href="<?= url('/login') ?>"
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg transition">
            Entrar
        </a>
    </section>

</main>

</body>
</html>