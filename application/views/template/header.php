<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= isset($title) ? $title : 'Dashboard Hotel' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/270/270014.png" type="image/png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- Bootstrap & Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- DataTables CSS (optional) -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <!-- Custom Global Styles -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            overflow-x: hidden;
        }

        /* Sidebar Styles */
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background: linear-gradient(to bottom, #0d6efd, #0a58ca);
            color: white;
            z-index: 1000;
            transition: width 0.3s;
            overflow-x: hidden;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }

        .sidebar.closed {
            width: 70px;
        }

        .sidebar .nav-link {
            color: white;
            padding: 10px 15px;
            border-radius: 8px;
            transition: background 0.3s ease;
        }

        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.15);
        }

        .sidebar .link-text {
            transition: all 0.3s ease;
        }

        .sidebar.closed .link-text {
            display: none;
        }

        .sidebar .sidebar-title {
            font-weight: 600;
            transition: opacity 0.3s ease;
        }

        .sidebar.closed .sidebar-title {
            display: none;
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        .main-content.full {
            margin-left: 70px;
        }

        /* Tables */
        .table thead {
            background-color: #e7f1ff;
        }

        /* Buttons */
        .btn-primary, .btn-success {
            border-radius: 6px;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: absolute;
                width: 250px;
                z-index: 1050;
            }

            .sidebar.closed {
                width: 0;
            }

            .main-content {
                margin-left: 0 !important;
            }
        }
    </style>
</head>
<body>
