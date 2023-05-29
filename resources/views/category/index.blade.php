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
        <h1>All Categories</h1>
    </header>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('category.create') }}"> Create Category</a>
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
                <th>Description</th>
                <th width="280px">Action</th>
            </tr>
            @if($categories->isEmpty())
                <tr>
                    <td colspan="4">No categories found</td>
                </tr>
            @else
                @foreach ($categories as $category)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <form action="{{ route('category.destroy',$category->id) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('category.show',$category->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('category.edit',$category->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
        <br><br>
        <header class="text-center">
            <h3 style="color: red">List of trashed Categories</h3>
        </header>
        <table class="table table-bordered">
            <tr>
                <th>S.N</th>
                <th>Name</th>
                <th>Description</th>
            </tr>
            @foreach ($only_trashed_category as $category_trash)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $category_trash->name }}</td>
                    <td>{{ $category_trash->description }}</td>
                </tr>
            @endforeach
        </table>
    </section>
</div>
</body>
</html>
