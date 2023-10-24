<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Trang chủ người dùng') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl m-4 mx-auto sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-lg p-5 md:p-20 mx-2">
            <div class="text-center">
                <h2 class="text-2xl tracking-tight leading-10 font-extrabold text-gray-900 md:text-3xl sm:leading-none">
                    Trang chủ<span class="text-indigo-600 ml-2">Người dùng</span>
                </h2>
                <p class="text-md mt-10"> Chào mừng <span class="font-extrabold text-blue-600 mr-2"> {{Auth::user()->name.'!'}} </span> Là người dùng đã đăng ký, bạn có thể truy cập tất cả các tài nguyên trên trang web của chúng tôi. Cảm ơn bạn!</p>
            </div>
            <div class="md:grid grid-cols-3 mt-10 justify-center gap-5">
                <div class="m-3  min-w-full mx-auto">
                    <p class="bg-white tracking-wide text-gray-800 font-bold rounded border-2 border-blue-500 hover:border-blue-500 hover:bg-blue-500 hover:text-white shadow-md py-2 px-6 items-center">
                        <span class="mx-auto font-extrabold text-blue-800 pr-2">99</span><span> Phần</span>
                    </p>
                </div>
                <div class="m-3  min-w-full mx-auto">
                    <p class="bg-white tracking-wide text-gray-800 font-bold rounded border-2 border-blue-500 hover:border-blue-500 hover:bg-blue-500 hover:text-white shadow-md py-2 px-6 items-center">
                        <span class="mx-auto font-extrabold text-blue-800 pr-2">100</span><span> Tổng số câu hỏi</span>
                    </p>
                </div>
                <div class="m-3  min-w-full mx-auto justify-center">
                    <p class="bg-white tracking-wide text-gray-800 font-bold rounded border-2 border-blue-500 hover:border-blue-500 hover:bg-blue-500 hover:text-white shadow-md py-2 px-6 items-center">
                        <span class="mx-auto font-extrabold text-blue-800 pr-2">200</span><span> Người dùng đã đăng ký</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>