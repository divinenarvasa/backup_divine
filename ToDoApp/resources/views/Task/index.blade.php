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
            background-color: #FFF9D0; /* Retain the specified background color */
            font-family: 'Indie Flower', cursive; /* Apply the Indie Flower font to the whole body */
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #5AB2FF; 
            color: white; /* Text color */
            padding: 20px; 
            text-align: center; /* Center text */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add shadow */
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff; /* White background */
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Add shadow */
        }

        .table {
            width: 100%; /* Set the width of the table */
            border-collapse: collapse; /* Collapse table borders */
            margin-top: 20px; /* Add margin at the top */
        }

        .table th,
        .table td {
            border: 1px solid #ddd; /* Add border to table cells */
            padding: 10px; /* Add padding to table cells */
            text-align: left; /* Align text to the left */
        }

        .table th {
            background-color: #f2f2f2; /* Background color for table header cells */
        }

        .table th:first-child,
        .table td:first-child {
            border-left: none; /* Remove left border from first column */
        }

        .table th:last-child,
        .table td:last-child {
            border-right: none; /* Remove right border from last column */
        }

        .btn-container {
            display: flex;
            justify-content: center;
        }

        .btn {
            margin-right: 5px;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-success {
            background-color: #5AB2FF;
            color: white;
        }

        .btn-danger {
            background-color: #FF6347;
            color: white;
        }

        .btn-info {
            background-color: #A9A9A9;
            color: white;
        }

        .btn-info:hover {
            background-color: #4584d4;
        }

        /* New CSS for positioning the Create Tasks link */
        .create-task-link {
            text-align: left;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>To Do List</h1>
    </header>  

    <div class="container">
        <div class="create-task-link">
            <a class="btn btn-sm btn-info" href="{{ route('dashboard') }}">Back</a>
        </div>

        @if (Session::has('alert-success'))
            <div class="success-message">
                {{ Session::get('alert-success') }}
            </div>
        @endif

        @if (Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('error') }}
            </div>
        @endif

        @if (Session::has('alert-info'))
            <div class="alert alert-info" role="alert">
                {{ Session::get('alert-info') }}
            </div>
        @endif

        @if (count($todos))
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Completed</th>
                        <th>Action</th> <!-- Added Action column -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($todos as $todo)
                        <tr>
                            <td>{{ $todo->title }}</td>
                            <td>{{ $todo->description }}</td>
                            <td>
                                @if ($todo->completed == 1)
                                    <button class="btn btn-success" disabled>Completed</button>
                                @else
                                    <button class="btn btn-danger" disabled>Incomplete</button>
                                @endif
                            </td>
                            <td class="btn-container"> 
                                <a class="btn btn-success" href="{{ route('tasks.show', $todo->id) }}">View</a>
                                <a class="btn btn-info" href="{{ route('tasks.edit', $todo->id) }}">Edit</a>
                                <form method="post" action="{{ route('tasks.destroy') }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="todo_id" value="{{ $todo->id }}">
                                    <input class="btn btn-danger" type="submit" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h4>No Task Created Yet</h4>
        @endif
    </div>
</body>
</html>
