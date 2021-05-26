<x-app-layout>

  <x-admin-aside />

  <div class="flex flex-col flex-1 h-full overflow-hidden">
      <x-admin-nav />

      <!-- Main content -->
      <main class="flex-1 max-h-full p-5 overflow-hidden overflow-y-scroll">
        <h3 class="mt-6 text-xl">Actualizar Descuento</h3>
        <br />
        @if (session()->has('success'))
          <x-alert color="green" message="{{ session()->get('success') }}" />
        @endif
        
        @if (session()->has('warning'))
          <x-alert color="red" message="{{ session()->get('fail') }}" />
        @endif

        <form action="{{ route('admin.discounts.update', $discount->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class=" px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
            <div class="-mx-3 md:flex mb-6">
              <div class="md:w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="name">
                  Nombre del Descuento
                </label>
                <input 
                  class="appearance-none block w-full bg-grey-lighter text-grey-darker border @if($errors->has('name')) border-red-500 @endif rounded py-3 px-4 mb-3" 
                  type="text" 
                  id="name" 
                  name="name"
                  value="{{ $discount->name }}"
                  placeholder="Descuento del día" 
                  required/>
                
                @error('name')
                  <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                    {{ $message }}
                  </span>
                @enderror
              </div>
            </div>

            <div class="-mx-3 md:flex mb-6">
              <div class="md:w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="description">
                  Descripción
                </label>
                <input 
                  class="appearance-none block w-full bg-grey-lighter text-grey-darker border @if($errors->has('description')) border-red-500 @endif rounded py-3 px-4 mb-3" 
                  type="text" 
                  id="description" 
                  name="description"
                  value="{{ $discount->description }}"
                  placeholder="El 50% de descuento en nuestros productos validos" 
                  required/>
                
                @error('description')
                  <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                    {{ $message }}
                  </span>
                @enderror
              </div>
            </div>

            <div class="-mx-3 md:flex mb-6">
              <div class="md:w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="discount_percent">
                  Porcentaje
                </label>
                <input 
                  class="appearance-none block w-full bg-grey-lighter text-grey-darker border @if($errors->has('discount_percent')) border-red-500 @endif rounded py-3 px-4 mb-3" 
                  type="text" 
                  id="discount_percent" 
                  name="discount_percent"
                  value="{{ $discount->discount_percent }}"
                  placeholder="50" 
                  required/>
                
                @error('discount_percent')
                  <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                    {{ $message }}
                  </span>
                @enderror
              </div>
            </div>

            <div class="-mx-3 md:flex mb-6">
              <div class="md:w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="active">
                  Activar
                </label>
                <input
                  type="checkbox"
                  name="active"
                  id="active"
                  class="appearance-none w-6 h-6 border border-gray-300 rounded-sm outline-none cursor-pointer checked:bg-blue-400"
                  value="{{ $discount->active }}"
                  @if ($discount->active === 1) {}
                    checked="true"
                  @endif
                />
                
                @error('active')
                  <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                    {{ $message }}
                  </span>
                @enderror
              </div>
            </div>


            <button 
              type="submit"
              class="uppercase font-center sm:w-1/6 p-2 bg-gray-800 hover:bg-gray-700 text-sm space-y-2 text-white rounded-md"
              >
              Crear
            </button>

          </div>

          
        </form>

      </main>
  </div>

</x-app-layout>