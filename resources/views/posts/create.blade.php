<x-layout>
    <section class="px-6 py-8 max-w-sm mx-auto">
        <form action="/admin/posts" method="POST">
            @csrf
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
                    Title
                </label>
                <input type="text" class="border border-gray-400 p-2 w-full"
                       name="title"
                       id="title"
                       value="{{ old('title') }}}"
                       required
                >
                @error('title')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="slug" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Slug
                </label>

                <input type="text" class="border border-gray-400 p-2 w-full" name="slug" id="slug"
                       value="{{ old('slug') }}}"
                       required>

                @error('slug')

                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="excerpt">
                    Excerpt
                </label>
                <textarea name="excerpt" id="excerpt" cols="30" rows="4"
                          class="border border-gray-400 p-2 w-full resize-none"></textarea>

                @error('excerpt')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="body">Excerpt</label>
                <textarea name="body" id="body" cols="30" rows="6"
                          class="border border-gray-400 p-2 w-full resize-none"></textarea>
                @error('body')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category_id">Category</label>
                <select name="category_id" id="category_id">
                    @foreach(App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                @error('category')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <x-submit-button>
                Publish
            </x-submit-button>
        </form>
    </section>
</x-layout>
