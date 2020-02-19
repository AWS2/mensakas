@extends('layouts.app')

@section('space')
    @include('layouts.secondNav', ['title' => 'Products'])
@endsection

@section('content')
<div class="table d-flex justify-content-center">
    
    <div class="">
        <table>
            <tr>
            <td></td>
            <td><strong>#</strong></td>
            <td><strong>Product</strong></td>
            <td><strong>Bussines Name</strong></td>
            <td><strong>Status</strong></td>
            <td><strong>Price</strong></td>
            <td colspan="2"> 
                <form action="{{route('products.create')}}" method="get">
                    <button type="submit" value="Add new Product" class="btn btn-success ml-4"><i class="fa fa-plus"></i> Add Product</button>
                </form>
            </td>

            </tr>

            @foreach($products as $product)
            <tr>
                <td>
                    <form action="{{route('products.show', ['product'=>$product])}}" method="get">
                        <button type="submit" class="btn btn-success fa fa-search"></button>
                    </form>
                </td>
                <td>{{$product->id}}</td>
                <td>{{$product->productDescriptions->descriptionTranslations[0]->name ?? ''}}</td>
                <td>{{$product->business->name}}</td>
                <td>
                    @if ($product->avalible)
                        Avalible
                    @else
                        Out Stock
                    @endif
                </td>
                <td>{{$product->price}}</td>
                <td>
                    <form action="{{route('products.edit', ['product'=>$product])}}" method="get">
                        <button type="submit" value="Edit" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</button>                        
                    </form>
                </td>
                <td>
                <form action="{{route('products.destroy', ['product'=>$product])}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> Delete</button>
                </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
