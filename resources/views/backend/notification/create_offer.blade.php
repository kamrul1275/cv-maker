<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Offer</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">




@if ($errors->any())    
@foreach ($errors->all() as $error)
<h1 class="alert alert-danger">{{ $error }}</h1>
@endforeach
@endif


@if (Session::has('success'))
<h1 class="alert alert-success">{{ Session::get('success') }}</h1>
@endif

         


        <h1>Create New Offer</h1>
        <form action="{{ route('offers.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Offer Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="discount">Discount (%)</label>
                <input type="number" class="form-control" id="discount" name="discount" required>
            </div>
            <div class="form-group">
                <label for="valid_until">Valid Until</label>
                <input type="date" class="form-control" id="valid_until" name="valid_until" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Offer</button>
        </form>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>