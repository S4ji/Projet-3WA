<x-app-layout>
    <x-slot name="header">
        Admin Produits
    </x-slot>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
    
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>
    
        <div class="form-group">
            <label for="price">Prix en cts</label>
            <input type="number" class="form-control" name="price" id="price" required>
        </div>
    
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" required></textarea>
        </div>
    
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" name="image" id="image" required>
        </div>
    
        <div class="form-group">
            <label for="active">En Stock ?</label>
            <input type="checkbox" name="active" id="active" value="1" checked>
        </div>
    
        <button type="submit" class="btn">Envoyer</button>
    </form>
    
    

    <table>
        @foreach ( $products as $product )
          <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->formatted_price }}</td>
            <td>
              <button class="button-edit">
                <a href="{{ route('products.edit', ['product' => $product->id]) }}">Edit</a>
              </button>
            </td>
            <td>
              <form class="formnostyle" action="{{ route('products.destroy', $product->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="button-delete">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      </table>

</x-app-layout>
