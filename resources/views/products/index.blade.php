<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Tax Problem</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <header class="bg-white shadow sticky top-0 z-50">
        <div class="max-w-6xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <img src="{{ asset('images/logo-instilla.png') }}" alt="Logo" class="h-10">
            <h1 class="text-xl font-semibold text-green-instilla uppercase">Sales Tax Problem</h1>
        </div>
    </header>

    <main class="container max-w-6xl mx-auto py-6 px-4">
        <h2 class="text-4xl font-semibold mb-4">Products Catalogue</h2>
         <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            @foreach ($products as $product)
            <div class="product-container" data-product-id="{{ $product->id }}">
                <div class="bg-white p-4 rounded-lg shadow justify-center items-center">
                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="h-48 rounded" style="margin: 0 auto;">
                    <span class="bg-black-tag-product text-white text-xs font-semibold rounded px-2 py-1 inline-flex mt-2 uppercase"><x-fas-tag class="h-3 w-4 px-1 pt-1"/> {{ $product->category }}</span>
                </div>    
                    <h3 class="text-lg font-semibold mt-2">{{ $product->name }}</h3>
                    <p class="text-gray-700 font-semibold">${{ number_format($product->price, 2) }}</p>
                    <div class="flex items-center mt-2">
                        <input type="checkbox" name="imported" id="imported-{{ $product->id }}" class="mr-2 accent-green-instilla">
                        <label for="imported-{{ $product->id }}">Apply import duty</label>
                    </div>
                    <button data-id="{{ $product->id }}" class="add-to-cart bg-green-instilla hover:bg-green-950 mt-4 w-full text-white py-2 px-4 rounded uppercase transition-all font-semibold">Add to cart</button>
            </div>
        @endforeach
        </div>

        <h2 class="text-4xl font-semibold mt-8 mb-4">Selected products</h2>
        <table class="min-w-full bg-white rounded-lg shadow">
            <thead class="bg-white-200 text-black-600 uppercase text-sm leading-normal">
                <tr>
                    <th class="py-3 px-6 text-left">Product</th>
                    <th class="py-3 px-6 text-left">Imported</th>
                    <th class="py-3 px-6 text-left">Price</th>
                    <th class="py-3 px-6 text-left">Tax</th>
                    <th class="py-3 px-6 text-right"></th>
                </tr>
                <hr class="border-solid-gray-100 mx-2">
            </thead>
            <tbody class="text-black-600 text-sm font-bold">
                <!-- Cart items will be dynamically added here -->
            </tbody> 
        </table>
        
        
    
        <div class="flex flex-col items-end">
            <button id="generate-receipt" class="my-10 bg-green-instilla text-white py-2 px-8 uppercase rounded font-bold">
                Generate receipt
            </button>

            <div id="receipt" class="mt-4 bg-white p-4 rounded-lg shadow hidden" style="width: 50%;">
                <div class="flex">
                    <div class="w-1/2 flex items-center">
                        <h2 class="text-3xl font-semibold mb-4">Receipt</h2>
                    </div>
                    <div class="w-1/2">
                        <p class="font-bold text-2xl" id="receipt-total"></p>
                        <p class="font-light text-xl" id="receipt-taxes"></p>
                    </div>
                </div>
            </div>
        </div>
        
    
    </main>

    @vite('resources/js/app.js')
</body>

</html>
