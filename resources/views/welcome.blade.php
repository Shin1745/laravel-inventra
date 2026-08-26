<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inventra - Add Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5 bg-light">
    <div class="container bg-white p-4 rounded shadow-sm style="max-width: 600px;">
        <h3 class="mb-4">Inventra Stock Management</h3>
        <form action="/items" method="POST">
            @csrf
            <input type="hidden" name="category_id" value="1">
            <div class="mb-3">
                <label class="form-label">Item Code</label>
                <input type="text" name="item_code" class="form-field form-control" placeholder="e.g. BRG-002" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Item Name</label>
                <input type="text" name="name" class="form-control" placeholder="e.g. Wireless Mouse" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Stock Quantity</label>
                <input type="number" name="stock" class="form-control" value="15" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Price (IDR)</label>
                <input type="number" name="price" class="form-control" value="250000" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Add Item to Inventory</button>
        </form>
        <hr>
        <a href="/items" target="_blank" class="btn btn-outline-secondary w-100">View JSON Data Endpoint</a>
    </div>
</body>
</html>