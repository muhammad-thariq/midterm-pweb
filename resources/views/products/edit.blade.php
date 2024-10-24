<x-app-layout>
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">

      <div class="flex mt-6">
          <h2 class="font-semibold text-xl">Edit Product</h2>
      </div>

      <div class="mt-4" x-data="{ imageUrl: '/storage/{{ $product->Photo}}'}">
          <form enctype="multipart/form-data" method="POST" action="{{ route('products.update', $product->id) }}" class="flex gap-8">
            @csrf
            @method('PUT')

            <div class="w-1/2">
                <img :src="imageUrl" class="rounded-md w-[592px] h-[592px] object-cover" alt="">
            </div>

            <div class="w-1/2">
                <div class="mt-4">
                    <p class="text-white">Edit Photo</p>
                    <x-input-label for="Photo" :value="__('')" />
                    <x-text-input 
                        id="Photo" 
                        class="block mt-1 w-full border p-2 bg-white" 
                        type="file" 
                        accept="image/*"
                        name="Photo" 
                        :value="$product->Photo"

                        @change="imageUrl = URL.createObjectURL($event.target.files[0])" 
                    />
                    <x-input-error :messages="$errors->get('Photo')" class="mt-2" />
                </div>
                
                <div class="mt-4">  
                    <p class="text-white">Edit Name</p>
                    <x-input-label for="Name" :value="__('')" />
                    <x-text-input id="Name" class="block mt-1 w-full" type="text" name="Name" :value="$product->Name"
                        required />
                    <x-input-error :messages="$errors->get('Name')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <p class="text-white">Edit Price</p>
                    <x-input-label for="Price" :value="__('')" />
                    <x-text-input id="Price" class="block mt-1 w-full" type="text" name="Price"
                        :value="$product->Price" required />
                    <x-input-error :messages="$errors->get('Price')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <p class="text-white">Edit Description</p>
                    <x-input-label for="Description" :value="__('')" />
                    <textarea id="Description" class="block mt-1 w-full" type="text"
                        name="Description">{{ $product->Description }}</textarea>
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