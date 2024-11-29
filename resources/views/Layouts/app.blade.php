<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">



    <style>
        /* Sidebar styling */
.sidebar {
    background-color: #343a40;
    height: 100vh;
    width: 250px;
    position: fixed;
    top: 0;
    left: 0;
    color: #fff;
    overflow-y: auto;
}

.sidebar .text-white {
    color: #fff;
}

.sidebar .nav-link {
    color: #adb5bd;
    border-radius: 20px;
    margin-bottom: 10px;
    padding: 10px;
    transition: background-color 0.3s, color 0.3s;
}

.sidebar .nav-link.active,
.sidebar .nav-link:hover {
    background-color: #495057;
    color: #fff;
}

.sidebar .nav-link i {
    margin-right: 10px;
}

.sidebar .nav-link.d-flex {
    display: flex;
    align-items: center;
}

        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
            height: 100%;
            width: 250px;
            background-color: #343a40;
        }
        .sidebar .nav-link {
            color: #ffffff;
        }
        .sidebar .nav-link:hover {
            color: #adb5bd;
            background-color: #495057;
        }
        .sidebar .nav-link.active {
            background-color: #495057;
            border-left: 4px solid #007bff;
        }
        .content {
            margin-left: 20px;
            margin-right: 20px;
            width: 100%;



        }
        .navbar-custom {
            background-color: #343a40;
        }


        .sidebar {
            background-color: #343a40;
            height: 100vh;
            position: fixed;
            width: 250px;
            top: 0;
            left: 0;
            color: #fff;
            padding-top: 20px;
        }
        .sidebar .nav-link {
            color: #fff;
            border-radius: 20px;
        }
        .sidebar .nav-link.active {
            background-color: #495057;
            border-radius: 20px;
        }
        .table thead th {
            background-color: #343a40;
            color: #fff;

        }
        .table tbody {
            border-radius:20px;



        }
        .btn-custom {
            background-color: #343a40;
            color: #fff;
            border-radius: 20px;
        }
        .btn-custom:hover {
            background-color: #495057;
        }
        .btn-warning {
            border-radius: 20px;


        }
        .btn-danger{
            border-radius: 20px;


        }



    </style>
</head>

<body>
    @include('layouts.sidebar')
    @include('layouts.navbar')
    <div class="content">

        <div class="container">
            @yield('content')
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>





    <!-- EDIT ADMIN -->
    <script>
        $(document).ready(function() {
            $('#admins-table').DataTable({

            });

            $('#editAdminModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var first_name = button.data('first_name');
                var last_name = button.data('last_name');
                var email = button.data('email');

                var modal = $(this);
                modal.find('#editAdminForm').attr('action', '/admin/' + id);
                modal.find('#edit_first_name').val(first_name);
                modal.find('#edit_last_name').val(last_name);
                modal.find('#edit_email').val(email);
            });
        });
    </script>

    <!-- edit Category -->
      <script>
        $(document).ready(function() {
            $('#categories-table').DataTable({

            });

            $('#editCategoryModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var name = button.data('name');
                var description = button.data('description');

                var modal = $(this);
                modal.find('#editCategoryForm').attr('action', '/categories/' + id);
                modal.find('#edit_name').val(name);
                modal.find('#edit_description').val(description);
            });
        });
    </script>


<script>
        $(document).ready(function() {
            $('#users-table').DataTable({

            });

            $('#editAdminModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var first_name = button.data('first_name');
                var last_name = button.data('last_name');
                var email = button.data('email');

                var modal = $(this);
                modal.find('#editAdminForm').attr('action', '/admin/' + id);
                modal.find('#edit_first_name').val(first_name);
                modal.find('#edit_last_name').val(last_name);
                modal.find('#edit_email').val(email);
            });
        });
    </script>
    <!-- Quiz script -->
        <script>
        $(document).ready(function() {
            $('#quizzes-table').DataTable({
                "dom": '<"top"f>rt<"bottom"p><"clear">'
            });

            $('#editQuizModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var date = button.data('date');
                var time_limit = button.data('time_limit');
                var attempts_allowed = button.data('attempts_allowed');
                var points = button.data('points');
                var instructions = button.data('instructions');
                var category_id = button.data('category_id');

                var modal = $(this);
                modal.find('#editQuizForm').attr('action', '/quizzes/' + id);
                modal.find('#edit_date').val(date);
                modal.find('#edit_time_limit').val(time_limit);
                modal.find('#edit_attempts_allowed').val(attempts_allowed);
                modal.find('#edit_points').val(points);
                modal.find('#edit_instructions').val(instructions);
                modal.find('#edit_category_id').val(category_id);
            });
        });
    </script>

    <!-- qUESTION sCRIPT -->
        <script>
        $(document).ready(function() {
            $('#questions-table').DataTable({
                "dom": '<"top"f>rt<"bottom"p><"clear">'
            });

            $('#editQuestionModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var question = button.data('question');
                var quiz_id = button.data('quiz_id');

                var modal = $(this);
                modal.find('#editQuestionForm').attr('action', '/questions/' + id);
                modal.find('#edit_question').val(question);
                modal.find('#edit_quiz_id').val(quiz_id);
            });
        });
    </script>

    <!-- Answer Script -->
        <script>
        $(document).ready(function() {
            $('#answers-table').DataTable({
                "dom": '<"top"f>rt<"bottom"p><"clear">'
            });

            $('#editAnswerModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var answer = button.data('answer');
                var question_id = button.data('question_id');
                var is_correct = button.data('is_correct');

                var modal = $(this);
                modal.find('#editAnswerForm').attr('action', '/answers/' + id);
                modal.find('#edit_answer').val(answer);
                modal.find('#edit_question_id').val(question_id);
                modal.find('#edit_is_correct').val(is_correct);
            });
        });
    </script>
</body>
</html>
