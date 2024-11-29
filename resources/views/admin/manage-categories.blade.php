

@section('content')
    <div class="container-fluid mt-3 content">
        <h3 class="mb-4">Manage Categories</h3>

        <button class="btn btn-custom mb-3" data-toggle="modal" data-target="#addCategoryModal">
            <i class="fas fa-plus"></i> Add Category
        </button>

        <table id="categories-table" class="table table-striped">
            <thead>
                <tr>
                    <th>Category Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editCategoryModal"
                                data-id="{{ $category->id }}"
                                data-name="{{ $category->name }}"
                                data-description="{{ $category->description }}">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <a href="{{ route('category.destroy', $category->id) }}" class="btn btn-danger btn-sm"
                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $category->id }}').submit();">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                            <form id="delete-form-{{ $category->id }}" action="{{ route('category.destroy', $category->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add Category Modal -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-custom btn-primary">Add Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Category Modal -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editCategoryForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="edit_name">Category Name</label>
                            <input type="text" class="form-control" id="edit_name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_description">Description</label>
                            <textarea class="form-control" id="edit_description" name="description" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @extends('layouts.app')


    <div class="container-fluid mt-3 content">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <h3 class="mb-4">Manage Categories</h3>


    </div>



@endsection


