<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Employé</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-6 rounded-lg shadow-md text-center">
        <h1 class="text-2xl font-bold text-gray-800">Bienvenue, Employé</h1>
        <p class="text-gray-600 mt-2">Vous êtes connecté en tant qu'Employé.</p>
        <a href="{{ route('logout') }}" class="mt-4 inline-block bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Déconnexion</a>
    </div>
</body>
</html>
