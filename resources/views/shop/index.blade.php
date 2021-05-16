<x-shop>
  <!--Nav-->
  <x-slot name="nav">
      <x-nav />
  </x-slot>

  <div>
    <div class="w-full flex flex-col lg:flex-row lg:px-6">
      <div class="w-full lg:w-56 relative">

        <!-- SideBar Mobile -->
        <div class="py-3 bg-white w-full flex items-center justify-center lg:hidden cursor-pointer font-bold" >
          Change Filters
          <svg
            aria-hidden="true"
            focusable="false"
            data-prefix="fas"
            data-icon="sliders-h"
            class="svg-inline--fa fa-sliders-h fa-w-16 text-xl ml-2"
            role="img"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 512 512"
            width=20
          >
            <path
              fill="currentColor"
              d="M496 384H160v-16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v16H16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h80v16c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-16h336c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zm0-160h-80v-16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v16H16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h336v16c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-16h80c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zm0-160H288V48c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v16H16C7.2 64 0 71.2 0 80v32c0 8.8 7.2 16 16 16h208v16c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-16h208c8.8 0 16-7.2 16-16V80c0-8.8-7.2-16-16-16z"
            ></path>
          </svg>
        </div>

        <!-- On mobile hide and show this section using hidden and flex begin -->
        <div
          class="hidden absolute left-0 px-6 lg:px-auto bg-white w-full lg:w-auto z-40 mt-10 lg:mt-0 lg:sticky top-0 pt-6 pb-24 lg:flex flex-col"
          >
          <div class="border-b border-gray-300">
            <a class="text-sm font-bold underline">
              Change Address
            </a>
          </div>

          <div class="flex-1">
            <div class="border-b border-gray-300 py-6">
              <div class="flex items-center justify-between cursor-pointer">
                <h5 class="text-sm font-bold">Ordenar</h5>
              </div>
              <div class="my-6">
                <div class="">
                  <div class="">
                    <div class="flex items-center mb-3 last:mb-0">
                      <input
                        name="sort"
                        type="radio"
                        class="appearance-none w-6 h-6 border border-gray-300 rounded-full outline-none cursor-pointer checked:bg-blue-400"
                        id="distance-sort"
                        value="distance"
                      /><label class="ml-2 text-sm" for="distance-sort"
                        >precios bajos y altos</label
                      >
                    </div>
                    <div class="flex items-center mb-3 last:mb-0">
                      <input
                        name="sort"
                        type="radio"
                        class="appearance-none w-6 h-6 border border-gray-300 rounded-full outline-none cursor-pointer checked:bg-blue-400"
                        id="popular-sort"
                        value="popular"
                      /><label class="ml-2 text-sm" for="popular-sort"
                        >precios altos y bajos</label
                      >
                    </div>
                    <div class="flex items-center mb-3 last:mb-0">
                      <input
                        name="sort"
                        type="radio"
                        class="appearance-none w-6 h-6 border border-gray-300 rounded-full outline-none cursor-pointer checked:bg-blue-400"
                        id="topRated-sort"
                        value="topRated"
                        checked=""
                      /><label class="ml-2 text-sm" for="topRated-sort"
                        >Mas Comprados</label
                      >
                    </div>
                    <div class="flex items-center mb-3 last:mb-0">
                      <input
                        name="sort"
                        type="radio"
                        class="appearance-none w-6 h-6 border border-gray-300 rounded-full outline-none cursor-pointer checked:bg-blue-400"
                        id="topRated-sort"
                        value="topRated"
                        checked=""
                      /><label class="ml-2 text-sm" for="topRated-sort"
                        >Descuentos</label
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="border-b border-gray-300 py-6">
              <div class="flex items-center justify-between cursor-pointer">
                <h5 class="text-sm font-bold">Categorias</h5>
              </div>
              @foreach ($categories as $category)    
                <div class="my-6">
                  <div class="w-full flex items-center">
                    <input
                      type="checkbox"
                      name="organic"
                      class="appearance-none w-6 h-6 border border-gray-300 rounded-sm outline-none cursor-pointer checked:bg-blue-400"
                      value="{{ $category->id }}"
                    /><label class="ml-2 text-sm" for="organic">{{ $category->name }}</label>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
        <!-- On mobile hide and show this section using hidden and flex end -->
      </div>
      <div class="flex-1 lg:pl-12 py-6 px-6 lg:px-0">
        <div
          class="w-full px-6 py-3 rounded-sm border text-gray-900 bg-gray-300 border-gray-400"
          role="alert"
        >
          We are now offering contactless delivery in light of COVID-19.
        </div>
        <div class="mt-12">
          <h1 class="text-3xl font-bold">Recomendaciones</h1>
          <div class="grid grid-cols-1 sm:grid-cols-3 xl:grid-cols-4 gap-6 mt-12">
            @foreach($products as $product)
            <a href="{{ route('products.show',$product->id) }}">
              <div class="mx-auto cursor-pointer h-full hover:border-gray-400 transform transition-all duration-200 ease hover:-translate-y-1 shadow-sm w-72 max-w-full border border-gray-300 rounded-sm bg-white">
                <div class="w-full h-48">
                  <img
                    src="{{ $product->images[0]->path ?? 'https://placeimg.com/640/480/any' }}"
                    class="w-full h-full object-cover"
                    />
                </div>
                <div class="p-6">
                  <div class="text-sm">
                    <h3 class="font-bold text-base">{{ $product->name }}</h3>
                    <p class="mt-1">
                      <span class="text-gray-400">{{ $product->brand->name }}</span>
                    </p>
                    <p class="mt-1">
                      <span>{{ $product->subcategory->name }} · </span>
                    </p>
                    <p>
                      <span class="text-lg font-bold"> ${{ $product->price }}</span>
                      @if ($product->discunt != null)  
                        <span class="line-through"> ${{ $product->price }}</span>
                        <span class="line-through"> ${{ $product->discount->discount_percent }}</span>
                      @endif
                    </p>
                    <p class="text-center">
                      <button class="w-full py-2 rounded bg-gray-300 uppercase font-bold hover:bg-gray-400" href="#">CARRITO</button>
                    </p>
                  </div>
                </div>
                
              </div>
            </a>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>

</x-shop>