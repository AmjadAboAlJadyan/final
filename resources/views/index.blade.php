@extends('app')
@section('content')
<main class="container p-4">
    <div class="row">
        <div class="col-md-4">
        <!-- MESSAGES -->

        
        <!-- ADD Product FORM -->
        @if (isset($product))
        <div class="card card-body">
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
            <form action="{{url('update/'.$product->id)}}" method="POST">
                @csrf
            <div class="form-group">
                <input type="text" name="title" class="form-control" placeholder="Product Title" value="{{$product->title}}" autofocus>
            </div>
            <div class="form-group">
                <textarea name="description" rows="2" class="form-control" value="{{$product->Description}}" placeholder="Product Description"></textarea>
            </div>
            <div class="form-group">
                <input type="number" name="price" class="form-control" value="{{$product->Price}}" placeholder="Product Price" min="0">
            </div>
            <input type="submit" name="save_product" class="btn btn-success btn-block" value="edit Product">
            </form>
        </div>
        @else
        <div class="card card-body">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
            <form action="store" method="POST">
                @csrf
            <div class="form-group">
                <input type="text" name="title" class="form-control" placeholder="Product Title" autofocus>
            </div>
            <div class="form-group">
                <textarea name="description" rows="2" class="form-control" placeholder="Product Description"></textarea>
            </div>
            <div class="form-group">
                <input type="number" name="price" class="form-control" placeholder="Product Price" min="0">
            </div>
            <input type="submit" name="save_product" class="btn btn-success btn-block" value="Save Product">
            </form>
        </div>
        @endif
        </div>
        <div class="col-md-8">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

                @foreach ($products as $product)
                        <tr>
                <td>{{$product->title}}</td>
                <td>{{$Product->Description}}</td>
                <td>{{$Product->Price}}</td>
                <td>{{$Product->created_at}}</td>
                <td>

                    <form action="delete/{{$task->id}}" method="POST">
                        @csrf
                        @method('delete')
                            <button type="submit" class="btn btn-secondary">
                                <i class="fas fa-marker"></i></button>
                        </form>
                        <form action="delete/{{$task->id}}" method="POST">
                            @csrf
                            @method('delete')
                                <button type="submit" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i></button>
                            </form>
                </td>
            </tr>
            @endforeach
                    </tbody>
        </table>
        </div>
    </div>
    </main>
