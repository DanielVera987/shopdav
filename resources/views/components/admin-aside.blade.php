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
    <li>
        <a
            href="{{ route('admin.subcategories.index') }}"
            class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
            :class="{'justify-center': !isSidebarOpen}">
            <span>
                <svg class="w-6 h-6 text-gray-400" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sitemap" class="svg-inline--fa fa-sitemap fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M128 352H32c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h96c17.67 0 32-14.33 32-32v-96c0-17.67-14.33-32-32-32zm-24-80h192v48h48v-48h192v48h48v-57.59c0-21.17-17.23-38.41-38.41-38.41H344v-64h40c17.67 0 32-14.33 32-32V32c0-17.67-14.33-32-32-32H256c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h40v64H94.41C73.23 224 56 241.23 56 262.41V320h48v-48zm264 80h-96c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h96c17.67 0 32-14.33 32-32v-96c0-17.67-14.33-32-32-32zm240 0h-96c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h96c17.67 0 32-14.33 32-32v-96c0-17.67-14.33-32-32-32z"></path></svg>
            </span>
            <span :class="{ 'lg:hidden': !isSidebarOpen }">Sub-Categorias</span>
        </a>
    </li>
    <li>
        <a
            href="{{ route('admin.brands.index') }}"
            class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
            :class="{'justify-center': !isSidebarOpen}">
            <span>
                <svg class="w-6 h-6 text-gray-400" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="shield-alt" class="svg-inline--fa fa-shield-alt fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M466.5 83.7l-192-80a48.15 48.15 0 0 0-36.9 0l-192 80C27.7 91.1 16 108.6 16 128c0 198.5 114.5 335.7 221.5 380.3 11.8 4.9 25.1 4.9 36.9 0C360.1 472.6 496 349.3 496 128c0-19.4-11.7-36.9-29.5-44.3zM256.1 446.3l-.1-381 175.9 73.3c-3.3 151.4-82.1 261.1-175.8 307.7z"></path></svg>
            </span>
            <span :class="{ 'lg:hidden': !isSidebarOpen }">Marcas</span>
        </a>
    </li>
    <li>
        <a
            href="{{ route('admin.discounts.index') }}"
            class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
            :class="{'justify-center': !isSidebarOpen}">
            <span>
                <svg class="w-6 h-6 text-gray-400" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="percent" class="svg-inline--fa fa-percent fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M112 224c61.9 0 112-50.1 112-112S173.9 0 112 0 0 50.1 0 112s50.1 112 112 112zm0-160c26.5 0 48 21.5 48 48s-21.5 48-48 48-48-21.5-48-48 21.5-48 48-48zm224 224c-61.9 0-112 50.1-112 112s50.1 112 112 112 112-50.1 112-112-50.1-112-112-112zm0 160c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zM392.3.2l31.6-.1c19.4-.1 30.9 21.8 19.7 37.8L77.4 501.6a23.95 23.95 0 0 1-19.6 10.2l-33.4.1c-19.5 0-30.9-21.9-19.7-37.8l368-463.7C377.2 4 384.5.2 392.3.2z"></path></svg>
            </span>
            <span :class="{ 'lg:hidden': !isSidebarOpen }">Descuentos</span>
        </a>
    </li>
    <li>
        <a
            href="{{ route('admin.brands.index') }}"
            class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
            :class="{'justify-center': !isSidebarOpen}">
            <span>
                <svg class="w-6 h-6 text-gray-400" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ticket-alt" class="svg-inline--fa fa-ticket-alt fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M128 160h320v192H128V160zm400 96c0 26.51 21.49 48 48 48v96c0 26.51-21.49 48-48 48H48c-26.51 0-48-21.49-48-48v-96c26.51 0 48-21.49 48-48s-21.49-48-48-48v-96c0-26.51 21.49-48 48-48h480c26.51 0 48 21.49 48 48v96c-26.51 0-48 21.49-48 48zm-48-104c0-13.255-10.745-24-24-24H120c-13.255 0-24 10.745-24 24v208c0 13.255 10.745 24 24 24h336c13.255 0 24-10.745 24-24V152z"></path></svg>
            </span>
            <span :class="{ 'lg:hidden': !isSidebarOpen }">Cupones</span>
        </a>
    </li>
    <li>
        <a
            href="{{ route('admin.brands.index') }}"
            class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
            :class="{'justify-center': !isSidebarOpen}">
            <span>
                <svg class="w-6 h-6 text-gray-400" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="shopping-cart" class="svg-inline--fa fa-shopping-cart fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M528.12 301.319l47.273-208C578.806 78.301 567.391 64 551.99 64H159.208l-9.166-44.81C147.758 8.021 137.93 0 126.529 0H24C10.745 0 0 10.745 0 24v16c0 13.255 10.745 24 24 24h69.883l70.248 343.435C147.325 417.1 136 435.222 136 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-15.674-6.447-29.835-16.824-40h209.647C430.447 426.165 424 440.326 424 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-22.172-12.888-41.332-31.579-50.405l5.517-24.276c3.413-15.018-8.002-29.319-23.403-29.319H218.117l-6.545-32h293.145c11.206 0 20.92-7.754 23.403-18.681z"></path></svg>
            </span>
            <span :class="{ 'lg:hidden': !isSidebarOpen }">Productos</span>
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