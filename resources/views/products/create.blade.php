<x-app-layout>
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">

      <div class="flex mt-6">
          <h2 class="font-semibold text-xl">Add Product</h2>
      </div>

      <div class="mt-4">
          <form method="POST" action="{{ route('products.store') }}">
              @csrf

              <div class="mt-4">
                  <p class="text-white">Name</p>
                  <x-input-label for="Name" :value="__('')" />
                  <x-text-input id="Name" class="block mt-1 w-full" type="text" name="Name" :value="old('Name')"
                      required />
                  <x-input-error :messages="$errors->get('Name')" class="mt-2" />
              </div>

              <div class="mt-4">
                  <p class="text-white">Price</p>
                  <x-input-label for="Price" :value="__('')" />
                  <x-text-input id="Price" class="block mt-1 w-full" type="text" name="Price"
                      :value="old('Price')" x-mask:dynamic="$money($input, ',')" required />
                  <x-input-error :messages="$errors->get('Price')" class="mt-2" />
              </div>

              <div class="mt-4">
                  <p class="text-white">Description</p>
                  <x-input-label for="Description" :value="__('')" />
                  <textarea id="Description" class="block mt-1 w-full" type="text"
                      name="Description">{{ old('Description') }}</textarea>
                  <x-input-error :messages="$errors->get('Description')" class="mt-2" />
              </div>

              <x-primary-button class="justify-center w-full mt-4">
                  {{ __('Submit') }}
              </x-primary-button>


          </form>
      </div>

  </div>
</x-app-layout>