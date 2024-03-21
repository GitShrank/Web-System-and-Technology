<!-- Edit Button -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $student->id }}">
    Edit
</button>
<!-- Modal -->
<div class="modal fade" id="editModal{{ $student->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Edit Student</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm{{ $student->id }}" action="{{ route('student.update', ['id' => $student->id]) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="">Name:</label>
                        <input type="text" class="form-control opacity-75 mb-2" id="" name="name" value="{{ $student->name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="editAddress{{ $student->id }}">Address:</label>
                        <input type="text" class="form-control opacity-75 mb-2" id="editAddress{{ $student->id }}" name="address" value="{{ $student->address }}" required>
                    </div>

                    <div class="form-group">
                        <label for="editAge{{ $student->id }}">Age:</label>
                        <input type="number" class="form-control opacity-75 mb-2" id="editAge{{ $student->id }}" name="age" value="{{ $student->age }}" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>