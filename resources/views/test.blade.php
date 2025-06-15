<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User Profile</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body class="bg-gray-100 p-4">

  <!-- Container -->
  <div class="max-w-6xl mx-auto grid gap-6 lg:grid-cols-3">

    <!-- Profile Card -->
    <div class="bg-white rounded-xl shadow p-6 text-center">
      <div class="bg-black rounded-t-xl h-24 flex justify-center items-end">
        <div class="bg-white text-xl font-bold text-blue-600 border-4 border-white rounded-full w-20 h-20 flex items-center justify-center -mb-10">
          JD
        </div>
      </div>
      <div class="mt-12">
        <h2 class="text-xl font-semibold">John Doe</h2>
        <p class="text-gray-500">@johndoe</p>
        <div class="mt-2 inline-flex items-center px-2 py-1 bg-green-100 text-green-700 rounded text-sm">
          <i class='bx bx-check-shield mr-1'></i> Verified User
        </div>
        <div class="mt-4 flex justify-around text-gray-700">
          <div><p class="font-bold text-lg">15</p><p class="text-sm">Rentals</p></div>
          <div><p class="font-bold text-lg">4.8</p><p class="text-sm">Rating</p></div>
        </div>
      </div>
    </div>

    <!-- Personal Info -->
    <div class="lg:col-span-2 space-y-6">
      <div class="bg-white rounded-xl shadow p-6">
        <h3 class="font-semibold text-lg mb-4 flex items-center gap-2">
          <i class='bx bx-user text-blue-600'></i> Personal Information
        </h3>
        <div class="grid md:grid-cols-2 gap-4">
          <div>
            <label class="text-sm text-gray-600">Full Name</label>
            <input type="text" value="John Doe" class="w-full border rounded p-2 bg-gray-50" readonly>
          </div>
          <div>
            <label class="text-sm text-gray-600">Email</label>
            <input type="email" value="john.doe@example.com" class="w-full border rounded p-2 bg-gray-50" readonly>
          </div>
          <div>
            <label class="text-sm text-gray-600">Phone</label>
            <input type="text" value="+62 812-3456-7890" class="w-full border rounded p-2 bg-gray-50" readonly>
          </div>
          <div>
            <label class="text-sm text-gray-600">Username</label>
            <input type="text" value="johndoe" class="w-full border rounded p-2 bg-gray-50" readonly>
          </div>
        </div>
      </div>

      <!-- Identity -->
      <div class="bg-white rounded-xl shadow p-6">
        <h3 class="font-semibold text-lg mb-4 flex items-center gap-2">
          <i class='bx bx-id-card text-blue-600'></i> Identity Documents
        </h3>
        <div class="grid md:grid-cols-2 gap-4">
          <div>
            <label class="text-sm text-gray-600">KTP Number</label>
            <input type="text" value="3201234567890001" class="w-full border rounded p-2 bg-gray-50" readonly>
            <img src="images/ktp.png" alt="KTP" class="w-full h-40 mt-2 object-cover rounded bg-black">
          </div>
          <div>
            <label class="text-sm text-gray-600">SIM Number</label>
            <input type="text" value="1234567890123456" class="w-full border rounded p-2 bg-gray-50" readonly>
            <img src="images/sim.png" alt="SIM" class="w-full h-40 mt-2 object-cover rounded bg-black">
          </div>
        </div>
      </div>

      <!-- Account Settings -->
      <div class="bg-white rounded-xl shadow p-6">
        <h3 class="font-semibold text-lg mb-4 flex items-center gap-2">
          <i class='bx bx-cog text-blue-600'></i> Account Settings
        </h3>
        <div class="grid md:grid-cols-2 gap-4 mb-4">
          <div>
            <label class="text-sm text-gray-600">Account Role</label>
            <input type="text" value="User" class="w-full border rounded p-2 bg-gray-50" readonly>
          </div>
          <div>
            <label class="text-sm text-gray-600">Member Since</label>
            <input type="text" value="January 15, 2024" class="w-full border rounded p-2 bg-gray-50" readonly>
          </div>
        </div>
        <div class="flex flex-wrap gap-2">
          <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded flex items-center gap-1">
            <i class='bx bx-lock-alt'></i> Change Password
          </button>
          <button class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded flex items-center gap-1">
            <i class='bx bx-log-out'></i> Logout
          </button>
          <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded flex items-center gap-1">
            <i class='bx bx-trash'></i> Delete Account
          </button>
        </div>
      </div>
    </div>

  </div>
</body>
</html>