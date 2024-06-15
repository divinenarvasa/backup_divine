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
        }

        header {
            background-color: #5AB2FF; 
            color: white; /* Text color */
            padding: 10px; 
            text-align: center; /* Center text */
            cursor: pointer; /* Change cursor to pointer when hovering over the header */
        }

        .container {
            display: flex;
            flex-direction: column; /* Stack items vertically */
            align-items: center; /* Center items horizontally */
            margin-top: 20px; /* Add space at the top */
        }

        .edit-section {
            width: 100%; /* Set width to 100% */
            max-width: 600px; /* Limit maximum width */
            margin-top: 20px; /* Add space at the top */
            background-color: #ffffff; /* White background color */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add shadow */
        }

        .edit-form input[type="text"],
        .edit-form select {
            width: 100%; /* Set width to 100% */
            margin-bottom: 10px; /* Add margin at the bottom */
            padding: 10px; /* Add padding */
            border: 1px solid #ddd; /* Add border */
            border-radius: 5px; /* Add border radius */
        }

        .edit-form button[type="submit"] {
            width: 100%; /* Make button full width */
            padding: 10px; /* Add padding */
            border: none; /* Remove border */
            background-color: #5AB2FF; /* Button color */
            color: white; /* Text color */
            border-radius: 5px; /* Add border radius */
            cursor: pointer; /* Change cursor to pointer */
            transition: background-color 0.3s ease; /* Add transition */
        }

        .edit-form button[type="submit"]:hover {
            background-color: #4584d4; /* Change color on hover */
        }

        .edit-form label {
            margin-bottom: 5px; /* Add margin at the bottom */
            display: block; /* Make label a block element */
        }
    </style>
</head>
<body>
    <header onclick="window.location='{{ route('tasks.index') }}';">
        <h1>To Do List</h1>
    </header>
    <div class="container">
        <!-- To Do List -->

        <!-- Edit Section -->
        <div class="edit-section">
            <h2>Edit Section</h2>
            <br>
            <form class="edit-form" method="post" action="{{ route('tasks.update') }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="todo_id" value="{{$todo->id}}">
                <label for="titleInput">Title</label>
                <input type="text" id="titleInput" name="title" placeholder="Title" value="{{$todo->title}}">
                <label for="descriptionInput">Description</label>
                <input type="text" id="descriptionInput" name="description" placeholder="Description" value="{{$todo->description}}">
                <label for="statusSelect">Status</label>
                <select name="completed" id="statusSelect">
                    <option disabled selected>Select Option</option>
                    <option value="1">Completed</option>
                    <option value="0">Incomplete</option>
                </select>
                <button type="submit">Update</button>
            </form>
        </div>
    </div>
</body>
</html>
