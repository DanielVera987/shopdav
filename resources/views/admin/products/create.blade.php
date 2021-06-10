<x-app-layout>

  <x-admin-aside />

  <div class="flex flex-col flex-1 h-full overflow-hidden">
      <x-admin-nav />

      <!-- Main content -->
      <main class="flex-1 max-h-full p-5 overflow-hidden overflow-y-scroll">
        <h3 class="mt-6 text-xl">Crear Nuevo Producto</h3>
        <br />
        @if (session()->has('success'))
          <x-alert color="green" message="{{ session()->get('success') }}" />
        @endif

        @if (session()->has('warning'))
          <x-alert color="red" message="{{ session()->get('warning') }}" />
        @endif

        @if ($errors->any())
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        @endif

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class=" px-8 pt-6 pb-8 mb-4 flex flex-col my-2">

            {{-- Name --}}
            <div class="-mx-3 md:flex mb-6">
              <div class="md:w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="name">
                  Nombre del Producto <small class="text-red-500 font-bold text-sm">*</small>
                </label>
                <input
                  class="appearance-none block w-full bg-grey-lighter text-grey-darker border @if($errors->has('name')) border-red-500 @endif rounded py-3 px-4 mb-3" 
                  type="text"
                  id="name"
                  name="name"
                  value="{{ old('name') }}"
                  placeholder="Celular HUAWEI"
                  required/>

                @error('name')
                  <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                    {{ $message }}
                  </span>
                @enderror
              </div>
            </div>

            {{-- Description --}}
            <div class="-mx-3 md:flex mb-6">
              <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="content">
                  Descripción <small class="text-red-500 font-bold text-sm">*</small>
                </label>
                <textarea name="content" class="border-2 border-gray-500">
                  {{ old('content') }}
                </textarea>

                @error('content')
                  <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                    {{ $message }}
                  </span>
                @enderror
              </div>
            </div>

            {{-- Code --}}
            <div class="-mx-3 md:flex mb-6">
              <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="code">
                  Código <small class="text-red-500 font-bold text-sm">*</small>
                </label>
                <input
                  class="appearance-none block w-full bg-grey-lighter text-grey-darker border @if($errors->has('code')) border-red-500 @endif border-grey-lighter rounded py-3 px-4 mb-3" 
                  type="text"
                  name="code"
                  id="code"
                  value="{{ old('code')}}"
                  placeholder="0000000001"
                  required/>

                @error('code')
                  <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                    {{ $message }}
                  </span>
                @enderror
              </div>
            </div>

            {{-- Price --}}
            <div class="-mx-3 md:flex mb-6">
              <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="price">
                  Precio <small class="text-red-500 font-bold text-sm">*</small>
                </label> 
                <input 
                  class="appearance-none block w-full bg-grey-lighter text-grey-darker border @if($errors->has('price')) border-red-500 @endif border-grey-lighter rounded py-3 px-4 mb-3" 
                  type="text" 
                  name="price"
                  id="price" 
                  value="{{ old('price')}}"
                  placeholder="100.00" 
                  required/>

                @error('price')
                  <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                    {{ $message }}
                  </span>
                @enderror
              </div>
            </div>

            {{-- Quantity --}}
            <div class="-mx-3 md:flex mb-6">
              <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="quantity">
                  Cantidad <small class="text-red-500 font-bold text-sm">*</small>
                </label> 
                <input 
                  class="appearance-none block w-full bg-grey-lighter text-grey-darker border @if($errors->has('quantity')) border-red-500 @endif border-grey-lighter rounded py-3 px-4 mb-3" 
                  type="text" 
                  name="quantity"
                  id="quantity" 
                  value="{{ old('quantity')}}"
                  placeholder="32.00" 
                  required/>

                @error('quantity')
                  <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                    {{ $message }}
                  </span>
                @enderror
              </div>
            </div>

            {{-- SubCategories --}}
            <div class="-mx-3 md:flex mb-6">
              <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="subcategory_id">
                  Sub-Categoria <small class="text-red-500 font-bold text-sm">*</small>
                </label>

                <select
                  class="appearance-none block w-full bg-grey-lighter text-grey-darker border @if($errors->has('subcategory_id')) border-red-500 @endif border-grey-lighter rounded py-3 px-4 mb-3" 
                  name="subcategory_id"
                  id="subcategory_id"
                  value="{{ old('subcategory_id')}}"
                  required>

                  <option value="" selected disabled>Seleccionar...</option>
                  @foreach($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                  @endforeach
                </select>

                @error('subcategory_id')
                  <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                    {{ $message }}
                  </span>
                @enderror
              </div>
            </div>

            {{-- Brand --}}
            <div class="-mx-3 md:flex mb-6">
              <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="brand_id">
                  Marca <small class="text-red-500 font-bold text-sm">*</small>
                </label>

                <select
                  class="appearance-none block w-full bg-grey-lighter text-grey-darker border @if($errors->has('brand_id')) border-red-500 @endif border-grey-lighter rounded py-3 px-4 mb-3" 
                  name="brand_id"
                  id="brand_id"
                  value="{{ old('brand_id')}}"
                  required>

                  <option value="" selected disabled>Seleccionar...</option>
                  @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                  @endforeach
                </select>

                @error('brand_id')
                  <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                    {{ $message }}
                  </span>
                @enderror
              </div>
            </div>

            {{-- Colors --}}
            <div class="-mx-3 md:flex mb-6">
              <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="color_id">
                  Color <small class="text-red-500 font-bold text-sm">*</small>
                </label>

                <select
                  class="appearance-none block w-full bg-grey-lighter text-grey-darker border @if($errors->has('color_id')) border-red-500 @endif border-grey-lighter rounded py-3 px-4 mb-3"
                  name="color_id"
                  id="color_id"
                  value="{{ old('color_id')}}"
                  required>

                  <option value="" selected disabled>Seleccionar...</option>
                  @foreach($colors as $color)
                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                  @endforeach
                </select>

                @error('color_id')
                  <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                    {{ $message }}
                  </span>
                @enderror
              </div>
            </div>

            {{-- Sizes --}}
            <div class="-mx-3 md:flex mb-6">
              <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="sizes">
                  Tamaños <small class="text-red-500 font-bold text-sm">*</small>
                </label>

                @foreach($sizes as $size)
                <div class="mt-2">
                  <div>
                    <label class="inline-flex items-center">
                      <input
                        type="checkbox"
                        class="form-checkbox"
                        name="sizes[]"
                        value="{{ $size->id }}">
                      <span class="ml-2">{{ $size->name }}</span>
                    </label>
                  </div>
                </div>
                @endforeach

                @error('sizes')
                  <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                    {{ $message }}
                  </span>
                @enderror
              </div>
            </div>

            {{-- Discount --}}
            <div class="-mx-3 md:flex mb-6">
              <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="discount_id">
                  Aplicar Descuento
                </label>

                <select
                  class="appearance-none block w-full bg-grey-lighter text-grey-darker border @if($errors->has('discount_id')) border-red-500 @endif border-grey-lighter rounded py-3 px-4 mb-3" 
                  name="discount_id"
                  id="discount_id"
                  value="{{ old('discount_id')}}">

                  <option value="" selected disabled>Seleccionar...</option>
                  @foreach($discounts as $discount)
                    <option value="{{ $discount->id }}">{{ $discount->name }} - {{ $discount->discount_percent }}%</option>
                  @endforeach
                </select>

                @error('discount_id')
                  <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                    {{ $message }}
                  </span>
                @enderror
              </div>
            </div>

            {{-- Images --}}
            <div class="-mx-3 md:flex mb-6 flex-wrap">
              <label class="block w-full uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 py-3">
                Subir Imagen
              </label>

              <div class="flex md:w-1/4 px-3 my-4 flex-nowrap flex-col">
                <img src="" width="120" class="img-responsive mx-2 my-3" id="imgPreview" alt="">

                <div class="flex w-full items-center bg-grey-lighter @if($errors->has('image')) border border-red-500 @endif">
                  <label class="w-full flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:text-black">
                      <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                          <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                      </svg>
                      <span class="mt-2 text-base leading-normal">Seleciona Imagen</span>
                      <input type='file' id="image1" name="image1" class="hidden" />
                  </label>
                </div>
              </div>

              <div class="flex md:w-1/4 px-3 my-4 flex-nowrap flex-col">
                <img src="" width="120" class="img-responsive mx-2 my-3" id="imgPreview" alt="">

                <div class="flex w-full items-center bg-grey-lighter @if($errors->has('image')) border border-red-500 @endif">
                  <label class="w-full flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:text-black">
                      <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                          <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                      </svg>
                      <span class="mt-2 text-base leading-normal">Seleciona Imagen</span>
                      <input type='file' id="image2" name="image2" class="hidden" />
                  </label>
                </div>
              </div>

              <div class="flex md:w-1/4 px-3 my-4 flex-nowrap flex-col">
                <img src="" width="120" class="img-responsive mx-2 my-3" id="imgPreview" alt="">

                <div class="flex w-full items-center bg-grey-lighter @if($errors->has('image')) border border-red-500 @endif">
                  <label class="w-full flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:text-black">
                      <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                          <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                      </svg>
                      <span class="mt-2 text-base leading-normal">Seleciona Imagen</span>
                      <input type='file' id="image3" name="image3" class="hidden" />
                  </label>
                </div>
              </div>

              <div class="flex md:w-1/4 px-3 my-4 flex-nowrap flex-col">
                <img src="" width="120" class="img-responsive mx-2 my-3" id="imgPreview" alt="">

                <div class="w-full items-center bg-grey-lighter @if($errors->has('image')) border border-red-500 @endif">
                  <label class="w-full flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:text-black">
                      <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                          <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                      </svg>
                      <span class="mt-2 text-base leading-normal">Seleciona Imagen</span>
                      <input type='file' id="image4" name="image4" class="hidden" />
                  </label>
                </div>
              </div>

              <div class="flex md:w-1/4 px-3 my-4 flex-nowrap flex-col">
                <img src="" width="120" class="img-responsive mx-2 my-3" id="imgPreview" alt="">

                <div class="flex w-full items-center bg-grey-lighter @if($errors->has('image')) border border-red-500 @endif">
                  <label class="w-full flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:text-black">
                      <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                          <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                      </svg>
                      <span class="mt-2 text-base leading-normal">Seleciona Imagen</span>
                      <input type='file' id="image5" name="image5" class="hidden" />
                  </label>
                </div>
              </div>
            </div>
            @error('image')
              <div class="md:w-full">
                <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                  {{ $message }}
                </span>
              </div>
              <br />
            @enderror

            <button 
              type="submit"
              class="uppercase font-center md:w-1/6 p-2 bg-gray-800 hover:bg-gray-700 text-sm space-y-2 text-white rounded-md">
              Crear
            </button>

          </div>

        </form>
      </main>

      <x-slot name="scripts">
        <script src="{{ asset('/js/admin.js') }}"></script>
        <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
        <script>
          CKEDITOR.replace( 'content' );
        </script>
      </x-slot>
  </div>

</x-app-layout>