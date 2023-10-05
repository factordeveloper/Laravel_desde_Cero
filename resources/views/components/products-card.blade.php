      <div class="card">
         <img src="{{ asset($producto->images->first()->path) }}" alt="" class="card-img-top" height="300">
         <div class="card-body">
                <h4 class="text-right"><strong>${{$producto->price}}</strong></h4>
                <h5 class="card-title">{{$producto->title}}</h5>
                <h5 class="card-text">{{$producto->description}}</h5>
                <p class="card-text"><strong>{{$producto->stock}} left</strong></p>

                @if(isset($cart))
                <form 
                class="d-inline" method="POST" action="{{ route('products.carts.destroy', ['cart' => $cart->id, 'product' => $producto->id]) }}">
                @csrf
                @method('DELETE')
               <button type="submit" class="btn btn-warning">Remove From Cart</button>
        
        </form>
                @else
                <form 
                class="d-inline" method="POST" action="{{ route('products.carts.store', ['product' => $producto->id]) }}">
                @csrf
               <button type="submit" class="btn btn-success">Add To Cart</button>
        
        </form>
        @endif
         </div>
      </div>





        