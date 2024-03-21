@extends('dashboard')
@section('content')

<div class="page-content">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between my-2">
                    <h6 class="card-title">Grades Table</h6>
                    
                    <!-- Add Grade Button -->
                    @include('grade.add')

                    {{-- Grade Table --}}
                    <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Subject</th>
                            <th>Grade</th>
                            <th>Date</th>
                            <th>Remarks</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($grades as $grade)
                                <tr>
                                    <td>{{ ucfirst($grade->student->name) }}</td>
                                    <td>{{ ucfirst($grade->subject->subject) }}</td>
                                    <td>{{ $grade->grade }}</td>
                                    <td>{{ $grade->date }}</td>
                                    <td>{{ $grade->remarks }}</td>
                                    <td>
                                        <!-- Edit Button -->
                                        @include('grade.edit')                                        
                                            
                                        <!-- Delete Button -->
                                        @include('grade.delete')

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