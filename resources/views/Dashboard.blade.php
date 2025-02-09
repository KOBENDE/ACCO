<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Variables et styles de base */
        :root {
            --primary-color: #4a90e2;
            --secondary-color: #f5f6fa;
            --accent-color: #2ecc71;
            --text-color: #2d3436;
            --border-color: #dfe6e9;
            --hover-color: #74b9ff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: var(--secondary-color);
            color: var(--text-color);
        }

        /* Container et Dashboard */
        .container {
            padding: 20px;
            min-height: 100vh;
        }

        .dashboard {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 25px;
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 20px;
            border-bottom: 2px solid var(--border-color);
            margin-bottom: 25px;
        }

        .logo-section {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .logo-section div:first-child {
            font-size: 1.5em;
            font-weight: bold;
            color: var(--primary-color);
        }

        .solde {
            background: var(--accent-color);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.9em;
        }

        .user-section {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .user-section span {
            cursor: pointer;
            font-size: 1.2em;
            transition: color 0.3s ease;
        }

        .user-section span:hover {
            color: var(--primary-color);
        }

        /* Sidebar améliorée */
        .sidebar-title {
            font-size: 1.4em;
            font-weight: 600;
            color: #2c3e50;
            padding: 15px 20px;
            border-bottom: 2px solid #eef2f7;
            margin-bottom: 15px;
            background: linear-gradient(135deg, #f8f9fa, #ffffff);
            border-radius: 10px 10px 0 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .sidebar-menu {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            
        }

        .menu-item {
            padding: 15px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
          
        }

        .menu-item a {
            text-decoration: none;
        }

        .menu-item:hover {
            background: linear-gradient(135deg, #4a90e2, #357abd);
            color: white;
            border-left: 4px solid #2ecc71;
        }

        .menu-item i {
            color: #4a90e2;
            font-size: 1.1em;
            transition: all 0.3s ease;
        }

        .menu-item:hover i {
            color: white;
            transform: translateX(5px);
        }

        /* Main Content */
        .main-content {
            display: flex;
            gap: 30px;
        }

        .content {
            flex: 1;
        }

        /* Cards */
        .stats-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            border: 1px solid var(--border-color);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card div:first-child {
            color: #636e72;
            font-size: 0.9em;
            margin-bottom: 10px;
        }

        .card div:last-child {
            font-size: 2em;
            font-weight: bold;
            color: var(--primary-color);
        }

        /* Table */
        .table-container {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .table-header {
            padding: 20px;
            background: var(--secondary-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table-header div:first-child {
            font-size: 1.2em;
            font-weight: 600;
        }

        .filter-select {
            padding: 8px 15px;
            border-radius: 5px;
            border: 1px solid var(--border-color);
            outline: none;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: var(--secondary-color);
            font-weight: 600;
            padding: 15px;
            text-align: left;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid var(--border-color);
        }

        tr:hover {
            background: #f8f9fa;
        }

        .actions {
            display: flex;
            gap: 15px;
        }

        .actions span {
            cursor: pointer;
            padding: 5px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .actions span:hover {
            background: var(--primary-color);
            color: white;
        }

        /* Profile Section */
        .profile-section {
            margin-top: 50px;
            padding-top: 20px;
            border-top: 1px solid var(--border-color);
        }

        .logout {
            margin-top: 15px;
            color: #e74c3c;
            cursor: pointer;
            transition: color 0.3s ease;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logout:hover {
            color: #c0392b;
            background: #ffeaea;
            border-radius: 10px;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .main-content {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
            }

            .stats-cards {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .stats-cards {
                grid-template-columns: 1fr;
            }

            .header {
                flex-direction: column;
                gap: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="dashboard">
            <header class="header">
                <div class="logo-section">
                    <div>LOGO + Nom-Site</div>
                    <div class="solde">Solde de demande restant: 05</div>
                </div>
                <div class="user-section">
                    <span><i class="fas fa-bell"></i></span>
                    <span><i class="fas fa-user"></i></span>
                    <span>Employé</span>
                </div>
            </header>

            <div class="relative">
    <button id="notificationsButton" class="relative">
        <!-- Icône de cloche -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 00-9.33-5M9 21h6m-6 0a3 3 0 006 0"></path>
        </svg>
        <!-- Badge avec le nombre de notifications -->
        @if(auth()->check() && auth()->user()->unreadNotifications->count() > 0)
            <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                {{ auth()->user()->unreadNotifications->count() }}
            </span>
        @endif
    </button>

    <!-- Liste des notifications -->
    @if(auth()->check())
        <div id="notificationsDropdown" class="hidden absolute right-0 mt-2 w-64 bg-white shadow-lg rounded-lg overflow-hidden z-10">
            <ul>
                @forelse(auth()->user()->unreadNotifications as $notification)
                    <li class="px-4 py-2 hover:bg-gray-100">
                        <a href="{{ $notification->data['url'] }}" class="text-sm text-gray-700">
                            {{ $notification->data['title'] }}
                        </a>
                    </li>
                @empty
                    <li class="px-4 py-2 text-sm text-gray-500">Aucune nouvelle notification</li>
                @endforelse
            </ul>
        </div>
    @endif
</div>


            <div class="main-content">
                <aside class="sidebar">
                    <div class="sidebar-title">
                        <i class="fas fa-chart-line"></i> Tableau de bord
                    </div>
                    <div class="sidebar-menu">
                        <div class="menu-item">
                           <a href="/store">
                           <i class="fas fa-calendar"> </i>
                           Demande de congé 
                           </a> 
                        </div>
                        <div class="menu-item">
                            <i class="fas fa-clock"></i>
                            Demande d'absence
                        </div>
                    </div>
                    <div class="profile-section">
                        <div class="menu-item">
                            <i class="fas fa-user"></i>
                            Profil
                        </div>
                        <div class="logout">
                            <i class="fas fa-sign-out-alt"></i>
                            Déconnexion
                        </div>
                    </div>
                </aside>

                <main class="content">
                    <div class="stats-cards">
                        <div class="card">
                            <div>Nombre de demande de congé Encours</div>
                            <div>01</div>
                        </div>
                        <div class="card">
                            <div>Nombre de demandes d'absence en cours</div>
                            <div>00</div>
                        </div>
                        <div class="card">
                            <div>Total demandes</div>
                            <div>01</div>
                        </div>
                    </div>

                    <div class="table-container">
    <div class="table-header">
        <div>Liste de mes récentes demandes</div>
        <select class="filter-select">
            <option>Filtrer par type</option>
            <option>Congé</option>
            <option>Absence</option>
        </select>
    </div>
    @if(!isset($demandes) || $demandes->isEmpty())
    <div style="padding: 20px; text-align: center; color: red;">La liste est vide.</div>
    @else
    <table>
        <thead>
            <tr>
                <th>Type</th>
                <th>Date de demande</th>
                <th>État</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($demandes as $demande)
                <tr>
                    <td>{{ $demande->type }}</td>
                    <td>{{ $demande->created_at->format('d/m/Y') }}</td>
                    <td>{{ $demande->etat }}</td>
                    <td>
                        <!-- Actions -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

        <table>
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Date de demande</th>
                    <th>État</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($demandes as $demande)
                    <tr>
                        <td>{{ $demande->type }}</td>
                        <td>{{ $demande->created_at->format('d/m/Y') }}</td>
                        <td>{{ $demande->etat }}</td>
                        <td>
                            <div class="actions">
                                <span><i class="fas fa-eye"></i></span>
                                <span><i class="fas fa-edit"></i></span>
                                <span><i class="fas fa-trash"></i></span>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

                </main>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('notificationsButton').addEventListener('click', function () {
    const dropdown = document.getElementById('notificationsDropdown');
    dropdown.classList.toggle('hidden');
});

    </script>
</body>
</html>