<!-- Edit Button -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $grade->id }}">
    Edit
</button>
<!-- Modal -->
<div class="modal fade" id="editModal{{ $grade->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Edit Grade</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm{{ $grade->id }}" action="{{ route('grade.update', ['id' => $grade->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    
                    <input type="text" name="student_id" value="{{ $grade->student_id }}" hidden>
                    <input type="text" name="subject_id" value="{{ $grade->subject_id }}" hidden>
                    
                    <div class="form-group">
                        <label for="">Grade:</label>
                        <input type="text" class="form-control opacity-75 mb-2" id="" name="grade" value="{{ $grade->grade }}" required>
                        @error('grade')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="editDate{{ $grade->id }}">Date:</label>
                        <input type="date" class="form-control opacity-75 mb-2 text-light" id="editDate{{ $grade->id }}" name="date" value="{{ $grade->date }}" required>
                    </div>

                    <div class="form-group">
                        <label for="editRemarks{{ $grade->id }}">Remarks:</label>
                        <input type="text" class="form-control opacity-75 mb-2" id="editRemarks{{ $grade->id }}" name="remarks" value="{{ $grade->remarks }}" required>
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
