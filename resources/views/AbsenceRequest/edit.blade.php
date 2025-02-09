@extends('dash_Views.layout.index')

@section('custom_page')
    <div class="pagetitle">
        <h1>Tableau de Bord</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Actualite</a></li>
                <li class="breadcrumb-item active">Actualite/Nos projets/Modification</li>
            </ol>
        </nav>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="Acontainer">
        <form class="Aform" action="{{ route('projects.update', $project->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="Aform-section">
                <div class="Aform-group">
                    <label for="title">Titre</label>
                    <input type="text" name="title" value="{{ $project->title }}" id="title"
                        placeholder="Ajoutez un titre" required>
                </div>
                <div class="Aform-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" placeholder="Ajoutez une description détaillée" rows="4" required>{{ $project->description }}</textarea>
                </div>
                <div class="Aform-group">
                    <label for="project_date">Année de réalisation du projet</label>
                    <input type="date" name="project_date" id="project_date" value="{{ $project->project_date }}">
                </div>
                <button type="submit" class="Abtn edit-project">Modifier</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.edit-project');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const form = this.closest('form');

                    Swal.fire({
                        title: 'Voulez-vous reellement modifier?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#2f7707',
                        cancelButtonColor: '#b50505',
                        confirmButtonText: 'Oui, Modifier!',
                        cancelButtonText: 'Annuler'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                            Swal.fire({
                                icon: "success",
                                title: "Actualité modifiée avec succès",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    });
                });
            });
        });
    </script>
@endsection
