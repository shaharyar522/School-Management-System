
<x-app-layout>
    <div class="max-w-5xl mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between bg-white rounded-2xl shadow-lg p-6 mb-8 gap-4">
            <div>
                <h2 class="text-3xl font-bold text-indigo-700 mb-2">Welcome to School Dashboard</h2>
                <p class="text-lg text-indigo-500 font-medium">{{ __("You're logged in!") }}</p>
            </div>
            <img src="/images/school-logo.png" alt="School Logo" class="h-12 w-auto mx-auto md:mx-0">
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white rounded-xl shadow-md p-6 flex flex-col items-center hover:shadow-xl transition-shadow">
                <div class="text-2xl font-bold text-indigo-700 mb-2">Students</div>
                <div class="text-3xl text-indigo-400">👨‍🎓</div>
            </div>
            <div class="bg-white rounded-xl shadow-md p-6 flex flex-col items-center hover:shadow-xl transition-shadow">
                <div class="text-2xl font-bold text-indigo-700 mb-2">Teachers</div>
                <div class="text-3xl text-indigo-400">👩‍🏫</div>
            </div>
            <div class="bg-white rounded-xl shadow-md p-6 flex flex-col items-center hover:shadow-xl transition-shadow">
                <div class="text-2xl font-bold text-indigo-700 mb-2">Classes</div>
                <div class="text-3xl text-indigo-400">🏫</div>
            </div>
            <div class="bg-white rounded-xl shadow-md p-6 flex flex-col items-center hover:shadow-xl transition-shadow">
                <div class="text-2xl font-bold text-indigo-700 mb-2">Attendance</div>
                <div class="text-3xl text-indigo-400">📝</div>
            </div>
        </div>
    </div>
</x-app-layout>
