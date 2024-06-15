<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To Do List</title>

    <!-- Include the Indie Flower font from Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap">

    <style>
        body {
            background-color: #FFF9D0;
            font-family: 'Indie Flower', cursive; /* Apply the Indie Flower font to the whole body */
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #5AB2FF; 
            color: white; /* Text color */
            padding: 20px; 
            text-align: center; /* Center text */
        }

        .task-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .task-label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .task-detail {
            margin-bottom: 20px;
        }

        .go-back-link {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #5AB2FF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .go-back-link:hover {
            background-color: #4584d4;
        }
    </style>
</head>
<body>
    <header>
        <h1>To Do List</h1>
    </header>  
    <br>
    <a href="{{url()->previous()}}" class="go-back-link">Go Back</a>

    <div class="task-container">
        <div class="task-detail">
            <span class="task-label">Task:</span>
            <p>{{$todo->title}}</p>
        </div>
        <div class="task-detail">
            <span class="task-label">What to do on your Task:</span>
            <p>{{$todo->description}}</p>
        </div>
    </div>
</body>
</html>
