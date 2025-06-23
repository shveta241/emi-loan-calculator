<!DOCTYPE html>
<html>
<head>
    <title>EMI Loan Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    @auth
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">EMI Loan Calculator</a>
            <div>
                <a class="btn btn-outline-light me-2 @if(request()->routeIs('loan.index')) active @endif"
                   href="{{ route('loan.index') }}">
                    Loan Details
                </a>
                <a class="btn btn-outline-light me-2 @if(request()->routeIs('emi.process.form')) active @endif"
                   href="{{ route('emi.process.form') }}">
                    Process EMI
                </a>
                <a class="btn btn-outline-light me-2 @if(request()->routeIs('emi.calculate.form')) active @endif"
                href="{{ route('emi.calculate.form') }}">
                    EMI Calculator
                </a>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-danger btn-sm" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    @endauth

    <div class="container">
        @yield('content')
    </div>
</body>
</html>