@if (Session::has('status'))
    <div class="bg-green-500 text-gray-50 mb-5">
        <p class="py-2 px-3">{{ Session::get('status') }}</p>
    </div>
@endif
