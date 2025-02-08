@extends('dash_Views.layout.index')

@section('custom_page')
    <div class="pagetitle">
        <h1>Tableau de Bord</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.blade.php">Accueil</a></li>
                <li class="breadcrumb-item active">Tableau de Bord</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <!-- Adhesion Request Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card politiq-card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filtrer</h6>
                                    </li>
                                    <li>
                                        <a class="dropdown-item {{ $requestPeriod === 'day' ? 'active' : '' }}"
                                            href="{{ route('visitors.dashboard', ['request_period' => 'day', 'visitor_period' => $visitorPeriod]) }}">
                                            Aujourd'hui
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item {{ $requestPeriod === 'month' ? 'active' : '' }}"
                                            href="{{ route('visitors.dashboard', ['request_period' => 'month', 'visitor_period' => $visitorPeriod]) }}">
                                            Ce mois
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item {{ $requestPeriod === 'year' ? 'active' : '' }}"
                                            href="{{ route('visitors.dashboard', ['request_period' => 'year', 'visitor_period' => $visitorPeriod]) }}">
                                            Cette année
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Demandes d'adhésion
                                    <span>|
                                        @switch($requestPeriod)
                                            @case('day')
                                                Aujourd'hui
                                            @break

                                            @case('month')
                                                Ce mois
                                            @break

                                            @case('year')
                                                Cette année
                                            @break
                                        @endswitch
                                    </span>
                                </h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-person-plus"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $totalRequests }}</h6>
                                        @if ($percentageIncreaseRequests > 0)
                                            <span
                                                class="text-success small pt-1 fw-bold">{{ number_format($percentageIncreaseRequests, 1) }}%</span>
                                            <span class="text-muted small pt-2 ps-1">augmenté</span>
                                        @elseif($percentageIncreaseRequests < 0)
                                            <span
                                                class="text-danger small pt-1 fw-bold">{{ number_format(abs($percentageIncreaseRequests), 1) }}%</span>
                                            <span class="text-muted small pt-2 ps-1">diminué</span>
                                        @else
                                            <span class="text-muted small pt-1 fw-bold">0%</span>
                                            <span class="text-muted small pt-2 ps-1">pas de changement</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Adhesion Request Card -->

                    <!-- Visitors Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>
                                    <li>
                                        <a class="dropdown-item {{ $visitorPeriod === 'day' ? 'active' : '' }}"
                                            href="{{ route('visitors.dashboard', ['visitor_period' => 'day', 'request_period' => $requestPeriod]) }}">
                                            Aujourd'hui
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item {{ $visitorPeriod === 'month' ? 'active' : '' }}"
                                            href="{{ route('visitors.dashboard', ['visitor_period' => 'month', 'request_period' => $requestPeriod]) }}">
                                            Ce mois
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item {{ $visitorPeriod === 'year' ? 'active' : '' }}"
                                            href="{{ route('visitors.dashboard', ['visitor_period' => 'year', 'request_period' => $requestPeriod]) }}">
                                            Cette année
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Visiteurs du site
                                    <span>|
                                        @switch($visitorPeriod)
                                            @case('day')
                                                Aujourd'hui
                                            @break

                                            @case('month')
                                                Ce mois
                                            @break

                                            @case('year')
                                                Cette année
                                            @break
                                        @endswitch
                                    </span>
                                </h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $totalVisitors }}</h6>
                                        @if ($percentageIncrease > 0)
                                            <span
                                                class="text-success small pt-1 fw-bold">{{ number_format($percentageIncrease, 1) }}%</span>
                                            <span class="text-muted small pt-2 ps-1">augmenté</span>
                                        @elseif($percentageIncrease < 0)
                                            <span
                                                class="text-danger small pt-1 fw-bold">{{ number_format(abs($percentageIncrease), 1) }}%</span>
                                            <span class="text-muted small pt-2 ps-1">diminué</span>
                                        @else
                                            <span class="text-muted small pt-1 fw-bold">0%</span>
                                            <span class="text-muted small pt-2 ps-1">pas de changement</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Visitors Card -->

                    <!-- ABB Check Card -->
                    <div class="col-xxl-3 col-xl-12">
                        <div class="card info-card customers-card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filtrer</h6>
                                    </li>
                                    <li>
                                        <a class="dropdown-item {{ $abbCheckPeriod === 'day' ? 'active' : '' }}"
                                            href="{{ route('visitors.dashboard', ['abbcheck_period' => 'day', 'visitor_period' => $visitorPeriod, 'request_period' => $requestPeriod, 'blog_period' => $blogPeriod]) }}">
                                            Aujourd'hui
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item {{ $abbCheckPeriod === 'month' ? 'active' : '' }}"
                                            href="{{ route('visitors.dashboard', ['abbcheck_period' => 'month', 'visitor_period' => $visitorPeriod, 'request_period' => $requestPeriod, 'blog_period' => $blogPeriod]) }}">
                                            Ce mois
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item {{ $abbCheckPeriod === 'year' ? 'active' : '' }}"
                                            href="{{ route('visitors.dashboard', ['abbcheck_period' => 'year', 'visitor_period' => $visitorPeriod, 'request_period' => $requestPeriod, 'blog_period' => $blogPeriod]) }}">
                                            Cette année
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">ABB Check
                                    <span>|
                                        @switch($abbCheckPeriod)
                                            @case('day')
                                                Aujourd'hui
                                            @break

                                            @case('month')
                                                Ce mois
                                            @break

                                            @case('year')
                                                Cette année
                                            @break
                                        @endswitch
                                    </span>
                                </h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-newspaper"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $totalAbbChecks }}</h6>
                                        @if ($percentageIncreaseAbbChecks > 0)
                                            <span
                                                class="text-success small pt-1 fw-bold">{{ number_format($percentageIncreaseAbbChecks, 1) }}%</span>
                                            <span class="text-muted small pt-2 ps-1">augmenté</span>
                                        @elseif($percentageIncreaseAbbChecks < 0)
                                            <span
                                                class="text-danger small pt-1 fw-bold">{{ number_format(abs($percentageIncreaseAbbChecks), 1) }}%</span>
                                            <span class="text-muted small pt-2 ps-1">diminué</span>
                                        @else
                                            <span class="text-muted small pt-1 fw-bold">0%</span>
                                            <span class="text-muted small pt-2 ps-1">pas de changement</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End ABB Check Card -->

                    <!-- Blogs Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filtrer</h6>
                                    </li>
                                    <li>
                                        <a class="dropdown-item {{ $blogPeriod === 'day' ? 'active' : '' }}"
                                            href="{{ route('visitors.dashboard', ['blog_period' => 'day', 'visitor_period' => $visitorPeriod, 'request_period' => $requestPeriod, 'abbcheck_period' => $abbCheckPeriod]) }}">
                                            Aujourd'hui
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item {{ $blogPeriod === 'month' ? 'active' : '' }}"
                                            href="{{ route('visitors.dashboard', ['blog_period' => 'month', 'visitor_period' => $visitorPeriod, 'request_period' => $requestPeriod, 'abbcheck_period' => $abbCheckPeriod]) }}">
                                            Ce mois
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item {{ $blogPeriod === 'year' ? 'active' : '' }}"
                                            href="{{ route('visitors.dashboard', ['blog_period' => 'year', 'visitor_period' => $visitorPeriod, 'request_period' => $requestPeriod, 'abbcheck_period' => $abbCheckPeriod]) }}">
                                            Cette année
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Blogs
                                    <span>|
                                        @switch($blogPeriod)
                                            @case('day')
                                                Aujourd'hui
                                            @break

                                            @case('month')
                                                Ce mois
                                            @break

                                            @case('year')
                                                Cette année
                                            @break
                                        @endswitch
                                    </span>
                                </h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-file-text"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $totalBlogs }}</h6>
                                        @if ($percentageIncreaseBlogs > 0)
                                            <span
                                                class="text-success small pt-1 fw-bold">{{ number_format($percentageIncreaseBlogs, 1) }}%</span>
                                            <span class="text-muted small pt-2 ps-1">augmenté</span>
                                        @elseif($percentageIncreaseBlogs < 0)
                                            <span
                                                class="text-danger small pt-1 fw-bold">{{ number_format(abs($percentageIncreaseBlogs), 1) }}%</span>
                                            <span class="text-muted small pt-2 ps-1">diminué</span>
                                        @else
                                            <span class="text-muted small pt-1 fw-bold">0%</span>
                                            <span class="text-muted small pt-2 ps-1">pas de changement</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Blogs Card -->

                    <!-- Reports -->
                    <div class="col-12">
                        <div class="card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filtrer</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Aujourd'hui</a></li>
                                    <li><a class="dropdown-item" href="#">Ce mois</a></li>
                                    <li><a class="dropdown-item" href="#">Cette année</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Rapport<span>/Statistiques</span></h5>

                                <!-- Line Chart -->
                                <div id="reportsChart"></div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        const chartSeries = @json($chartSeries);
                                        const chartCategories = @json($chartCategories);

                                        new ApexCharts(document.querySelector("#reportsChart"), {
                                            series: chartSeries,
                                            chart: {
                                                height: 350,
                                                type: 'area',
                                                toolbar: {
                                                    show: false
                                                },
                                            },
                                            markers: {
                                                size: 4
                                            },
                                            colors: ['#4154f1', '#2eca6a', '#ff771d', '#b50505'],
                                            fill: {
                                                type: "gradient",
                                                gradient: {
                                                    shadeIntensity: 1,
                                                    opacityFrom: 0.3,
                                                    opacityTo: 0.4,
                                                    stops: [0, 90, 100]
                                                }
                                            },
                                            dataLabels: {
                                                enabled: false
                                            },
                                            stroke: {
                                                curve: 'smooth',
                                                width: 2
                                            },
                                            xaxis: {
                                                type: 'datetime',
                                                categories: chartCategories
                                            },
                                            tooltip: {
                                                x: {
                                                    format: 'dd/MM/yy'
                                                },
                                            }
                                        }).render();
                                    });
                                </script>

                                <!-- End Line Chart -->

                            </div>

                        </div>
                    </div><!-- End Reports -->
                </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.add-depense');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const form = this.closest('form');

                    Swal.fire({
                        title: 'Voulez-vous reellement ajouter?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Oui, Ajouter!',
                        cancelButtonText: 'Annuler'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                            Swal.fire({
                                icon: "success",
                                title: "Bande ajoute avec succes",
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
