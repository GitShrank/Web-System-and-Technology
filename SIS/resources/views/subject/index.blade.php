@extends('dashboard')
@section('content')

<div class="page-content">

        <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between my-2">
                  <h6 class="card-title">Subjects Table</h6>       

                  <!-- Add Subject Button -->
                  @include('subject.add')

                {{-- Subject Table --}}
              <div class="table-responsive">
                <table id="dataTableExample" class="table">
                  <thead>
                    <tr>
                      <th>Subject</th>
                      <th>Description</th>
                      <th>Code</th>
                      <th>unit</th>
                      <th>Semester</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($subjects as $subject)
                    <tr>
                        <td>{{ ucfirst($subject->subject) }}</td>
                        <td>{{ ucfirst($subject->description) }}</td>
                        <td>{{ ucfirst($subject->code) }}</td>
                        <td>{{ $subject->units}}</td>
                        <td>{{ $subject->semester }}</td>
                        <td>
                          <!-- Edit Button -->
                          @include('subject.edit')

                          <!-- Delete Button -->
                          @include('subject.delete')
                  
                        </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>

</div>

	

@endsection