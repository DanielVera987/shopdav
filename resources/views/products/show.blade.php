<x-shop>
  <!--Nav-->
  <x-slot name="nav">
      <x-nav />
  </x-slot>
  {{ Breadcrumbs::render('product', $product) }}
  <section class="text-gray-700 body-font overflow-hidden bg-white">
    <div class="container px-5 py-24 mx-auto">
      <div class="lg:w-4/5 mx-auto flex flex-wrap">
        <img alt="ecommerce" class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200" src="{{ $product->images[0]->path ?? 'https://placeimg.com/640/480/any' }}">
        <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
          <h2 class="text-sm title-font text-gray-500 tracking-widest uppercase">{{ $product->brand->name }}</h2>
          <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $product->name }}</h1>
          <p class="leading-relaxed">
            {{ $product->description }}
          </p>
          <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">
            <div class="flex">
              <span class="mr-3">Color</span>
              @foreach ($product->color as $colr)
                {{ $colr->name }}
              @endforeach
              <button class="border-2 border-gray-300 ml-1 bg-gray-700 rounded-full w-6 h-6 focus:outline-none"></button>
              <button class="border-2 border-gray-300 ml-1 bg-red-500 rounded-full w-6 h-6 focus:outline-none"></button>
            </div>
            <div class="flex ml-6 items-center">
              <span class="mr-3">Size</span>
              <div class="relative">
                <select class="rounded border appearance-none border-gray-400 py-2 focus:outline-none focus:border-red-500 text-base pl-3 pr-10">
                  @foreach ($product->sizes as $size)
                    <option>{{ $size->name }}</option>
                  @endforeach
                </select>
                <span class="absolute right-0 top-0 h-full w-10 text-center text-gray-600 pointer-events-none flex items-center justify-center">
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24">
                    <path d="M6 9l6 6 6-6"></path>
                  </svg>
                </span>
              </div>
            </div>
          </div>
          <div class="flex">
            <span class="title-font font-medium text-2xl text-gray-900 line-through">$58.00</span>
            <span class="title-font font-medium text-2xl text-gray-900 pl-5">$58.00</span>
            <span class="title-font font-medium text-2xl text-red-900 pl-5"> %50</span>
            <button class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">COMPRAR</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-white py-8">
    <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
      <div class="grid mx-auto grid-cols-1 sm:grid-cols-3 xl:grid-cols-4 gap-6 mt-12">
        @foreach ($products as $product)
            <a href="{{ route('products.show', $product->id) }}">
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
                            <span>Burritos · </span><span>Salads · </span>
                            <span>Mexican · </span><span>Chicken </span>
                        </p>
                        <p class="text-base">$ {{ $product->price }}</p>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    </div>
  </section>
</x-shop>