<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Trang chủ Admin') }}
        </h2>
    </x-slot>
    <div class="antialiased text-gray-900 px-6">
        <div class="max-w-xl mx-auto py-12 divide-y md:max-w-4xl">
            <div class="py-8">
                <h1 class="text-4xl font-bold">@tailwindcss/forms examples</h1>
                <p class="mt-2 text-lg text-gray-600">
                    Một thiết lập lại biểu mẫu cố định được thiết kế để làm cho các yếu tố biểu mẫu dễ dàng tạo kiểu với các lớp tiện ích.
                </p>
                <div class="mt-4 flex space-x-4">
                    <a class="text-lg underline" href="https://github.com/tailwindlabs/tailwindcss-forms">Documentation</a>
                    <a class="text-lg underline" href="/kitchen-sink.html">Kitchen Sink</a>
                </div>
            </div>
            <div class="py-12">
                <h2 class="text-2xl font-bold">Unstyled</h2>
                <p class="mt-2 text-lg text-gray-600">Đây là cách các yếu tố biểu mẫu nhìn ra khỏi hộp.</p>
                <div class="mt-8 max-w-md">
                    <div class="grid grid-cols-1 gap-6">
                        <label class="block">
                            <span class="text-gray-700">Tên đầy đủ</span>
                            <input type="text" class="mt-1 block w-full" placeholder="" />
                        </label>
                        <label class="block">
                            <span class="text-gray-700">Địa chỉ Email</span>
                            <input type="email" class="mt-1 block w-full" placeholder="john@example.com" />
                        </label>
                        <label class="block">
                            <span class="text-gray-700">Sự kiện của bạn diễn ra khi nào?</span>
                            <input type="date" class="mt-1 block w-full" />
                        </label>
                        <label class="block">
                            <span class="text-gray-700">Đó là loại sự kiện gì?</span>
                            <select class="block w-full mt-1">
                                <option>Sự kiện công ty</option>
                                <option>Đám cưới</option>
                                <option>Sinh nhật</option>
                                <option>Khác</option>
                            </select>
                        </label>
                        <label class="block">
                            <span class="text-gray-700">Chi tiết bổ sung</span>
                            <textarea class="mt-1 block w-full" rows="3"></textarea>
                        </label>
                        <div class="block">
                            <div class="mt-2">
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" checked />
                                        <span class="ml-2">Gửi email cho tôi tin tức và ưu đãi đặc biệt</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-12">
                <h2 class="text-2xl font-bold">Đơn giản</h2>
                <div class="mt-8 max-w-md">
                    <div class="grid grid-cols-1 gap-6">
                        <label class="block">
                            <span class="text-gray-700">Tên đầy đủ</span>
                            <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="" />
                        </label>
                        <label class="block">
                            <span class="text-gray-700">Địa chỉ Email</span>
                            <input type="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="john@example.com" />
                        </label>
                        <label class="block">
                            <span class="text-gray-700">Sự kiện của bạn diễn ra khi nào?</span>
                            <input type="date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                        </label>
                        <label class="block">
                            <span class="text-gray-700">Đó là loại sự kiện gì?</span>
                            <select class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option>Sự kiện công ty</option>
                                <option>Đám cưới</option>
                                <option>Sinh nhật</option>
                                <option>Khác</option>
                            </select>
                        </label>
                        <label class="block">
                            <span class="text-gray-700">Chi tiết bổ sung</span>
                            <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="3"></textarea>
                        </label>
                        <div class="block">
                            <div class="mt-2">
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50" checked />
                                        <span class="ml-2">Gửi email cho tôi tin tức và ưu đãi đặc biệt</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-12">
                <h2 class="text-2xl font-bold">Underline</h2>
                <div class="mt-8 max-w-md">
                    <div class="grid grid-cols-1 gap-6">
                        <label class="block">
                            <span class="text-gray-700">Tên đầy đủ</span>
                            <input type="text" class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black" placeholder="" />
                        </label>
                        <label class="block">
                            <span class="text-gray-700">Địa chỉ Email</span>
                            <input type="email" class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black" placeholder="john@example.com" />
                        </label>
                        <label class="block">
                            <span class="text-gray-700">Sự kiện của bạn diễn ra khi nào?</span>
                            <input type="date" class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black" />
                        </label>
                        <label class="block">
                            <span class="text-gray-700">Đó là loại sự kiện gì?</span>
                            <select class="block w-full mt-0 px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black">
                                <option>Sự kiện công ty</option>
                                <option>Đám cưới</option>
                                <option>Sinh nhật</option>
                                <option>Khác</option>
                            </select>
                        </label>
                        <label class="block">
                            <span class="text-gray-700">Chi tiết bổ sung</span>
                            <textarea class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black" rows="2"></textarea>
                        </label>
                        <div class="block">
                            <div class="mt-2">
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" class="border-gray-300 border-2 text-black focus:border-gray-300 focus:ring-black" />
                                        <span class="ml-2">Gửi email cho tôi tin tức và ưu đãi đặc biệt</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-12">
                <h2 class="text-2xl font-bold">Solid</h2>
                <div class="mt-8 max-w-md">
                    <div class="grid grid-cols-1 gap-6">
                        <label class="block">
                            <span class="text-gray-700">Tên đầy đủ</span>
                            <input type="text" class="mt-1 block w-full rounded-md bg-green-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" placeholder="" />
                        </label>
                        <label class="block">
                            <span class="text-gray-700">Địa chỉ Email</span>
                            <input type="email" class="mt-1 block w-full rounded-md bg-green-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" placeholder="john@example.com" />
                        </label>
                        <label class="block">
                            <span class="text-gray-700">Sự kiện của bạn diễn ra khi nào?</span>
                            <input type="date" class="mt-1 block w-full rounded-md bg-green-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" />
                        </label>
                        <label class="block">
                            <span class="text-gray-700">Đó là loại sự kiện gì?</span>
                            <select class="block w-full mt-1 rounded-md bg-green-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0">
                                <option>Sự kiện công ty</option>
                                <option>Đám cưới</option>
                                <option>Sinh nhật</option>
                                <option>Khác</option>
                            </select>
                        </label>
                        <label class="block">
                            <span class="text-gray-700">Chi tiết bổ sung</span>
                            <textarea class="mt-1 block w-full rounded-md bg-green-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" rows="3"></textarea>
                        </label>
                        <div class="block">
                            <div class="mt-2">
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" class="rounded bg-green-200 border-transparent focus:border-transparent focus:bg-gray-200 text-gray-700 focus:ring-1 focus:ring-offset-2 focus:ring-gray-500" />
                                        <span class="ml-2">Gửi email cho tôi tin tức và ưu đãi đặc biệt</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>