

@extends('dashboard')
@section('content')


<div class="page-content">
    <div class="background-image"></div>
    <div class="content">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between my-2">
                            <h6 class="card-title">Students Table</h6>    
                            <!-- Add Student Modal -->
                            @include('student.add')
                        </div>
                        {{-- Student Table --}}
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Age</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                    <tr>
                                        <td>{{ ucfirst($student->name) }}</td>
                                        <td>{{ ucfirst($student->address) }}</td>
                                        <td>{{ $student->age }}</td>
                                        <td>
                                            {{-- Edit Button --}}
                                            @include('student.edit')
                                            <!-- Delete Button -->
                                            @include('student.delete')
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
</div>
@endsection