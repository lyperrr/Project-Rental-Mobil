{{-- Rental Form --}}
<div class="w-full max-w-md bg-white rounded-xl p-6 shadow-md shadow-orange-200">
    <h2 class="text-xl font-bold mb-10 text-center">Login To Your Account</h2>
    <form action="#" method="POST" class="space-y-4">
      @csrf

      {{-- Rental Type --}}
      <div>
        <label class="block text-sm font-semibold text-black mb-1">Rental Type</label>
        <div class="flex flex-wrap gap-4 text-sm text-black">
          @foreach (['Hours', 'Days', 'Weeks', 'Month'] as $type)
            <label class="flex items-center space-x-1">
              <input type="radio" name="rental_type" class="accent-orange-500" {{ $loop->first ? 'checked' : '' }}>
              <span>{{ $type }}</span>
            </label>
          @endforeach
        </div>
      </div>

{{-- Pickup Location --}}
<div>
<label class="block text-sm font-semibold mb-1 text-black">Pickup Location</label>
<select name="pickup_location" class="w-full border border-orange-300 rounded-md px-3 py-2 text-sm focus:outline-orange-500">
  <option disabled selected>Select Location</option>
  <option value="Ngurah Rai International Airport">Ngurah Rai International Airport</option>
  <option value="Denpasar">Denpasar</option>
  <option value="Kuta">Kuta</option>
  <option value="Seminyak">Seminyak</option>
  <option value="Legian">Legian</option>
  <option value="Sanur">Sanur</option>
  <option value="Jimbaran">Jimbaran</option>
  <option value="Nusa Dua">Nusa Dua</option>
  <option value="Nusa Dua">Kantor Pusat AutoRent-Denpasar</option>
</select>
</div>

      {{-- Dropoff Location --}}
<div>
<label class="block text-sm font-semibold mb-1 text-black">Pickup Location</label>
<select name="pickup_location" class="w-full border border-orange-300 rounded-md px-3 py-2 text-sm focus:outline-orange-500">
  <option disabled selected>Select Location</option>
  <option value="Ngurah Rai International Airport">Ngurah Rai International Airport</option>
  <option value="Denpasar">Denpasar</option>
  <option value="Kuta">Kuta</option> 
  <option value="Seminyak">Seminyak</option>
  <option value="Legian">Legian</option>
  <option value="Sanur">Sanur</option>
  <option value="Jimbaran">Jimbaran</option>
  <option value="Nusa Dua">Nusa Dua</option>
  <option value="Nusa Dua">Kantor Pusat AutoRent-Denpasar</option>
</select>
</div>

      {{-- Pickup Date --}}
      <div>
        <label class="block text-sm font-semibold mb-1 text-black">Pickup Date</label>
        <div class="flex space-x-2">
          <input type="date" placeholder="dd-mm-yyyy" class="w-1/2 border border-orange-300 rounded-md px-3 py-2 text-sm focus:outline-orange-500">
          <input type="time" placeholder="hh:mm" class="w-1/2 border border-orange-300 rounded-md px-3 py-2 text-sm focus:outline-orange-500">
        </div>
      </div>

      {{-- Dropoff Date --}}
      <div>
        <label class="block text-sm font-semibold mb-1 text-black">Dropoff Date</label>
        <div class="flex space-x-2">
          <input type="date" placeholder="dd-mm-yyyy" class="w-1/2 border border-orange-300 rounded-md px-3 py-2 text-sm focus:outline-orange-500">
          <input type="time" placeholder="hh:mm" class="w-1/2 border border-orange-300 rounded-md px-3 py-2 text-sm focus:outline-orange-500">
        </div>
      </div>

      {{-- Optional Feature --}}
      <div>
        <label class="inline-flex items-center space-x-2 text-sm text-black">
          <input type="checkbox" class="accent-orange-500">
          <span>Baby Seat - $10</span>
        </label>
      </div>

      {{-- Action Buttons --}}
      <div class="flex justify-between space-x-4 pt-2">
        <button type="submit" class="w-1/2 bg-orange-500 text-white py-2 rounded-md text-sm font-semibold hover:bg-orange-600">Booking</button>
        <button type="button" class="w-1/2 border border-orange-500 text-orange-500 py-2 rounded-md text-sm font-semibold hover:bg-orange-100">Enquiry Us</button>
      </div>
    </form>
  </div>