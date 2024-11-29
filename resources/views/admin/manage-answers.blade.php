@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-3 content">
        <h3 class="mb-4">Manage Answers</h3>

        <button class="btn btn-custom mb-3" data-toggle="modal" data-target="#addAnswerModal">
            <i class="fas fa-plus"></i> Add Answer
        </button>

        <table id="answers-table" class="table table-striped">
            <thead>
                <tr>
                    <th>Answer</th>
                    <th>Question</th>
                    <th>Is Correct</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($answers as $answer)
                    <tr>
                        <td>{{ $answer->answer }}</td>
                        <td>{{ $answer->question->question }}</td>
                        <td>{{ $answer->is_correct ? 'Yes' : 'No' }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editAnswerModal"
                                data-id="{{ $answer->id }}"
                                data-answer="{{ $answer->answer }}"
                                data-question_id="{{ $answer->question_id }}"
                                data-is_correct="{{ $answer->is_correct }}">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <a href="{{ route('answer.destroy', $answer->id) }}" class="btn btn-danger btn-sm"
                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $answer->id }}').submit();">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                            <form id="delete-form-{{ $answer->id }}" action="{{ route('answer.destroy', $answer->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add Answer Modal -->
    <div class="modal fade" id="addAnswerModal" tabindex="-1" role="dialog" aria-labelledby="addAnswerModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAnswerModalLabel">Add New Answer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('answer.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="answer">Answer</label>
                            <input type="text" class="form-control" id="answer" name="answer" required>
                        </div>
                        <div class="form-group">
                            <label for="question_id">Question</label>
                            <select class="form-control" id="question_id" name="question_id" required>
                                @foreach($questions as $question)
                                    <option value="{{ $question->id }}">{{ $question->question }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="is_correct">Is Correct</label>
                            <select class="form-control" id="is_correct" name="is_correct" required>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Answer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Answer Modal -->
    <div class="modal fade" id="editAnswerModal" tabindex="-1" role="dialog" aria-labelledby="editAnswerModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAnswerModalLabel">Edit Answer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editAnswerForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="edit_answer">Answer</label>
                            <input type="text" class="form-control" id="edit_answer" name="answer" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_question_id">Question</label>
                            <select class="form-control" id="edit_question_id" name="question_id" required>
                                @foreach($questions as $question)
                                    <option value="{{ $question->id }}">{{ $question->question }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_is_correct">Is Correct</label>
                            <select class="form-control" id="edit_is_correct" name="is_correct" required>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Answer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
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
@endsection
