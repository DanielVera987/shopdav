<!-- Sidebar -->
<aside
x-transition:enter="transition transform duration-300"
x-transition:enter-start="-translate-x-full opacity-30  ease-in"
x-transition:enter-end="translate-x-0 opacity-100 ease-out"
x-transition:leave="transition transform duration-300"
x-transition:leave-start="translate-x-0 opacity-100 ease-out"
x-transition:leave-end="-translate-x-full opacity-0 ease-in"
class="fixed inset-y-0 z-10 flex flex-col flex-shrink-0 w-64 max-h-screen overflow-hidden transition-all transform bg-white border-r shadow-lg lg:z-30 lg:static lg:shadow-none"
:class="{'-translate-x-full lg:translate-x-0 lg:w-20': !isSidebarOpen}">
<!-- sidebar header -->
<div class="flex items-center justify-between flex-shrink-0 p-2" :class="{'lg:justify-center': !isSidebarOpen}">
<span class="p-2 text-xl font-semibold leading-8 tracking-wider uppercase whitespace-nowrap">
    {{ config('app.name', 'SHOPDAV') }}<span :class="{'lg:hidden': !isSidebarOpen}"></span>
</span>
<button @click="toggleSidbarMenu()" class="p-2 rounded-md lg:hidden">
    <svg
    class="w-6 h-6 text-gray-600"
    xmlns="http://www.w3.org/2000/svg"
    fill="none"
    viewBox="0 0 24 24"
    stroke="currentColor"
    >
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
    </svg>
</button>
</div>
<!-- Sidebar links -->
<nav class="flex-1 overflow-hidden hover:overflow-y-auto">
<ul class="p-2 overflow-hidden">
    <li>
        <a
            href="{{ route('dashboard') }}"
            class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
            :class="{'justify-center': !isSidebarOpen}">
            <span>
            <svg
                class="w-6 h-6 text-gray-400"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                />
            </svg>
            </span>
            <span :class="{ 'lg:hidden': !isSidebarOpen }">Dashboard</span>
        </a>
    </li>
    <li>
        <a
            href="{{ route('admin.categories.index') }}"
            class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
            :class="{'justify-center': !isSidebarOpen}">
            <span>
                <svg class="w-6 h-6 text-gray-400" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="buffer" class="svg-inline--fa fa-buffer fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M427.84 380.67l-196.5 97.82a18.6 18.6 0 0 1-14.67 0L20.16 380.67c-4-2-4-5.28 0-7.29L67.22 350a18.65 18.65 0 0 1 14.69 0l134.76 67a18.51 18.51 0 0 0 14.67 0l134.76-67a18.62 18.62 0 0 1 14.68 0l47.06 23.43c4.05 1.96 4.05 5.24 0 7.24zm0-136.53l-47.06-23.43a18.62 18.62 0 0 0-14.68 0l-134.76 67.08a18.68 18.68 0 0 1-14.67 0L81.91 220.71a18.65 18.65 0 0 0-14.69 0l-47.06 23.43c-4 2-4 5.29 0 7.31l196.51 97.8a18.6 18.6 0 0 0 14.67 0l196.5-97.8c4.05-2.02 4.05-5.3 0-7.31zM20.16 130.42l196.5 90.29a20.08 20.08 0 0 0 14.67 0l196.51-90.29c4-1.86 4-4.89 0-6.74L231.33 33.4a19.88 19.88 0 0 0-14.67 0l-196.5 90.28c-4.05 1.85-4.05 4.88 0 6.74z"></path></svg>
            </span>
            <span :class="{ 'lg:hidden': !isSidebarOpen }">Categorias</span>
        </a>
    </li>
    <!-- Sidebar Links... -->
</ul>
</nav>

<!-- Sidebar footer -->
<div class="flex-shrink-0 p-2 border-t max-h-14">
<button
    class="flex items-center justify-center w-full px-4 py-2 space-x-1 font-medium tracking-wider uppercase bg-gray-100 border rounded-md focus:outline-none focus:ring">
    <span>
    <svg
        class="w-6 h-6"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
    >
        <path
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width="2"
        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
        />
    </svg>
    </span>
    <span :class="{'lg:hidden': !isSidebarOpen}"> Logout </span>
</button>
</div>
</aside>