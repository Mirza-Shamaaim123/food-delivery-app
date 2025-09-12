<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="bg-dark py-3">
        <h3 class="text-white text-center">Simple Laravel Crud</h3>
    </div>
    <div class="container">
        <div class="row justify-content-center mt-4 ">
            <div class="col-md-10 d-flex justify-content-end ">
                <a href="{{route('products.create')}}" class="btn btn-dark">Create</a>
            </div>

        </div>
        <div class="row d-flex justify-content-center   ">
            @if(Session::has('success'))
            <div class="col-md-10">
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            </div>
            @endif
            <div class="col-md-10">
                <div class="card borrder-0 shadow-lg my-3">
                    <div class="card-header bg-dark ">
                        <h3 class="text-center text-white"> Products</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Sku</th>
                                <th>Price</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            @if($products->isNotempty())
                            @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>
                                    @if($product->image != "")
                                    <img width="50" src="{{asset('upload/products/'.$product->image)}}" alt="">
                                    @endif
                                </td>

                                <td>{{$product->name}}</td>
                                <td>{{$product->sku}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{\carbon\Carbon::parse($product->created_at)->format('d-M-Y')}}</td>
                                <td>
                                    <a href="{{route('products.edit',$product->id)}}" class="btn btn-dark">Edit</a>
                                    <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $product->id }}').submit();" class="btn btn-danger">Delete</a>

                                    <form id="delete-form-{{ $product->id }}" action="{{ route('products.destory', $product->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>

                            @endforeach
                            @endif

                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>