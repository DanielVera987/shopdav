<x-app-layout>

  <x-admin-aside />

  <div class="flex flex-col flex-1 h-full overflow-hidden">
      <x-admin-nav />

      <!-- Main content -->
      <main class="flex-1 max-h-full p-5 overflow-hidden overflow-y-scroll">

        <div class="flex justify-between">

          <h3 class="flex items-centermt-6 text-xl">Lista de SubCategorias</h3>
          
          <a href="{{ route('admin.subcategories.create') }}" class="flex items-center p-2 bg-gray-800 hover:bg-gray-700 text-sm space-y-2 text-white rounded-md">
              <span>Crear Nuevo</span>
          </a>

        </div>

        <br />
        @if (session()->has('success'))
          <x-alert color="green" message="{{ session()->get('success') }}" />
        @endif
        
        @if (session()->has('warning'))
          <x-alert color="red" message="{{ session()->get('fail') }}" />
        @endif


        <div class="flex flex-col mt-6">

          <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">

            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">

              <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">

                <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">

                    <thead class="bg-gray-50">
                      <tr>
                          <th
                            scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                              Nombre
                          </th>
                          <th
                            scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                              Descripción
                          </th>
                          <th
                            scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                              Categoria
                          </th>
                          <th
                            scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                              Imagen
                          </th>
                          <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                          </th>
                      </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                      @foreach ($subcategories as $subcategory)                        
                        <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                          <td class="px-6 py-4 whitespace-nowrap">
                              <div class="flex items-center">
                                
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $subcategory->name }}</div>
                                </div>
                              </div>
                          </td>
                          <td class="px-6 py-4 whitespace-wrap">
                              <div class="text-sm text-gray-900">{{ $subcategory->description }}</div>
                          </td>
                          <td class="px-6 py-4 whitespace-wrap">
                            <div class="text-sm text-gray-900">{{ $subcategory->category->name }}</div>
                        </td>
                          <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                            <div class="flex-shrink-0 w-10 h-10">
                              <img
                              class="w-10 h-10 rounded-full"
                              @if (Storage::disk('subcategories')->exists($subcategory->image))
                                src="{{ asset("/storage/subcategories/{$subcategory->image}") }}"
                              @else
                                src="https://via.placeholder.com/150"
                              @endif
                              alt=""
                              />
                          </div>
                          </td>
                          <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                            <a href="{{ route('admin.subcategories.edit', $subcategory->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            <form action="{{ route('admin.subcategories.destroy', $subcategory->id) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="text-indigo-600 hover:text-indigo-900">Eliminar</button>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>

                </table>

              </div>

            </div>

          </div>

        </div>

      </main>
      
  </div>

</x-app-layout>