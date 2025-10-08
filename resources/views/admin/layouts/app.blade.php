<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heaven League - Administration</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        :root {
            --sidebar-width: 260px;
            --sidebar-bg: #1a1a27;
            --sidebar-hover: rgba(255, 255, 255, 0.1);
            --primary-color: #009ef7;
        }

        body {
            background-color: #f5f8fa;
        }

        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background-color: var(--sidebar-bg);
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        .sidebar .nav-link {
            color: #9899ac;
            padding: 0.65rem 1rem;
            border-radius: 0.475rem;
            transition: all 0.3s ease;
        }

        .sidebar .nav-link:hover {
            color: #fff;
            background-color: var(--sidebar-hover);
        }

        .sidebar .nav-link.active {
            color: #fff;
            background-color: var(--primary-color);
        }

        .hover-primary:hover {
            background-color: rgba(0, 158, 247, 0.1) !important;
            color: var(--primary-color) !important;
        }

        /* Navbar Styles */
        .navbar {
            height: 65px;
            background-color: #fff;
            box-shadow: 0 10px 30px 0 rgba(82, 63, 105, .05);
        }

        .navbar .nav-link {
            color: #5e6278;
            padding: 0.65rem 1rem;
        }

        .navbar .nav-link:hover {
            color: var(--primary-color);
        }

        /* Main Content Styles */
        .main-content {
            /* margin-left: var(--sidebar-width); */
            transition: all 0.3s ease;
        }

        /* Cards & Components */
        .card {
            border-radius: 0.625rem;
            box-shadow: 0 0 20px 0 rgba(76, 87, 125, .02);
        }

        .btn-link {
            color: #5e6278;
            text-decoration: none;
        }

        .btn-link:hover {
            color: var(--primary-color);
        }

        /* Responsive */
        @media (max-width: 991.98px) {
            .sidebar {
                margin-left: calc(-1 * var(--sidebar-width));
            }

            .sidebar.show {
                margin-left: 0;
            }

            .main-content {
                margin-left: 0;
            }
        }

        /* Utils */
        .fs-7 {
            font-size: 0.95rem;
        }

        /* Transitions */
        .nav-link .fas.fa-chevron-right {
            transition: transform 0.3s ease;
        }

        .nav-link[aria-expanded="true"] .fas.fa-chevron-right {
            transform: rotate(90deg);
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        @include('admin.layouts.sidebar')

        <!-- Main Content Wrapper -->
        <div class="main-content flex-grow-1">
            <!-- Navbar -->
            @include('admin.layouts.navbar')

            <!-- Main content -->
            <main class="px-4 py-4">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle Sidebar
        document.getElementById('sidebarToggle')?.addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('show');
        });

        // Collapse arrows rotation
        document.querySelectorAll('[data-bs-toggle="collapse"]').forEach(element => {
            element.addEventListener('click', function() {
                const icon = this.querySelector('.fa-chevron-right');
                if (icon) {
                    icon.style.transform = icon.style.transform === 'rotate(90deg)' ? 'rotate(0deg)' :
                        'rotate(90deg)';
                }
            });
        });
    </script>
    @stack('scripts')
</body>

</html>
