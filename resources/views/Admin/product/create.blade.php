@props(['categories'])
<x-admin.layout>
    <section class="lg:py-[50px] lg:px-[50px] py-[20px] px-[10px] min-h-screen" style="font-family: MTNBrighterSans-Regular">
        <h1 class="text-[22px] font-bold border-b border-blue-600 mb-[20px] text-center">Create New Product</h1>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-[20px]">
            @csrf

            <!-- Product Name -->
            <div>
                <label class="block mb-1 font-semibold">Product Name</label>
                <input type="text" name="product_name" class="w-full border rounded-md px-3 py-2" required>
                <x-error name="product_name"></x-error>
            </div>

            <!-- Description -->
            <div>
                <label class="block mb-1 font-semibold">Description</label>
                <textarea name="description" class="w-full border rounded-md px-3 py-2 h-[120px]" required></textarea>
                <x-error name="description"></x-error>
            </div>

            <!-- Quantity & Price -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-[20px]">
                <div class="w-full">
                    <label class="block mb-1 font-semibold">Quantity</label>
                    <input type="number" name="quantity" class="w-full border rounded-md px-3 py-2" min="1" required>
                </div>
                <div class="w-full">
                    <label class="block mb-1 font-semibold">Price</label>
                    <input type="number" name="price" step="0.01" class="w-full border rounded-md px-3 py-2" required>
                </div>
                <div class="w-full">
                    <label class="block mb-1 font-semibold">Category</label>
                    <select name="category" class="w-full border rounded-md px-3 py-2" required>
                        <option disabled selected >Category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                    <x-error name="category"></x-error>
                </div>
            </div>

            <!-- Multiple Images Upload -->
            <div>
                <label class="block mb-1 font-semibold">Product Images</label>
                <input type="file" name="images[]" multiple class="w-full border rounded-md px-3 py-2">
                <p class="text-sm text-gray-500 mt-1">You can upload multiple images</p>
                <x-error name="images[]"></x-error>
            </div>

            <!-- Submit -->
            <div class="flex gap-[20px]">
                <a href="{{ route('admin.products') }}"
                   class="text-center w-full py-[10px] bg-gray-500 text-white rounded-md shadow-md">
                    Cancel
                </a>
                <button type="submit"
                        class="text-center w-full py-[10px] bg-blue-600 text-white rounded-md shadow-md">
                    Create Product
                </button>
            </div>
        </form>
    </section>
</x-admin.layout>
