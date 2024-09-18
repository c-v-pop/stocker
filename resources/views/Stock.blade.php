<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
    <div class="flex justify-center">
        <h1>Stock List</h1>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <ul>
        @foreach($ingredients as $ingredient)
            <li>{{ $ingredient->name }} - {{ $ingredient->quantity }}</li>
        @endforeach
    </ul>

    <!-- Form to add new stock -->
    <form action="{{ route('stock.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Ingredient Name" required>
        <input type="number" name="quantity" placeholder="Quantity" required>
        <button type="submit">Add to Stock</button>
        <button><a href="/">View Stock</a></button>
    </form>
    </div>
