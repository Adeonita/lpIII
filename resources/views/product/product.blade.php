@extends('index')
@section('content')
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-6 mt-3">
                <img src='{{ asset("$product->imagePath") }}' alt="Imagem do produto" class="product-img">
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-8 mt-3">
                        <p class="product-name">{{ $product->name }}</p>
                    </div>
                </div>
                <div class="row">
                    &nbsp; &nbsp;
                    <h3><del>De 15,99</del></h3>
                    <p class="product-price">Por apenas <br> R$ {{ $product->price }}</p>
                </div>
                <div class="form-group">
                    <p> {{ $product->description }}</p>
                </div>
                <div class="row mt-4">
                    <div><label for="quantity" class="quant">
                            <p>Quantidade</p>
                        </label>
                        <input type="number" id="quantity" name="quantity" value=1 min="1" max="999" class="quantBox">
                    </div>
                </div>
                <div class="row mt-4">
                    <div>
                        <button product="{{ $product }}" id="purchase-button" class="btn btn-success">
                            <i class="bi bi-cart-plus"></i> Comprar
                        </button>             
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/product.js') }}"></script>
@endsection
