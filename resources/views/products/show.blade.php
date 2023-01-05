<x-app-layout>
    <x-slot name="header">
        Fiche Produit {{ $product->name }}
    </x-slot>

<h1>Fiche Produit {{ $product->name }}</h1>
<div class="product-details">
    <div class="product-img-column">
        <img src="{{ asset($product->image) }}" class="img" alt="Image de {{ $product->name }}">
    </div>
    <div class="info-column">
        <p class="description">{{ $product->description }}</p>
        <p class="price">Prix : {{ $product->formatted_price }}</p>
        <add-to-cart :product-id="{{ $product->id }}"></add-to-cart>
    </div>
  </div>

</x-app-layout>
