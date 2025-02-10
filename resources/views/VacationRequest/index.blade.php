@extends('dash_Views.layout.index')

@section('custom_page')
    <div class="horizontalH">
        <div class="pagetitle">
            <h1>Tableau de Bord</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Projets</a></li>
                    <li class="breadcrumb-item active">Projets/liste</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <a href="{{ route('projects.create') }}" class="addAcBtn">Ajouter un projet</a>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($projects->isEmpty())
        <div class="empty-list-alert">
            <span class="alert-message">Désolé, votre liste est vide. Merci</span>
            <span class="close-btn">&times;</span>
        </div>
    @else
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Date du projet</th>
                <th width="280px">Actions</th>
            </tr>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $project->title }}</td>
                    <td>
                        {{ \Illuminate\Support\Str::limit($project->description, 50, '...') }}
                        <br>
                        <small class="text-muted">Créé le {{ $project->created_at->format('d/m/Y') }}</small>
                    </td>
                    <td>{{ $project->project_date ? date('d/m/Y', strtotime($project->project_date)) : 'Non définie' }}</td>
                    <td>
                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                            class="actions_crud_form">
                            <a class="btn btn-info icon" href="{{ route('projects.show', $project->id) }}">
                                <ion-icon name="eye-sharp"></ion-icon>voir
                            </a>
                            <a class="btn btn-primary icon" href="{{ route('projects.edit', $project->id) }}">
                                <ion-icon name="pencil-sharp"></ion-icon>Editer
                            </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger icon delete-project">
                                <ion-icon name="trash-sharp"></ion-icon>Supp.
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {!! $projects->withQueryString()->links('pagination::bootstrap-5') !!}
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-project');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const form = this.closest('form');

                    Swal.fire({
                        title: 'Voulez-vous reellement supprimer?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#2f7707',
                        cancelButtonColor: '#b50505',
                        confirmButtonText: 'Oui, Supprimer!',
                        cancelButtonText: 'Annuler'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                            Swal.fire({
                                icon: "success",
                                title: "Projet supprimé avec succès",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    });
                });
            });
        });
    </script>
    <script>
        document.querySelector('.close-btn')?.addEventListener('click', function() {
            this.parentElement.style.display = 'none';
        });
    </script>
@endsection
