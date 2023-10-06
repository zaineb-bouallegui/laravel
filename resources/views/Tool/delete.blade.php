<body>
<div class="container">
    <h1>Delete Tool</h1>
    <p>Are you sure you want to delete this tool?</p>
    <p><strong>Tool ID:</strong> {{ $tool->id }}</p>
    <p><strong>Name:</strong> {{ $tool->name }}</p>
    <p><strong>Description:</strong> {{ $tool->description }}</p>
    <p><strong>Price:</strong> {{ $tool->prix }}</p>
    <p><strong>Stock:</strong> {{ $tool->stock }}</p>
    <p><strong>Category:</strong> {{ $tool->categorie }}</p>

    <form method="POST" action="{{ route('tools.destroy', $tool) }}">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger">Confirm Delete</button>
    </form>

    
</div>
</body>
