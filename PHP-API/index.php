<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        fetch('http://localhost/inscription.php',{method : "POST"})
            .then(response => response.json())
            .then(data => console.log(data))
    </script>
</body>
</html>