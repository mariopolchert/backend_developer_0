<x-app-layout>
    <x-slot:pageTitle>
        Articles
    </x-slot>

    <x-slot:header>
        <div class="flex justify-between items-center">
            <h3 class="text-xl">Articles Index</h3>
            <a href="{{ route('articles.create') }}" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create new Article</a>
        </div>
    </x-slot>

    @foreach ($articles as $article)
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <section class="space-y-6">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ $article->title }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                                {{ $article->body }}
                            </p>
                        </header>
                    </section>
                </div>
            </div>
        </div>
    @endforeach

    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        {{ $articles->links() }}
    </div>
</x-app-layout>

