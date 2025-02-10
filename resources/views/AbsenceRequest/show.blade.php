@extends('dash_Views.layout.index')

@section('custom_page')
    <div class="pagetitle">
        <h1>Tableau de Bord</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Projets</a></li>
                <li class="breadcrumb-item active">Projets/Details</li>
            </ol>
        </nav>
    </div>

    <div class="project-card">
        <div class="project-content">
            <div class="number-badge">{{ $project->project_date ? date('Y', strtotime($project->project_date)) : 'N/A' }}
            </div>
            <h5>{{ $project->title }}</h5>
            <div class="project-info">
                <p><strong>Date du projet:</strong>
                    {{ $project->project_date ? date('d/m/Y', strtotime($project->project_date)) : 'Non définie' }}</p>
                <p><strong>Créé le:</strong> {{ $project->created_at->format('d/m/Y') }}</p>
            </div>
            <p class="project-description">{{ $project->description }}</p>

            <div class="project-actions">
                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary">
                    <ion-icon name="pencil-sharp"></ion-icon> Modifier
                </a>
                <a href="{{ route('projects.index') }}" class="btn btn-secondary">
                    <ion-icon name="arrow-back-sharp"></ion-icon> Retour
                </a>
            </div>
        </div>
    </div>

    <style>
        :root {
            --primary: #2f7707;
            --secondary: #000000;
            --green: #2f7707;
            --yellow: #ffea01;
            --red: #b50505;
        }

        .project-card {
            background: #fff;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            height: 100%;
            position: relative;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(47, 119, 7, 0.1);
            max-width: 800px;
            margin: 2rem auto;
        }

        .project-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(47, 119, 7, 0.2);
            border-color: var(--primary);
        }

        .project-content {
            padding: 2rem;
            position: relative;
            z-index: 1;
        }

        .number-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: linear-gradient(135deg, var(--red), var(--green));
            color: var(--yellow);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: bold;
            font-size: 0.9rem;
        }

        .project-content h5 {
            color: var(--primary);
            font-size: 1.2rem;
            margin: 1.5rem 0 1rem;
            font-weight: 600;
        }

        .project-info {
            margin-bottom: 1.5rem;
            color: var(--secondary);
        }

        .project-info p {
            margin: 0.5rem 0;
        }

        .project-description {
            color: var(--secondary);
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .project-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 2rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--green);
            border-color: var(--green);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(47, 119, 7, 0.2);
        }

        .btn-secondary {
            background-color: #f0f0f0;
            border-color: #ddd;
            color: var(--secondary);
        }

        .btn-secondary:hover {
            background-color: #e0e0e0;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .project-card {
                margin: 1rem;
            }

            .project-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
@endsection
