<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex">
        <!-- Barre latérale fixe -->
        <aside class="w-64 bg-white p-5 shadow-lg flex flex-col justify-between fixed h-screen">
            <div>
                <div class="mb-5 flex items-baseline"> <!-- Alignement sur la ligne de base -->
                    <img src="/images/logoIbam.png" alt="Logo IBAM" class="h-12 mr-3">
                    <h2 class="text-2xl font-bold text-orange-800">CongeEasy</h2>
                </div>
                <nav>
                    <ul>
                        <li class="mb-4"><a href="#" class="flex items-center text-gray-700 hover:text-orange-500"><span class="mr-2"><i class="fa-solid fa-house"></i> Tableau de bord</span></a></li>
                        <li class="mb-4"><a href="#" class="flex items-center text-gray-700 hover:text-orange-500"><span class="mr-2"><i class="fa-solid fa-list"></i> Listes des demandes</span> </a></li>
                        <li class="mb-4"><a href="#" class="flex items-center text-gray-700 hover:text-orange-500"><span class="mr-2"><i class="fa-solid fa-table-list"></i></span> Listes des employe </a></li>
                    </ul>
                </nav>
            </div>
            <div>
                <ul>
                    <li class="mb-4"><a href="{{ route('profile') }}" class="flex items-center text-gray-700 hover:text-orange-500"><i class="fa-solid fa-user"></i> <span class="mr-2">  Profil </span> </a></li>
                    <li class="mb-4"><a href="{{ route('logout') }}" class="flex items-center text-gray-700 hover:text-orange-500"><i class="fa-solid fa-right-from-bracket"></i> <span class="mr-2"> Déconnexion </span> </a></li>
                </ul>
            </div>
        </aside>
        
        <!-- Contenu principal avec défilement -->
        <main class="flex-1 p-6 ml-64 overflow-y-auto">
            <!-- Header fixe -->
            <div class="bg-white p-4 rounded-lg shadow-lg flex justify-between items-center mb-6 sticky top-0 z-10">
                <h1 class="text-2xl font-bold text-gray-800">Tableau de Bord</h1>
                <a href="{{ route('profile') }}" class="flex items-center text-gray-700 hover:text-orange-500">
                     <i class="fas fa-user text-xl mr-2"></i><span>Admin</span>
                </a>
            </div>
            
            <!-- Section des statistiques -->
            <div class="grid grid-cols-2 gap-6 mt-20"> <!-- Ajout de mt-20 pour éviter que le contenu ne soit caché par le header -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-lg font-semibold mb-4">Répartition des demandes</h2>
                    <canvas id="chartDemandes"></canvas>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-lg font-semibold mb-4">Évolution des demandes</h2>
                    <canvas id="chartEvolution"></canvas>
                </div>
            </div>
            
            <!-- Tableau des demandes récentes -->
            <div class="mt-6 bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-lg font-semibold mb-4">Liste des demandes récentes</h2>
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border p-2">#</th>
                            <th class="border p-2">Nom</th>
                            <th class="border p-2">Prénom</th>
                            <th class="border p-2">Fonction</th>
                            <th class="border p-2">Solde</th>
                            <th class="border p-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border p-2">1</td>
                            <td class="border p-2">Doe</td>
                            <td class="border p-2">John</td>
                            <td class="border p-2">Secretaire</td>
                            <td class="border p-2 text-yellow-500">30</td>
                            <td class="border p-2"><button class="bg-blue-500 text-white px-3 py-1 rounded">Voir</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    
    <script>
        // Graphique de répartition des demandes
        var ctx = document.getElementById('chartDemandes').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Acceptées', 'Refusées', 'En attente'],
                datasets: [{
                    data: [10, 5, 7], 
                    backgroundColor: ['#4CAF50', '#F44336', '#FFC107']
                }]
            }
        });
        
        // Graphique d'évolution des demandes
        var ctx2 = document.getElementById('chartEvolution').getContext('2d');
        new Chart(ctx2, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai'],
                datasets: [{
                    label: 'Demandes traitées',
                    data: [5, 10, 15, 8, 12],
                    borderColor: '#FFA500',
                    fill: false
                }]
            }
        });
    </script>
</body>
</html>