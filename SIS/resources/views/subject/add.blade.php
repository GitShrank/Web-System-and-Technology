<!-- Add Subject Button -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addSubjectModal">
    Add Subject
</button>
</div>

<!-- Add sUBJECT Modal -->
<div class="modal fade" id="addSubjectModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Subject</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="modal-body">
                <form id="addSubjectForm" action="{{ route('subject.store') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="addSubject">Subject:</label>
                        <input type="text" class="form-control opacity-75 mb-2" id="addSubject" name="subject" placeholder="Enter Subject" required>
                    </div>

                    <div class="form-group">
                        <label for="addDescription">Description:</label>
                        <input type="text" class="form-control opacity-75 mb-2" id="addDescription" name="description" placeholder="Enter Description" required>
                    </div>

                    <div class="form-group">
                        <label for="addCode">Code:</label>
                        <input type="text" class="form-control opacity-75 mb-2" id="addCode" name="code" placeholder="Enter Code (example: T123)" required>
                        @error('code')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="addUnits">Units:</label>
                        <input type="number" class="form-control opacity-75 mb-2" id="addUnits" name="units" placeholder="Enter Units" required min="1" max="5">
                    </div>

                    <div class="form-group">
                    <label for="addSemester">Select Semester:</label>
                    <div class="input-group mb-2">
                        <select class="form-control opacity-75" id="addSemester" name="semester" required>
                            <option value="" selected disabled>Click here to select</option>
                            <option value="1st">1st Semester</option>
                            <option value="2nd">2nd Semester</option>
                        </select>
                       
                    </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Add Subject</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>