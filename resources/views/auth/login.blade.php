<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | CongeEasy</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg flex w-4/5 max-w-5xl">
        <!-- Section Formulaire -->
        <div class="w-1/2 p-10 flex flex-col justify-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Bienvenue sur CongeEasy</h2>

            <!-- Affichage des messages d'erreur -->
            @if (session('success'))
                <div class="mb-4 text-green-600 text-center font-semibold">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('login.submit') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <div class="relative">
                        <input type="email" name="email" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 pl-10">
                        <span class="absolute left-3 top-3 text-gray-400">📧</span>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Mot de passe</label>
                    <div class="relative">
                        <input type="password" name="password" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 pl-10">
                        <span class="absolute left-3 top-3 text-gray-400">🔒</span>
                    </div>
                </div>
                <div class="flex justify-between items-center">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="mr-2"> Se souvenir de moi
                    </label>
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-500 hover:underline">Mot de passe oublié ?</a>
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">Se connecter</button>
            </form>
            <p class="text-center text-sm mt-4">Pas encore de compte ? <a href="{{ route('register.form') }}" class="text-blue-500 hover:underline">Inscrivez-vous</a></p>
        </div>

        <!-- Section Illustration -->
        <div class="w-1/2 hidden md:flex items-center justify-center bg-gradient-to-br from-blue-500 to-indigo-600 p-10">
            <img src="/images/illustration1.png" alt="Illustration" class="w-3/4 h-auto object-contain">
        </div>
    </div>
</body>
</html>
