<x-shop>
  <!--Nav-->
  <x-slot name="nav">
      <x-nav />
  </x-slot>

  <div>
    <div class="container mx-auto">
      {{ Breadcrumbs::render('checkout') }}
      <div class="flex flex-col mt-9">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Productos
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Cantidad
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Precio
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                      <span class="sr-only">Edit</span>
                    </th>
                  </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                  @if ($cart->count() > 0)
                    @foreach ($cart as $item)
                      <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                              <img class="h-10 w-10 " src="{{ $item->attributes->image }}" alt="">
                            </div>
                            <div class="ml-4">
                              <div class="text-sm font-medium text-gray-900">
                                {{ $item->name }}
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          {{ $item->quantity }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                          {{ $item->price }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right">
                          <form action="{{ route('cart.removeitem', $item->id) }}" method="POST">
                            @csrf
                            <button href="" class="text-red-600 hover:text-red-900"><i class="fa fa-trash"></i></button>
                          </form>
                        </td>
                      </tr>
                    @endforeach   
                  @else
                    <tr>
                      <td colspan="3" class="px-6 py-4 whitespace-nowrap">
                        <div class="text-center">
                          <div class="text-sm font-medium text-gray-900">
                            El Carrito Esta Vacio
                          </div>
                      </td>
                    </tr>
                  @endif
                   
                </tbody>
              </table>

            </div>
            <div class="my-10 text-center font-medium">
              @if ($cart->count() > 0)
                <a class="hover:text-gray-300" href="{{ route('cart.clear') }}">Limpiar Carrito</a>
              @else
                <a class="hover:text-gray-300" href="{{ route('cart.clear') }}" class="text-center mx-auto">Seguir Comprando</a>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</x-shop>