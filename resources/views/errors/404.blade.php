<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 Not Found</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
        }

        .error-container {
            text-align: center;
        }

        .error-code {
            font-size: 144px;
            font-weight: bold;
            color: #343a40;
        }

        .error-message {
            font-size: 24px;
            margin-bottom: 30px;
        }

        .back-to-home {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="error-container">
    <div class="error-code">404</div>
    <div class="error-message">Page Not Found</div>
    <p>The page you are looking for might be under construction or does not exist.</p>
    <a href="{{ url('/') }}" class="back-to-home">Back to Home</a>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
