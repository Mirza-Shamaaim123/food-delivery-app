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
        <div class="col-md-10 d-flex justify-content-end " >
            <a href="{{route('products.index')}}" class="btn btn-dark">Back</a>
        </div>

    </div>
    <div class="row d-flex justify-content-center ">
        <div class="col-md-10">
            <div class="card borrder-0 shadow-lg my-3">
                <div class="card-header bg-dark ">
                    <h3 class="text-center text-white">Edit Product</h3>
                </div>
                <form enctype="multipart/form-data" action="{{ route('products.update', $product->id) }}" method="POST">
 
                @method('PUT')    
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label for="" class="form-label h5" >Name</label>
                        <input type="text" value="{{old('name',$product->name)}}" class=" @error('name') is-invalid @enderror form-control form-control-lg" placeholder="Enter Product Name" name="name">
                        @error('name')
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>
                     <div class="mb-3">
                        <label for="" class="form-label h5" >Sku</label>
                        <input type="text" value="{{old('sku',$product->sku)}}" class="  @error('sku') is-invalid @enderror form-control form-control-lg" placeholder="Sku" name="sku">
                          @error('sku')
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>
                     <div class="mb-3">
                        <label for="" class="form-label h5" >Price</label>
                        <input type="text" value="{{old('price',$product->price)}}" class="  @error('price') is-invalid @enderror form-control form-control-lg" placeholder="Enter price" name="price">
                          @error('price')
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>
                     <div class="mb-3">
                        <label for="" class="form-label h5" >Description</label>
                       <textarea name="description"  placeholder="Description"  value="{{old('description',$product->description)}}"  class="form-control"></textarea>
                    </div>
                     <div class="mb-3">
                        <label for="" class="form-label h5" >Image</label>
                        <input type="file" class="form-control form-control-lg" placeholder="Image" name="image">
                         @if($product->image != "")
                                <img  class="w-50 my-3" src="{{asset('upload/products/'.$product->image)}}" alt="">
                                @endif
                    </div>
                    <div class="d-grid" >
                        <button class="btn btn-lg btn-primary">Update</button>
                    </div>

                </div>
                </form>
            </div>
        </div>
    </div>
   </div>
  </body>
</html>