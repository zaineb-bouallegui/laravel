<div class="container">
    <h1>All Reviews</h1>
    <table class="table" border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Title</th>
                <th>Content</th>
                <th>Rating</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reviews as $review)
            <tr>
                <td>{{ $review->id }}</td>
                <td>{{ $review->email }}</td>
                <td>{{ $review->title }}</td>
                <td>{{ $review->content }}</td>
                <td>{{ $review->rating }}</td>

                <td>
                    <a href="{{ route('Review.delete', $review) }}">
                        <button type="submit" class="btn btn-link">Delete</button>
                    </a>
                    <a href="{{ route('Review.update', $review) }}">
                    <button type="submit" class="btn btn-link">Update</button>
                    </a>
                    <a href="{{ route('Review.show', $review) }}">
                    <button type="submit" class="btn btn-link">show</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
