
<div class="container">
    <h1>Create a Review</h1>
    <form method="POST" action="{{ route('Review.store') }}">
        @csrf

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="content">Review Content:</label>
            <textarea name="content" id="content" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="rating">Rating:</label>
            <input type="number" name="rating" id="rating" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit Review</button>
    </form>
</div>
