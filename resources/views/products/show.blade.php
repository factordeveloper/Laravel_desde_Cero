<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>{{ $element-> title }} ({{ $element-> id }})</h1>
    <h3>{{ $element-> description }}</h3>
    <h3>{{ $element-> price }}</h3>
    <h3>{{ $element-> stock }}</h3>
    <h3>{{ $element-> status }}</h3>

      {!! $html !!}

</body>
</html>