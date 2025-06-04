<x-layout>
    <x-slot:title>Dashboard</x-slot:title>
    <div class="container py-12">
        <h1 class="text-3xl font-bold">Welcome, {{ auth()->user()->username }}!</h1>
        <p>This is your dashboard.</p>
    </div>
</x-layout>