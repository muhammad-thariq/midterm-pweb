<x-app-layout>
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">

      <div class="flex mt-6">
          <h2 class="font-semibold text-xl">Add Product</h2>
      </div>

      <div class="mt-4" x-data="{ imageUrl: '/storage/noimage.png'}">
          <form enctype="multipart/form-data" method="POST" action="{{ route('products.store') }}" class="flex gap-8">
            @csrf

            <div class="w-1/2">
                <img :src="imageUrl" class="rounded-md" alt="">
            </div>

            <div class="w-1/2">
                <div class="mt-4">
                    <p class="text-white">Photo</p>
                    <x-input-label for="Photo" :value="__('')" />
                    <x-text-input 
                        id="Photo" 
                        class="block mt-1 w-full border p-2 bg-white" 
                        type="file" 
                        accept="image/*"
                        name="Photo" 
                        :value="old('Photo')"
                        required
                        @change="imageUrl = URL.createObjectURL($event.target.files[0])" 
                    />
                    <x-input-error :messages="$errors->get('Photo')" class="mt-2" />
                </div>
                
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

                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <x-primary-button class="justify-center w-full mt-8 ">
                    {{ __('Submit') }}
                </x-primary-button>
            </div>

          </form>
      </div>

  </div>
</x-app-layout>