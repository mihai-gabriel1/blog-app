<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <img src="/images/illustration-1.png" alt="" class="rounded-xl">

                    <p class="mt-4 block text-gray-400 text-xs">
                        Published
                        <time>{{ $post->created_at->diffForHumans() }}</time>
                    </p>

                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        <img src="/images/lary-avatar.svg" alt="Lary avatar">
                        <div class="ml-3 text-left">
                            <h5 class="font-bold">{{ $post->author->name }}</h5>
                        </div>
                    </div>
                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/"
                           class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                          d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            Back to Posts
                        </a>

                        <div class="space-x-2">
                            <x-category-button :category="$post->category"/>
                        </div>
                    </div>

                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{ $post->title }}
                    </h1>

                    <div class="space-y-4 lg:text-lg leading-loose">{!! $post->body !!}</div>
                </div>

                <section class="col-span-8 col-start-5 mt-10 space-y-6">
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

                    @foreach($post->comments as $comment)
                        <x-post-comment :comment="$comment"/>
                    @endforeach
                </section>
                @endauth
            </article>
        </main>
    </section>
</x-layout>
