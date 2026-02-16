<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TransportCompany')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root{
            --tc-bg:#0b0d10;
            --tc-card:#12161c;
            --tc-border:#2a3038;
            --tc-text:#e9eef5;
            --tc-muted:#9aa4b2;
            --tc-orange:#ff8a00;
        }
        body{background:var(--tc-bg);color:var(--tc-text);}
        .tc-card{background:var(--tc-card);border:1px solid var(--tc-border);border-radius:14px;}
        a{color:var(--tc-orange);} a:hover{color:#ffa733;}
        .btn-tc{background:var(--tc-orange);border-color:var(--tc-orange);color:#111;font-weight:600;}
        .btn-tc:hover{background:#ffa733;border-color:#ffa733;}
        .btn-outline-tc{border-color:var(--tc-orange);color:var(--tc-orange);}
        .btn-outline-tc:hover{background:var(--tc-orange);color:#111;}
        .form-control,.form-select{background:#0f1318;border-color:var(--tc-border);color:var(--tc-text);}
        .form-control:focus,.form-select:focus{border-color:var(--tc-orange);box-shadow:0 0 0 .2rem rgba(255,138,0,.15);}
        .table-dark.tc-table{
            --bs-table-bg:var(--tc-card);
            --bs-table-border-color:var(--tc-border);
        }
        .pagination .page-link{background:#0f1318;border-color:var(--tc-border);color:var(--tc-text);}
        .pagination .page-link:hover{border-color:var(--tc-orange);color:var(--tc-orange);}
        .pagination .active .page-link{background:var(--tc-orange);border-color:var(--tc-orange);color:#111;}
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
@include('partials.nav')
<div class="container my-4">
    @if (!request()->is('error'))
        @include('partials.flash')
    @endif
    @yield('content')
</div>
@include('partials.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

