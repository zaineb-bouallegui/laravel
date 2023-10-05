
<div class="container">
    <h1>Edit Review</h1>
    <form method="POST" action="{{ route('Review.update', $review) }}">
        @csrf
        @method('PATCH') {{-- Use PATCH method for updating --}}

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" class="form-control" value="{{ $review->email }}" required>
        </div>

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $review->title }}" required>
        </div>

        <div class="form-group">
            <label for="content">Review Content:</label>
            <textarea name="content" id="content" class="form-control" required>{{ $review->content }}</textarea>
        </div>

        <div class="form-group">
            <label for="rating">Rating:</label>
            <input type="number" name="rating" id="rating" class="form-control" value="{{ $review->rating }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Review</button>
    </form>
</div>
