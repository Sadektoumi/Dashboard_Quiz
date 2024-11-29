@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-3 content">
        <h3 class="mb-4">Manage Questions</h3>

        <button class="btn btn-custom mb-3" data-toggle="modal" data-target="#addQuestionModal">
            <i class="fas fa-plus"></i> Add Question
        </button>

        <table id="questions-table" class="table table-striped">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Quiz</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($questions as $question)
                    <tr>
                        <td>{{ $question->question }}</td>
                        <td>{{ $question->quiz->Title }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editQuestionModal"
                                data-id="{{ $question->id }}"
                                data-question="{{ $question->question }}"
                                data-quiz_id="{{ $question->quiz_id }}">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <a href="{{ route('question.destroy', $question->id) }}" class="btn btn-danger btn-sm"
                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $question->id }}').submit();">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                            <form id="delete-form-{{ $question->id }}" action="{{ route('question.destroy', $question->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add Question Modal -->
    <div class="modal fade" id="addQuestionModal" tabindex="-1" role="dialog" aria-labelledby="addQuestionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addQuestionModalLabel">Add New Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('question.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" class="form-control" id="question" name="question" required>
                        </div>
                        <div class="form-group">
                            <label for="quiz_id">Quiz</label>
                            <select class="form-control" id="quiz_id" name="quiz_id" required>
                                @foreach($quizzes as $quiz)
                                    <option value="{{ $quiz->id }}">{{ $quiz->Title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Question</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Question Modal -->
    <div class="modal fade" id="editQuestionModal" tabindex="-1" role="dialog" aria-labelledby="editQuestionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editQuestionModalLabel">Edit Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editQuestionForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="edit_question">Question</label>
                            <input type="text" class="form-control" id="edit_question" name="question" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_quiz_id">Quiz</label>
                            <select class="form-control" id="edit_quiz_id" name="quiz_id" required>
                                @foreach($quizzes as $quiz)
                                    <option value="{{ $quiz->id }}">{{ $quiz->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Question</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
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
@endsection
