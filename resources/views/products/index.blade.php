@extends('layout')

@section('content')

<div class="col-lg-8">

    <div id="errors">
        <ul></ul>
            @if (Session::has('errors'))
            <div class="alert alert-danger centerBox">
                <ul class="warning">
                    @foreach(Session::get('errors') as $message)
                    <li class="">
                        {{ $message }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
            </div>
    <div id="success">

            @if (Session::has('success'))
            <div class="alert alert-success centerBox">
                <ul class="warning">
                    @foreach(Session::get('success') as $message)
                    <li class="">
                        {{ $message }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
</div>
            <h3>Add new product</h3>
            <p>&nbsp;</p>
            <form id="productForm" action="#" method="post" class="contact-form">
                <div class="form-group">
                    <label>Product name</label>
                    <input type="text" name="name" placeholder="Enter product name" />
                </div>
                
                <div class="form-group">
                    <label>Product quantity</label>
                    <input type="text" name="quantity" placeholder="Enter product quantity" />
                </div>
                
                <div class="form-group">
                    <label>Product price</label>
                    <input type="text" name="price" placeholder="Enter product price" />
                </div>
                
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                
                <div class="form-group">
                    <input type="submit" value="submit" />
                </div>
                
            </form>
            
            <a href="products.json">Products.json file</a>
            
            <table class="table">
                <tr>
                    <th>Product Name</th>
                    <th>Quantity in stock</th>
                    <th>Price per item</th>
                    <th>Datetime submitted</th>
                    <th>Total value number</th>
                </tr>
                
                
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->created_at }}</td>
                    <td>{{ $product->total }}</td>
                </tr>
                @endforeach
            </table>
        </div>
@stop

@section('javascript')
<script>
    $(document).ready(function() {
        $('#productForm').submit(function(e) {
            e.preventDefault()
            $.ajax({
                url: "{{route('createProduct')}}",
                data: $('#productForm').serialize()
            }).done(function(result) {
                var data = JSON.parse(result);
                if(data.status) {
                    $('#errors').removeClass('alert alert-danger');
                    $('#success ul').html('');
                    $.each(data.messages, function( index, value ) {
                        $('#success ul').append('<li>' + value + '</li>');
                    });
                    window.location.host= window.location.host
                } else {
                    $('#errors ul').html('');
                    $('#errors').addClass('alert alert-danger');
                    $('#success').removeClass('alert alert-success');
                    $.each(data.messages, function( index, value ) {
                        $('#errors ul').append('<li>' + value + '</li>');
                    });
                }
            });
        });
    })
</script>
@stop