document.addEventListener('DOMContentLoaded', function() {
    const cart = [];
    const taxRate = 0.10;
    const importDuty = 0.05;

    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            const productContainer = this.closest('.product-container');
            const productId = productContainer.dataset.productId;
            const productNameElement = productContainer.querySelector('h3');
            let productName = ''; // Definir productName fuera del bloque if
            if (productNameElement) {
                productName = productNameElement.innerText; // Asignar valor a productName dentro del bloque if
            } else {
                console.error("Elemento <h3> no encontrado en el contenedor de productos.");
            }
            const productPrice = parseFloat(productContainer.querySelector('p').innerText.replace('$', ''));
            const isImported = productContainer.querySelector('input[name="imported"]').checked;

            cart.push({
                id: productId,
                name: productName,
                price: productPrice,
                imported: isImported,
                tax: 0
            });
            
            updateCart();
        });
    });

    document.getElementById('generate-receipt').addEventListener('click', function() {
        generateReceipt();
    });

    function updateCart() {
        const cartSummary = document.querySelector('table tbody');
        cartSummary.innerHTML = '';

        cart.forEach((item, index) => {
            const tax = calculateTax(item);
            item.tax = tax;

            const row = document.createElement('tr');
            row.innerHTML = `
                <td class="py-3 px-6 text-left">${item.name}</td>
                <td class="py-3 px-6 text-left">${item.imported ? 'Yes' : 'No'}</td>
                <td class="py-3 px-6 text-left">$${item.price.toFixed(2)}</td>
                <td class="py-3 px-6 text-left">$${tax.toFixed(2)}</td>
                <td class="py-3 px-6 text-right">
                    <button class="remove-from-cart text-red-500 font-extrabold" data-index="${index}">&times;</button>
                </td>
            `;

            cartSummary.appendChild(row);
        });

        document.querySelectorAll('.remove-from-cart').forEach(button => {
            button.addEventListener('click', function() {
                const index = this.dataset.index;
                cart.splice(index, 1);
                updateCart();
            });
        });
    }

    function calculateTax(item) {
        let tax = 0;

        if (!['Books', 'Food', 'Medical'].includes(item.category)) {
            tax += item.price * taxRate;
        }

        if (item.imported) {
            tax += item.price * importDuty;
        }

        return Math.ceil(tax * 20) / 20; // round up to the nearest 0.05
    }

    function generateReceipt() {
        let subtotal = 0;
        let totalTax = 0;

        cart.forEach(item => {
            subtotal += item.price;
            totalTax += item.tax;
        });

        const total = subtotal + totalTax;

        document.getElementById('receipt-total').innerText = `Total amount: $${total.toFixed(2)}`;
        document.getElementById('receipt-taxes').innerText = `Including taxes: $${totalTax.toFixed(2)}`;
        document.getElementById('receipt').classList.remove('hidden');
    }
});