@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-3 content">
        <h3 class="mb-4">Manage Quizzes</h3>

        <button class="btn btn-custom mb-3" data-toggle="modal" data-target="#addQuizModal">
            <i class="fas fa-plus"></i> Add Quiz
        </button>

        <table id="quizzes-table" class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Time Limit</th>
                    <th>Attempts Allowed</th>
                    <th>Points</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($quizzes as $quiz)
                    <tr>
                    <td>{{ $quiz->Title }}</td>
                        <td>{{ $quiz->date }}</td>
                        <td>{{ $quiz->time_limit }} minutes</td>
                        <td>{{ $quiz->attempts_allowed }}</td>
                        <td>{{ $quiz->points }}</td>
                        <td>{{ $quiz->category->name }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editQuizModal"
                                data-id="{{ $quiz->id }}"
                                data-date="{{ $quiz->date }}"
                                data-time_limit="{{ $quiz->time_limit }}"
                                data-attempts_allowed="{{ $quiz->attempts_allowed }}"
                                data-points="{{ $quiz->points }}"
                                data-instructions="{{ $quiz->instructions }}"
                                data-category_id="{{ $quiz->category_id }}">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <a href="{{ route('quiz.destroy', $quiz->id) }}" class="btn btn-danger btn-sm"
                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $quiz->id }}').submit();">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                            <form id="delete-form-{{ $quiz->id }}" action="{{ route('quiz.destroy', $quiz->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add Quiz Modal -->
    <div class="modal fade" id="addQuizModal" tabindex="-1" role="dialog" aria-labelledby="addQuizModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addQuizModalLabel">Add New Quiz</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('quiz.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="Title">Title</label>
                            <input type="text" class="form-control" id="Title" name="Title" required>
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>
                        <div class="form-group">
                            <label for="time_limit">Time Limit (minutes)</label>
                            <input type="number" class="form-control" id="time_limit" name="time_limit" required>
                        </div>
                        <div class="form-group">
                            <label for="attempts_allowed">Attempts Allowed</label>
                            <input type="number" class="form-control" id="attempts_allowed" name="attempts_allowed" required>
                        </div>
                        <div class="form-group">
                            <label for="points">Points</label>
                            <input type="number" class="form-control" id="points" name="points" required>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" id="category_id" name="category_id" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="instructions">Instructions</label>
                            <textarea class="form-control" id="instructions" name="instructions"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Quiz</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Quiz Modal -->
    <div class="modal fade" id="editQuizModal" tabindex="-1" role="dialog" aria-labelledby="editQuizModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editQuizModalLabel">Edit Quiz</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editQuizForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="Title">Title</label>
                            <input type="text" class="form-control" id="Title" name="Title" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_date">Date</label>
                            <input type="date" class="form-control" id="edit_date" name="date" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_time_limit">Time Limit (minutes)</label>
                            <input type="number" class="form-control" id="edit_time_limit" name="time_limit" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_attempts_allowed">Attempts Allowed</label>
                            <input type="number" class="form-control" id="edit_attempts_allowed" name="attempts_allowed" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_points">Points</label>
                            <input type="number" class="form-control" id="edit_points" name="points" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_category_id">Category</label>
                            <select class="form-control" id="edit_category_id" name="category_id" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_instructions">Instructions</label>
                            <textarea class="form-control" id="edit_instructions" name="instructions"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Quiz</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
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
@endsection
