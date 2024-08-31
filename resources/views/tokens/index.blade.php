<x-layout>
    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded">
            <header>
                <h1
                        class="text-3xl text-center font-bold my-6 uppercase"
                >
                    Manage Tokens
                </h1>
            </header>

            <form class="py-4" method="POST" action="{{ route('tokens.store') }}">
                @csrf
                <button class="inline-block border-2 border-black text-black py-2 px-4 rounded-xl uppercase mt-2">
                    <i
                            class="fa-solid fa-plus"
                    ></i>
                    Create Token
                </button>
            </form>

            <table class="w-full table-auto rounded-sm">
                <thead>
                    <tr class="border-gray-300">
                        <th
                                class="px-4 py-4 border-t border-b border-gray-300 text-lg"
                        >
                            Name
                        </th>
                        <th
                                class="px-4 py-4 border-t border-b border-gray-300 text-lg"
                        >
                            Token
                        </th>
                        <th
                                class="px-4 py-4 border-t border-b border-gray-300 text-lg"
                        >
                            Created At
                        </th>
                        <th
                                class="px-4 py-4 border-t border-b border-gray-300 text-lg"
                        >
                            Last Used At
                        </th>
                        <th
                                class="px-4 py-4 border-t border-b border-gray-300 text-lg"
                        >
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($tokens as $token)
                    <tr class="border-gray-300">
                        <td
                                class="px-4 py-4 border-t border-b border-gray-300 text-lg"
                        >
                            {{ $token->name }}
                        </td>
                        <td
                                class="px-4 py-4 border-t border-b border-gray-300 text-lg"
                        >
                            {{ $token->token }}
                        </td>
                        <td
                                class="px-4 py-4 border-t border-b border-gray-300 text-lg"
                        >
                            @datetime($token->created_at)
                        </td>
                        <td
                                class="px-4 py-4 border-t border-b border-gray-300 text-lg"
                        >
                            @datetime($token->last_used_at)
                        </td>
                        <td
                                class="px-4 py-4 border-t border-b border-gray-300 text-lg"
                        >
                            <form method="POST" action="{{ route('tokens.destroy', ['token' => $token]) }}">
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
    </div>
</x-layout>