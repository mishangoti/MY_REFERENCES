@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <label><b>Product Id : </b>{{ $product_detail['id'] }}</label><br>
                    <label><b>Product Name : </b>{{ $product_detail['name'] }}</label><br>
                    <label><b>Product Category Id : </b>{{ $product_detail['category_id'] }}</label><br>
                    <label><b>Description : </b>{{ $product_detail['description'] }}</label><br>
                    <label><b>Price : </b>{{ $product_detail['price'] }}</label><br>
                    <label><b>Stock : </b>{{ $product_detail['stock'] }}</label><br>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
