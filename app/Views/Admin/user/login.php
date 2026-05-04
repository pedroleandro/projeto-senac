<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Login — <?= defined('APP_NAME') ? htmlspecialchars(APP_NAME, ENT_QUOTES, 'UTF-8') : 'Sistema' ?></title>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="w-full max-w-md px-4">

    <!-- Card do formulário -->
    <div class="bg-white rounded-2xl shadow-md px-8 py-10">

        <!-- Cabeçalho -->
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-gray-800">Acesse sua conta</h1>
            <p class="text-gray-500 text-sm mt-1">Informe suas credenciais para continuar</p>
        </div>

        <!-- Flash Messages -->
        <?php include __DIR__ . '/../../partials/flash.php'; ?>

        <!-- Formulário -->
        <form action="<?= url('/login') ?>" method="POST" novalidate>

            <?= csrf_input() ?>

            <!-- Campo E-mail -->
            <div class="mb-5">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    E-mail
                </label>
                <input
                        type="email"
                        id="email"
                        name="email"
                        value="<?= old('email') ?>"
                        placeholder="seu@email.com"
                        autocomplete="email"
                        required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm text-gray-800
                               placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500
                               focus:border-transparent transition"
                >
            </div>

            <!-- Campo Senha -->
            <div class="mb-6">
                <div class="flex items-center justify-between mb-1">
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        Senha
                    </label>
                    <a href="<?= url('/esqueci-senha') ?>"
                       class="text-xs text-blue-600 hover:underline">
                        Esqueci minha senha
                    </a>
                </div>
                <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="*******"
                        autocomplete="current-password"
                        required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm text-gray-800
                               placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500
                               focus:border-transparent transition"
                >
            </div>

            <!-- Botão -->
            <button
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white
                           font-semibold py-2.5 rounded-lg transition text-sm">
                Entrar
            </button>

        </form>

        <!-- Rodapé do card -->
        <p class="text-center text-sm text-gray-500 mt-6">
            Não tem conta?
            <a href="<?= url('/cadastro') ?>" class="text-blue-600 hover:underline font-medium">
                Cadastre-se
            </a>
        </p>

    </div>

    <!-- Link voltar -->
    <p class="text-center text-xs text-gray-400 mt-4">
        <a href="<?= url('/') ?>" class="hover:underline">← Voltar para a Home</a>
    </p>

</div>

</body>
</html>