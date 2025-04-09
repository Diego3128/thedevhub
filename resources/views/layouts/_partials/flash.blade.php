@if (session('success'))
    <div class="alert success-alert fixed bottom-4 left-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded shadow-md w-max z-50"
        role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif

@if (session('error'))
    <div class="alert error-alert fixed bottom-4 left-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded shadow-md w-max z-50"
        role="alert">
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
@endif

@if (session('info'))
    <div class="alert error-alert fixed bottom-4 left-4 bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded shadow-md w-max z-50"
        role="alert">
        <span class="block sm:inline">{{ session('info') }}</span>
    </div>
@endif
