<x-mail::message>
# Novi clanak je kreiran

Pozdrav korisnice {{ $user->firstName }} upravo ste kreirali novi clanak sa nslovom {{ $article->title }}

<x-mail::button :url="route('articles.show', $article)">
Pogledaj ga ovdje
</x-mail::button>

Hvala,<br>
{{ config('app.name') }}
</x-mail::message>
