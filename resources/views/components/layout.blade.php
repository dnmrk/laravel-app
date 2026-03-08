@props([
    'title' => 'Laracasts'
])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <style>
        .max-w-400 {
            max-width: 400px;
            margin: auto;
        }   
        .card {
            background-color: #a6b0b8; 
            padding: 1rem;
            color: white; 
            text-align: center;
        }
    </style>
</head> 

<body>
    <nav>
        <a href="/">Home</a>
        <a href="/about">About</a>
        <a href="/contact">Contact</a>
    </nav>
    <main>{{ $slot }}</main>
</body>

</html>