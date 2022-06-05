<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hello, World</title>
</head>
<body>
    Hello From HTML5 world!
    <p>Today is  {{$date}}</p>
    <p>Message of the day {{$message}}</p>

    <pre>
        <?php dd($request);?>
    </pre>

    <form method="GET">
        <label>
            <input type="text" name="txt" />
        </label>
        <button type="button">Submit me!</button>
    </form>

</body>
</html>
