<!DOCTYPE html>
<html>
<head>
    <title>License Error</title>
</head>
<body>
    <h1>License Error Notification</h1>
    <p>An error has been detected regarding your license:</p>
    <ul>
        <li>Error: {{ $error }}</li>
        <li>Host: {{ $host }}</li>
        <li>Contact: {{ $contact }}</li>
        <li>Website: <a href="{{ $website }}">{{ $website }}</a></li>
    </ul>
</body>
</html>