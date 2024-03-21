<!-- Edit Subject Button -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $subject->id }}">
Edit
</button>
<!-- Edit Modal -->
<div class="modal fade" id="editModal{{ $subject->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Edit Subject</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm{{ $subject->id }}" action="{{ route('subject.update', ['id' => $subject->id]) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="">Subject:</label>
                        <input type="text" class="form-control opacity-75 mb-2" id="" name="subject" value="{{ $subject->subject }}" required>
                    </div>

                    <div class="form-group">
                        <label for="editDescription{{ $subject->id }}">Description:</label>
                        <input type="text" class="form-control opacity-75 mb-2" id="editDescription{{ $subject->id }}" name="description" value="{{ $subject->description }}" required>
                    </div>

                    <div class="form-group">
                        <label for="editCode{{ $subject->id }}">Subject Code:</label>
                        <input type="text" class="form-control opacity-75 mb-2 @error('code') is-invalid @enderror" id="editCode{{ $subject->id }}" name="code" value="{{ old('code', $subject->code) }}" required>
                        @error('code')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    

                    <div class="form-group">
                        <label for="editUnits{{ $subject->id }}">Units:</label>
                        <input type="number" class="form-control opacity-75 mb-2" id="editUnits{{ $subject->id }}" name="units" value="{{ $subject->units }}" required min="1" max="5">
                    </div>

                    <div class="form-group">
                        <label for="editSemester{{ $subject->id }}">Semester:</label>
                        <div class="input-group mb-2">
                        <select class="form-control opacity-75 mb-2" id="editSemester{{ $subject->id }}" name="semester" required>
                            <option selected disabled>Click here to select</option>
                            <option value="1st" {{ $subject->semester === '1st' ? 'selected' : '' }}>1st Semester</option>
                            <option value="2nd" {{ $subject->semester === '2nd' ? 'selected' : '' }}>2nd Semester</option>
                        </select>
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i data-feather="chevron-down"></i>
                            </span>
                        </div>
                        </div>
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