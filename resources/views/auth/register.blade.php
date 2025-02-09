<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription | CongeEasy</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="max-w-4xl w-full bg-white shadow-lg rounded-lg overflow-hidden flex">
        <div class="w-1/2 p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Créer un compte</h2>

            <!-- Messages de succès et d'erreur -->
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Formulaire d'inscription -->
            <form action="{{ route('register.submit') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700">Nom</label>
                    <input type="text" name="nom" value="{{ old('nom') }}" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Prénom</label>
                    <input type="text" name="prenom" value="{{ old('prenom') }}" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Fonction</label>
                    <input type="text" name="fonction" value="{{ old('fonction') }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Service</label>
                    <select name="service_id" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Sélectionner un service</option>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                {{ $service->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">S'inscrire</button>
                <p class="text-center text-sm mt-4">Deja un compte ? <a href="{{ route('login.form') }}" class="text-blue-500 hover:underline">Connectez-vous</a></p>
            </form>
        </div>

        <!-- Illustration -->
        <div class="w-1/2 bg-blue-500 flex items-center justify-center">
            <img src="/images/illustration-inscription.png" alt="Illustration" class="w-3/4">
        </div>
    </div>
</body>
</html>
