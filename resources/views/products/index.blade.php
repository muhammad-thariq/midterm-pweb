<x-app-layout>
    <!-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> -->


  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
  
    <div class="p-6">
      <h2 class="font-semibold text-xl">List Products</h2>
    </div>


    
    <div class="grid grid-cols-3">  
      @foreach($products as $product)
        <div>
          <img src="{{ url('storage/' . $product->Photo) }}">
        </div>
      @endforeach
    </div>

  </div>
  
</x-app-layout>
