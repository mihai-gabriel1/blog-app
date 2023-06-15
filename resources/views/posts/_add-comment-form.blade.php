@auth()
    <x-panel>
        <form method="POST" action="/posts/{{ $post->slug }}/comments"
              class="border border-gray-200 p-6 rounded-xl">
            @csrf

            <header class="flex items-center gap-2">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40"
                     class="rounded-xl">
                <h2>Want to participate?</h2>
            </header>

            <div>
                <textarea name="body" class="w-full mt-3 p-1" id="" cols="30" rows="7"
                          placeholder="Quick, share your thoughts on this article!">
                </textarea>

                @error('body')
                <span class="text-xs" style="color: red">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <button style="background: blue" type="submit"
                        class="hover:bg-black text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl">
                    Post
                </button>
            </div>
        </form>
    </x-panel>
@endauth
