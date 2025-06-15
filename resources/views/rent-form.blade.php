<x-layout>
    <x-slot:title>Rent {{ $car->brand }} {{ $car->model }}</x-slot:title>

    <x-navbar />
    <section class="container py-12">
        <h2 class="text-2xl font-semibold text-center">Rent {{ $car->brand }} {{ $car->model }}</h2>
        <div class="bg-white rounded-xl p-6 shadow-sm border/50 mt-4">
            <form action="{{ route('cars.rent.process', $car->id) }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="rental_date" class="block text-sm font-medium">Rental Date</label>
                    <input type="date" id="rental_date" name="rental_date" class="w-full p-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="duration" class="block text-sm font-medium">Duration (days)</label>
                    <input type="number" id="duration" name="duration" class="w-full p-2 border rounded" min="1" required>
                </div>
                <button type="submit" class="w-full btn-primary sm:py-4 sm:text-lg lg:text-base">
                    Confirm Rental
                </button>
            </form>
        </div>
    </section>
    <x-footer />
</x-layout>