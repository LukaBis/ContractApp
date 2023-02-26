@extends('layouts.app')

@section('content')

<div class="container is-fluid">
    <div class="buttons has-addons mt-4">
        <button class="button" id="show-usd-price-button">USD</button>
        <button class="button is-info" id="show-crypto-price-button">Crypto</button>
    </div>
    
    @include('partials._chart')
</div>

<p id="error-message" class="ml-4 mt-4 has-text-danger"></p>

@endsection

@section('javascript-section')
    @include('partials.scripts._get-contract')
@endsection