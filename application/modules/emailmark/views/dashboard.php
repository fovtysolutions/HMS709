<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Channel Manager Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">

    <!-- Summary Cards -->
    <div class="bg-white shadow-md rounded-lg p-4 flex justify-between">
        <div>
            <p class="text-gray-500">Total Bookings</p>
            <h2 class="text-2xl font-bold">1,240</h2>
        </div>
        <i class="fas fa-hotel text-blue-500 text-2xl"></i>
    </div>

    <div class="bg-white shadow-md rounded-lg p-4 flex justify-between">
        <div>
            <p class="text-gray-500">Revenue</p>
            <h2 class="text-2xl font-bold">$52,000</h2>
        </div>
        <i class="fas fa-chart-line text-green-500 text-2xl"></i>
    </div>

    <div class="bg-white shadow-md rounded-lg p-4 flex justify-between">
        <div>
            <p class="text-gray-500">Rooms Available</p>
            <h2 class="text-2xl font-bold">85</h2>
        </div>
        <i class="fas fa-bed text-yellow-500 text-2xl"></i>
    </div>

    <div class="bg-white shadow-md rounded-lg p-4 flex justify-between">
        <div>
            <p class="text-gray-500">OTA Sync Status</p>
            <h2 class="text-2xl font-bold text-green-600">Active</h2>
        </div>
        <i class="fas fa-sync text-gray-500 text-2xl"></i>
    </div>

    <!-- Recent Bookings Table -->
    <div class="col-span-2 bg-white shadow-md rounded-lg p-6">
        <h3 class="text-lg font-semibold mb-4">Recent Bookings</h3>
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">Guest</th>
                    <th class="border p-2">OTA</th>
                    <th class="border p-2">Check-in</th>
                    <th class="border p-2">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border p-2">John Doe</td>
                    <td class="border p-2">Booking.com</td>
                    <td class="border p-2">Mar 10, 2025</td>
                    <td class="border p-2 text-green-600">Confirmed</td>
                </tr>
                <tr>
                    <td class="border p-2">Jane Smith</td>
                    <td class="border p-2">Agoda</td>
                    <td class="border p-2">Mar 12, 2025</td>
                    <td class="border p-2 text-yellow-600">Pending</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</body>    



</body>