<section class="my-5">
    <form action=" #" method="GET" class="flex justify-start md:w-1/2 lg:w-1/3 space-x-3">
        <input
               class="border inline-flex border-blue-500 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-md rounded-lg text-base focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
               name="search"
               type="text"
               placeholder="Search for artists or albums"
               value="{{ request('search') }}">

        <button
                class="inline-flex bg-gray-700 text-white text-base font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-blue-200"
                type="submit">
            Search
        </button>
    </form>
</section>
