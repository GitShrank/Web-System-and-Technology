<!-- Delete Button -->
<form action="{{ route('grade.destroy', ['id' => $grade->id]) }}" method="post" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete the grade {{ $grade->grade }}')">Delete</button>
</form>