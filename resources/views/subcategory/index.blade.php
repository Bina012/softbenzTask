<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Subcategory form</title>
</head>
<body>
<div class="container-fluid">
    <header class="text-center">
        <h1>List of Subcategory</h1>
    </header>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('category.index') }}"> List of Category</a>
    </div>
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
                <th>Category</th>
                <th>Description</th>
                <th width="280px">Action</th>
            </tr>
            @if($subcategories->isEmpty())
                <tr>
                    <td colspan="4">No subcategories found</td>
                </tr>
            @else
                @foreach ($subcategories as $subcategory)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $subcategory->name }}</td>
                        <td>{{ $subcategory->category->name ?? ''}}</td>
                        <td>{{ $subcategory->description }}</td>
                        <td>
                            <form action="#" method="POST">
                                <a class="btn btn-info" href="{{ route('subcategory.show',$subcategory->id) }}">Show</a>
                                <a class="btn btn-primary"
                                   href="{{ route('subcategory.edit',$subcategory->id) }}">Edit</a>
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
