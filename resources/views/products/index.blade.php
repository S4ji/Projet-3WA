<x-app-layout>
    <x-slot name="header">
        Accueil
    </x-slot>

    <h1>Bienvenue dans notre boutique en ligne</h1>
  <p>
    Nous sommes heureux de vous accueillir sur notre site de vente en ligne. Nous proposons une large gamme de produits de qualité, tels que des vêtements pour tous les styles et toutes les occasions.
  </p>
     <div class ="card-container">
    @foreach ( $products as $product )
    
    <article class="card">
        <img src="{{ $product->image }}" alt="image de {{ $product->name }}">
        <h3 class="productname">{{ $product->name }}</h3>
        <p class="productdescription">{{ $product->description }}</p>
        <p class="productprice">{{ $product->formatted_price }}</p>
        <button><a href="{{ route('products.show', ['product' => $product->id]) }}">Voir Produit</a></button><add-to-cart :product-id="{{ $product->id }}"></add-to-cart>
        
        
    </article>
     @endforeach
    </div>

    <p>
        Retrouvez notre sélection de vêtements pour tous les styles et toutes les occasions.
    </p>

</x-app-layout>
