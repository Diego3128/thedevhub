@if (session('success'))
    <div class="success-alert fixed bottom-4 left-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded shadow-md w-max z-50"
        role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif
