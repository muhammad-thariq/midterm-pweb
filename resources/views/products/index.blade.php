<x-app-layout>
    <!-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> -->


  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
  
    <div class="mt-6">
      <h2 class="text-white text-xl">List Products</h2>
    </div>


    
    <div class="grid md:grid-cols-3 grid-cols-1 mt-4 gap-6 px-4">  
      @foreach($products as $product)
        <div>
          <img src="{{ url('storage/' . $product->Photo) }}">
          <div>
            <p class="text-xl text-white">
              {{ $product->Name}}
            </p>
            <p class="text-gray-400">
              Rp. {{ $product->Price}}
            </p>
          </div>
        </div>
      @endforeach
    </div>

  </div>
  
</x-app-layout>
 