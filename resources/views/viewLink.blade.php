<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Link</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            padding: 50px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
        }
        h1 {
            font-size: 2.5rem;
            margin-bottom: 30px;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            margin-bottom: 15px;
        }
        .link-details {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .link-details li {
            font-size: 1.1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">View Link Details</h1>
        <div class="link-details">
            <ul>
                <li><strong>ID:</strong> {{ $shortUrl->id }}</li>
                <li><strong>Original URL:</strong> {{ $shortUrl->link }}</li>
                <li><strong>Shortened Code:</strong> {{ $shortUrl->code }}</li>
            </ul>
        </div>
    </div>
</body>
</html>
