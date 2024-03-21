<!-- Add Grade Button -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addGradeModal">
    Add Grade
</button>
</div>
<!-- Add Grade Modal -->
<div class="modal fade" id="addGradeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Grade</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="modal-body">
                <form id="addGradeForm" action="{{ route('grade.store') }}" method="post">
                    @csrf

                    <!-- Dropdown for selecting student -->
                    <div class="form-group">
                        <label for="addStudent">Select Student:</label>
                        <div class="input-group mb-2">
                            <select name="student_id" class="form-control opacity-75 mb-2" required>
                                <option value="" selected disabled>Click here to select</option>
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                @endforeach
                            </select>
                            
                        </div>
                    </div>

                    <!-- Dropdown for selecting subject -->
                    <div class="form-group">
                 <label for="addSubject">Select Subject:</label>
                 <div class="input-group mb-2">
                 <select name="subject_id" class="form-control opacity-75" required>
                 <option value="" selected disabled>Click here to select</option>
            @foreach($subjects as $subject)
                <option value="{{ $subject->id }}">{{ $subject->subject }} - {{ $subject->code }}</option>
            @endforeach
        </select>
    </div>
</div>

                    <!-- Other fields -->
                    <div class="form-group">
                        <label for="addGrade">Grade:</label>
                        <input type="text" class="form-control opacity-75 mb-2" id="addGrade" name="grade" placeholder="Enter a grade" required>
                        @error('grade')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="addDate">Date:</label>
                        <input type="date" class="form-control opacity-75 mb-2" id="addDate" name="date" required>
                    </div>

                    <div class="form-group">
                        <label for="addRemarks">Remarks:</label>
                        <textarea class="form-control opacity-75 mb-2" id="addRemarks" name="remarks" placeholder="Enter the remarks"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Add Grade</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>