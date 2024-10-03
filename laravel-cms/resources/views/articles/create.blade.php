<x-app-layout>
    <x-slot:pageTitle>
        Articles
    </x-slot>

    <x-slot:header>
        <div class="flex justify-between">
            <h3 class="text-xl">Articles Create</h3>
            <a></a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <section>
                    <form method="post" action="{{ route('articles.store') }}" class="mt-6 space-y-6">
                        @csrf

                        <div>
                            <label for="title" class="block font-medium text-sm text-gray-700">Article Title</label>
                            <input id="title" name="title" type="text" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                        </div>

                        <div>
                            <x-input-label for="body" :value="__('Article Body')" />
                            <x-text-input id="body" name="body" type="text" class="mt-1 block w-full" />
                            <x-input-error :messages="$errors->get('body')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>

