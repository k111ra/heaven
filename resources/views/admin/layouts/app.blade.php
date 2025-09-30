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
        .sidebar {
            min-height: 120vh;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
        }

        .nav-link {
            color: #ffffff;
            padding: .5rem 1rem;
            margin-bottom: .2rem;
        }

        .nav-link:hover {
            background-color: rgba(255, 255, 255, .1);
            color: #ffffff;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">

            @include('admin.layouts.sidebar')


            <!-- Main content -->
            <main class="col-md-10 ms-sm-auto px-4">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
