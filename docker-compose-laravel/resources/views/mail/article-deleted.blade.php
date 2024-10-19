<x-mail::message>
# Vas clanak je obrisan

Postovani {{ $author->firstName }},

Administrator {{ $user->firstName }} je obrisao Vas clanak <b>"{{ $article->title }}"</b> zbog krsenja Uvjeta koristenja.

<x-mail::button :url="'https://policies.google.com/terms?hl=hr'">
Provjeri uvjete koristenja
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
