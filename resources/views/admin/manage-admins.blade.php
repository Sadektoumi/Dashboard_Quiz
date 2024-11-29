@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-3 content">
        <h3 class="mb-4">Manage Admins</h3>

        <button class="btn btn-custom mb-3" data-toggle="modal" data-target="#addAdminModal">
            <i class="fas fa-plus"></i> Add Admin
        </button>

        <table id="admins-table" class="table table-striped">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admins as $admin)
                    <tr>
                        <td>{{ $admin->first_name }}</td>
                        <td>{{ $admin->last_name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->role }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editAdminModal"
                                data-id="{{ $admin->id }}"
                                data-first_name="{{ $admin->first_name }}"
                                data-last_name="{{ $admin->last_name }}"
                                data-email="{{ $admin->email }}">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <a href="{{ route('admin.destroy', $admin->id) }}" class="btn btn-danger btn-sm"
                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $admin->id }}').submit();">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                            <form id="delete-form-{{ $admin->id }}" action="{{ route('admin.destroy', $admin->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add Admin Modal -->
    <div class="modal fade" id="addAdminModal" tabindex="-1" role="dialog" aria-labelledby="addAdminModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAdminModalLabel">Add New Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required minlength="8">
                        </div>
                        <button type="submit" class="btn btn-custom btn-primary">Add Admin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Admin Modal -->
    <div class="modal fade" id="editAdminModal" tabindex="-1" role="dialog" aria-labelledby="editAdminModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAdminModalLabel">Edit Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editAdminForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="edit_first_name">First Name</label>
                            <input type="text" class="form-control" id="edit_first_name" name="first_name" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_last_name">Last Name</label>
                            <input type="text" class="form-control" id="edit_last_name" name="last_name" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_email">Email address</label>
                            <input type="email" class="form-control" id="edit_email" name="email" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Admin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('scripts')

@endsection


