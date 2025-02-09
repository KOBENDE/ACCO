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
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 20px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
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

        /* Sidebar */
        .sidebar {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .sidebar-title {
            font-size: 1.4em;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 15px;
        }

        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .menu-item {
            padding: 15px;
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            border-radius: 10px;
        }

        .menu-item a {
            text-decoration: none;
            color: var(--text-color);
        }

        .menu-item:hover {
            background: var(--hover-color);
            color: white;
        }

        .menu-item:hover a {
            color: white;
        }

        .menu-item i {
            font-size: 1.1em;
        }

        .profile-section {
            margin-top: 30px;
        }

        .logout {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 15px;
            border-radius: 10px;
            cursor: pointer;
            color: #e74c3c;
            transition: background 0.3s ease;
        }

        .logout:hover {
            background: #ffeaea;
        }

        /* Main Content */
        .main-content {
            padding: 20px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .title {
            font-size: 1.5em;
            font-weight: bold;
            color: var(--text-color);
        }

        .action-button {
            display: flex;
            align-items: center;
            gap: 8px;
            background-color: var(--primary-color);
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .action-button:hover {
            background-color: var(--hover-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
        }

        .action-button i {
            font-size: 0.9em;
        }

        .action-button a {
           text-decoration: none;
        }

        .table-container {
            margin-top: 20px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
        }

        th {
            background: var(--secondary-color);
            font-weight: 600;
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
            color: var(--primary-color);
            transition: color 0.3s ease;
        }

        .actions span:hover {
            color: var(--accent-color);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .dashboard {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .header, .header-content {
                flex-direction: column;
                gap: 15px;
            }
            
            .action-button {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="dashboard">
            <aside class="sidebar">
                <div class="sidebar-title">Tableau de bord</div>
                <div class="sidebar-menu">
                    <div class="menu-item"><i class="fas fa-calendar"></i> <a href="#">Demande de congé</a></div>
                    <div class="menu-item"><i class="fas fa-clock"></i> <a href="#">Demande d'absence</a></div>
                </div>
                <div class="profile-section">
                    <div class="menu-item"><i class="fas fa-user"></i> <a href="#">Profil</a></div>
                    <div class="logout"><i class="fas fa-sign-out-alt"></i> Déconnexion</div>
                </div>
            </aside>
            <div class="main-content">
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
                <main>
                    <div class="header-content">
                        <h1 class="title">Tableau de Bord > Demande de Congé</h1>
                        <button class="action-button" onclick="window.location.href='{{ route('demande.create') }}'">
                    <i class="fas fa-plus"></i>
                          Faire une Demande
                        </button>
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
                                <td><!-- Actions --></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
                </main>
            </div>
        </div>
    </div>
</body>
</html>