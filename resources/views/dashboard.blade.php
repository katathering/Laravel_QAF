<x-app-layout>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <h1>Wilkommen bei Q&A</h1>
    <a href="{{ url('/questions') }}"> Alle Fragen </a>

</x-app-layout>

