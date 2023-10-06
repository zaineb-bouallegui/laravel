<div class="container">
    <h1>All Tools</h1>
    <table class="table" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tools as $tool)
            <tr>
                <td>{{ $tool->id }}</td>
                <td>{{ $tool->name }}</td>
                <td>{{ $tool->description }}</td>
                <td>{{ $tool->price }}</td>
                <td>{{ $tool->stock }}</td>
                <td>{{ $tool->category }}</td>

                <td>
                    <a href="{{ route('tools.delete', $tool) }}">
                        <button type="button" class="btn btn-link">Delete</button>
                </a>
                    <a href="{{ route('tools.update', $tool) }}">
                        <button type="button" class="btn btn-link">Update</button>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
