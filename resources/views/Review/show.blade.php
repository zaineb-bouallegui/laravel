
<div class="container">
    <h1>Review Details</h1>
    <table class="table">
        <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $review->id }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $review->email }}</td>
            </tr>
            <tr>
                <th>Title</th>
                <td>{{ $review->title }}</td>
            </tr>
            <tr>
                <th>Content</th>
                <td>{{ $review->content }}</td>
            </tr>
            <tr>
                <th>Rating</th>
                <td>{{ $review->rating }}</td>
            </tr>
        </tbody>
    </table>
    <a href="{{ route('Review.index') }}" class="btn btn-primary">Back to Reviews</a>
</div>
