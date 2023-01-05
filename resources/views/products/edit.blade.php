<x-app-layout>
    <x-slot name="header">
        Editer {{ $product->name }}
    </x-slot>
    <form class="form" action="{{ route('products.update', ['product' => $product->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" class="form-control" name="name" id="name" required value="{{ $product->name }}">
        </div>
    
        <div class="form-group">
            <label for="price">Prix en centimes</label>
            <input type="number" class="form-control" name="price" id="price" required value="{{ $product->price }}">
        </div>
    
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" required>{{ $product->description }}</textarea>
        </div>
    
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" name="image" id="image">
        </div>
    
        <div class="form-group">
            <label for="active">En Stock ?</label>
            <input type="checkbox" name="active" id="active" value="1" {{ $product->active ? 'checked' : '' }}>
        </div>
    
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
    
    
</x-app-layout>
