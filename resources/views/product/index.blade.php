<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Category form</title>
</head>
<body>
<div class="container-fluid">
    <header class="text-center">
        <h1>All Products</h1>
    </header>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('product.create') }}"> Create Product</a>
        <a class="btn btn-primary" href="{{ route('subcategory.index') }}"> List of subCategory</a>
    </div>
    <br><br>
    <section class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>S.N</th>
                <th>Name</th>
                <th>Category name</th>
                <th>Subcategory name</th>
                <th>Description</th>
                <th width="280px">Action</th>
            </tr>
            @if($product->isEmpty())
                <tr>
                    <td colspan="4">No categories found</td>
                </tr>
            @else
                @foreach ($product as $data)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->category->name }}</td>
                        <td>{{ $data->subcategory->name }}</td>
                        <td>{{ $data->description }}</td>
                        <td>
                            <form action="{{ route('product.destroy',$data->id) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('product.show',$data->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('product.edit',$data->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
    </section>
</div>
</body>
</html>
