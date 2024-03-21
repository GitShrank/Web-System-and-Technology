<!-- Delete Button -->
<form action="{{ route('student.destroy', ['id' => $student->id]) }}" method="post" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete {{$student->name}}')">Delete</button>
</form>