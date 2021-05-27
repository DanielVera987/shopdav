<x-app-layout>

  <x-admin-aside />

  <div class="flex flex-col flex-1 h-full overflow-hidden">
      <x-admin-nav />

      <!-- Main content -->
      <main class="flex-1 max-h-full p-5 overflow-hidden overflow-y-scroll">
        <h3 class="mt-6 text-xl">Actualizar Cupon</h3>
        <br />
        @if (session()->has('success'))
          <x-alert color="green" message="{{ session()->get('success') }}" />
        @endif
        
        @if (session()->has('warning'))
          <x-alert color="red" message="{{ session()->get('fail') }}" />
        @endif

        <form action="{{ route('admin.coupons.update', $coupon->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('put')
          <div class=" px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
            <div class="-mx-3 md:flex mb-6">
              <div class="md:w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="name">
                  Nombre del coupon
                </label>
                <input 
                  class="appearance-none block w-full bg-grey-lighter text-grey-darker border @if($errors->has('name')) border-red-500 @endif rounded py-3 px-4 mb-3" 
                  type="text" 
                  id="name" 
                  name="name"
                  value="{{  $coupon->name }}"
                  placeholder="PROMO" 
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
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="name">
                  Codigo
                </label>
                <input 
                  class="appearance-none block w-full bg-grey-lighter text-grey-darker border @if($errors->has('code')) border-red-500 @endif rounded py-3 px-4 mb-3" 
                  type="text" 
                  id="code" 
                  name="code"
                  value="{{  $coupon->code }}"
                  placeholder="CODE" 
                  required/>
                
                @error('code')
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
                  value="{{  $coupon->discount_percent }}"
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
                  value="1"
                  @if ($coupon->active === 1) {}
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

            <div class="-mx-3 md:flex mb-6">
              <div class="md:w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 @if($errors->has('start_date')) border-red-500 @endif" for="start_date">
                  Iniciar
                </label>
                <input
                  type="date"
                  name="start_date"
                  id="start_date"
                  class="border border-gray-300 rounded-sm outline-none cursor-pointer"
                  value="{{  $coupon->start_date }}"
                />
                
                @error('start_date')
                  <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                    {{ $message }}
                  </span>
                @enderror
              </div>
            </div>

            <div class="-mx-3 md:flex mb-6">
              <div class="md:w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 @if($errors->has('end_date')) border-red-500 @endif" for="end_date">
                  Finalizar
                </label>
                <input
                  type="date"
                  name="end_date"
                  id="end_date"
                  class="border border-gray-300 rounded-sm outline-none cursor-pointer"
                  value="{{  $coupon->end_date }}" 
                />
                
                @error('end_date')
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

      <x-slot name="scripts">
        <script src="{{ asset('/js/admin.js') }}"></script>
      </x-slot>
  </div>

</x-app-layout>