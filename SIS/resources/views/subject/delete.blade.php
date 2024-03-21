<!-- Delete Button -->
<form action="{{ route('subject.destroy', ['id' => $subject->id]) }}" method="post" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete {{$subject->subject}}')">Delete</button>
</form>