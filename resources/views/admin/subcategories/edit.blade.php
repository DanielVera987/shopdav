<x-app-layout>

  <x-admin-aside />

  <div class="flex flex-col flex-1 h-full overflow-hidden">
      <x-admin-nav />

      <!-- Main content -->
      <main class="flex-1 max-h-full p-5 overflow-hidden overflow-y-scroll">
        <h3 class="mt-6 text-xl">Actualizar Sub-Categoria</h3>
        <br />
        @if (session()->has('success'))
          <x-alert color="green" message="{{ session()->get('success') }}" />
        @endif
        
        @if (session()->has('warning'))
          <x-alert color="red" message="{{ session()->get('fail') }}" />
        @endif

        <form action="{{ route('admin.subcategories.update', $subcategory->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class=" px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
            <div class="-mx-3 md:flex mb-6">
              <div class="md:w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="name">
                  Nombre de Sub-Categoria
                </label>
                <input 
                  class="appearance-none block w-full bg-grey-lighter text-grey-darker border @if($errors->has('name')) border-red-500 @endif rounded py-3 px-4 mb-3" 
                  type="text" 
                  id="name" 
                  name="name"
                  value="{{ $subcategory->name }}"
                  placeholder="Computadoras" 
                  required/>
                
                @error('name')
                  <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                    {{ $message }}
                  </span>
                @enderror
              </div>
            </div>

            <div class="-mx-3 md:flex mb-6">
              <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="description">
                  Descripción
                </label>
                <input 
                  class="appearance-none block w-full bg-grey-lighter text-grey-darker border @if($errors->has('description')) border-red-500 @endif border-grey-lighter rounded py-3 px-4 mb-3" 
                  type="text" 
                  name="description"
                  id="description" 
                  value="{{ $subcategory->description }}"
                  placeholder="Categoria de Computadoras" 
                  required
                />

                @error('description')
                  <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                    {{ $message }}
                  </span>
                @enderror
              </div>
            </div>

            <div class="-mx-3 md:flex mb-6">
              <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="description">
                  Categoria Relacionada
                </label>
                <select
                  class="appearance-none block w-full bg-grey-lighter text-grey-darker border @if($errors->has('description')) border-red-500 @endif border-grey-lighter rounded py-3 px-4 mb-3" 
                  name="category_id"
                  id="category_id" 
                  value="{{ old('category_id')}}"
                  placeholder="Categoria de Computadoras"
                  required>
                  
                  <option value="" disabled>Seleccionar...</option>
                  @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($subcategory->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                  @endforeach
                </select>

                @error('category_id')
                  <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                    {{ $message }}
                  </span>
                @enderror
              </div>
            </div>

            <div class="-mx-3 md:flex mb-6">
              <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="image">
                  Subir Imagen
                </label>
                <img src="{{ asset($subcategory->image) }}" width="120" class="img-responsive mx-2 my-3" id="imgPreview" alt="">
                <div class="flex w-full items-center justify-center bg-grey-lighter @if($errors->has('image')) border border-red-500 @endif">
                  <label class="w-full flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:text-black">
                      <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                          <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                      </svg>
                      <span class="mt-2 text-base leading-normal">Seleciona Imagen</span>
                      <input type='file' id="image" name="image" class="hidden" />
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
              class="uppercase font-center sm:w-1/6 p-2 bg-gray-800 hover:bg-gray-700 text-sm space-y-2 text-white rounded-md"
              >
              Crear
            </button>

          </div>

          
        </form>
      </main>
      
      <x-slot name="scripts">
        <script src="{{ asset('/js/admin.js') }}"></script>
      </x-slot>
  </div>

</x-app-layout>