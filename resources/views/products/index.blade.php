<x-app-layout>
    <!-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> -->


  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2 pt-16">
  
    <div class="flex mt-6 px-4 items-center justify-between">
      <h2 class="text-white text-xl font-semibold">List Products</h2>
      <a href="{{ route('products.create') }}">
        <button class="bg-white px-10 py-2 rounded-md font-semibold">+ Add</button>
      </a>
    </div> 
    <div class="grid md:grid-cols-3 grid-cols-1 mt-4 gap-6 px-4">  
      @foreach($products as $product)
        <div>
          <img src="{{ url('storage/' . $product->Photo) }}">
          <div class="my-2">
            <p class="text-xl text-white font-semibold">
              {{ $product->Name}}
            </p>
            <p class="text-gray-400">
              Rp. {{ number_format($product->Price)}}
            </p>
          </div>
          <button class="bg-white px-10 py-2 w-full rounded-md font-semibold my-4">Edit</button>
        </div>
      @endforeach
    </div>

  
</x-app-layout>
 