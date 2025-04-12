<!DOCTYPE html>

    <head>
        

        <title>About</title>

    </head>
    <body>
    <h1>About Us</h1>

    <ul>
        @foreach($tasks as $task)
            <li>{{ $task }}</li>

        @endforeach
        </ul>
      
    </body>
</html>
