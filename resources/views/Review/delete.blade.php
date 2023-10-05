
<div class="container">
    <h1>Delete Review</h1>
    <p>Are you sure you want to delete this review?</p>
    <p><strong>Review ID:</strong> {{ $review->id }}</p>
    <p><strong>Email:</strong> {{ $review->email }}</p>
    <p><strong>Title:</strong> {{ $review->title }}</p>
    <p><strong>Content:</strong> {{ $review->content }}</p>
    <p><strong>Rating:</strong> {{ $review->rating }}</p>

    <form method="POST" action="{{ route('Review.destroy', $review) }}">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger">Confirm Delete</button>
    </form>

    <a href="{{ route('Review.index') }}" class="btn btn-secondary">Cancel</a>
</div>

