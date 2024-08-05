<x-layout>
    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded">
            <header>
                <h1
                        class="text-3xl text-center font-bold my-6 uppercase"
                >
                    Manage Gigs
                </h1>
            </header>

            <table class="w-full table-auto rounded-sm">
                <tbody>
                @foreach($listings as $listing)
                <tr class="border-gray-300">
                    <td
                            class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <a href="{{ route('listings.show', ['listing' => $listing]) }}">
                            {{ $listing->title }}
                        </a>
                    </td>
                    <td
                            class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <a
                                href="{{ route('listings.edit', ['listing' => $listing]) }}"
                                class="text-blue-400 px-6 py-2 rounded-xl"
                        ><i
                                    class="fa-solid fa-pen-to-square"
                            ></i>
                            Edit</a
                        >
                    </td>
                    <td
                            class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <form method="POST" action="{{ route('listings.destroy', ['listing' => $listing]) }}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600">
                                <i
                                        class="fa-solid fa-trash-can"
                                ></i>
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>

        <div class="mt-6 p4">
            {{ $listings->links() }}
        </div>
    </div>
</x-layout>