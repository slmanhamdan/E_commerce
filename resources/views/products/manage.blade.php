<x-layout>
    <x-flash-message />
    <h1 class="text-center text-gray-600 text-5xl font-bold mt-20">Manage your products</h1>
    <div class="flex justify-center min-h-screen bg-gray-100 mt-20"> 
        <div class="col-span-12">
            <div class="overflow-auto lg:overflow-visible ">
                <table class="table text-gray-400 border-separate space-y-6 text-sm">
                    <thead class="bg-white text-gray-900 shadow-xl rounded-lg">
                        <tr>
                            <th class="p-3">Brand</th>
                            <th class="p-3 text-left">Category</th>
                            <th class="p-3 text-left">Price</th>
                            <th class="p-3 text-left">Status</th>
                            <th class="p-3 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @unless($products->isEmpty())
                            @foreach($products as $products)
                                <tr class="bg-white text-gray-900 shadow-xl rounded-lg">
                                    <td class="p-3">
                                        <div class="flex align-items-center">
                                            <img class="rounded-full h-12 w-12  object-cover" src="{{$products->image ? asset('uploads/products/' . $products->image) : asset('/images/reg.jpg')}}" alt="unsplash image">
                                            <div class="ml-3">
                                                <div class="">{{$products->title}}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-3">
                                        Technology
                                    </td>
                                    <td class="p-6 font-bold">
                                        {{$products->price}}
                                    </td>
                                    @if($products->status ===1)
                                        <td class="p-3">
                                            <span class="bg-green-400 text-gray-50 rounded-md px-2">in stock</span>
                                        </td>
                                        @else
                                        <td class="p-3">
                                            <span class="bg-red-400 text-gray-50 rounded-md px-2">no stock</span>
                                        </td>
                                    @endif
                                    <td class="p-3 ">
                                        <form method="POST" action="/products/{{$products->id}}">
                                            <a href="/products/show/{{$products->id}}" class="text-gray-400 hover:text-green-400 mr-2">
                                                <i class="material-icons-outlined text-base">visibility</i>
                                            </a>
                                            <a href="/products/{{$products->id}}/edit" class="text-gray-400 hover:text-blue-600  mx-2">
                                                <i class="material-icons-outlined text-base">edit</i>
                                            </a>
                                            
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-gray-400 hover:text-red-600  ml-2" >
                                                    <i class="material-icons-round text-base">delete_outline</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                            <tr class="border-gray-300">
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <p class="text-center">No productsFound</p>
                                </td>
                            </tr>
                        @endunless 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>

<style>
	.table {
		border-spacing: 0 15px;
	}

	i {
		font-size: 1rem !important;
	}

	.table tr {
		border-radius: 20px;
	}

	tr td:nth-child(n+5),
	tr th:nth-child(n+5) {
		border-radius: 0 .625rem .625rem 0;
	}

	tr td:nth-child(1),
	tr th:nth-child(1) {
		border-radius: .625rem 0 0 .625rem;
	}
</style>