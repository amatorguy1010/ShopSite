window.onload = function() {
    //verificare daca exista produse in cos
    if (localStorage.getItem('cart')) {
        var cartItems = JSON.parse(localStorage.getItem('cart'));
        var totalValue = parseFloat(localStorage.getItem('total'));

        var cartItemsElement = document.getElementById('cart-items');
        var totalElement = document.getElementById('total');

        cartItems.forEach(function (product, index) {
            var productItem = document.createElement('div');
            productItem.innerHTML = `
                <img src="${product.image}" alt="${product.name}">
                <span>${product.name}</span>
                <span>$${product.price.toFixed(2)}</span>
                <button onclick=" document.location.reload();removeFromCart(${index});">Șterge</button>
            `;
            cartItemsElement.appendChild(productItem);
        });

        //afisare total din cos
        totalElement.innerText = `$${totalValue.toFixed(2)}`;   
}
}
function removeFromCart(index) {
    var cart = JSON.parse(localStorage.getItem('cart')) || [];
    if (index >= 0 && index < cart.length) {
        var removedProduct = cart.splice(index, 1)[0]; //elimin produsul si obtin referinta la el
        var total = parseFloat(localStorage.getItem('total')) || 0;
        total -= removedProduct.price;

        localStorage.setItem('cart', JSON.stringify(cart));
        localStorage.setItem('total', total);
        updateCartUI();// Actualizez afisarea cosului
    }
}


// Functie pentru stergerea cosului
function clearCart() {
            localStorage.setItem('total',0);
            localStorage.removeItem('cart');
            updateCartUI();
            
        }

//Functie pentru actualizarea local storage
function updateLocalStorage() {
    localStorage.setItem('cart', JSON.stringify(cart));
    localStorage.setItem('total', total);
}

function updateCartUI() {
    var cartList = document.getElementById('cart');
    var totalSpan = document.getElementById('total');
    
    var cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Goleste lista de produse din cos
    cartList.innerHTML = '';

    // Adaug fiecare produs în lista de produse din cos
    cart.forEach(function (product) {
        var listItem = document.createElement('li');
        listItem.innerHTML = `
            <img src="${product.image}" alt="${product.name}">
            <span>${product.name}</span>
            <span>$${product.price.toFixed(2)}</span>
        `;
        cartList.appendChild(listItem);
    });

    // Actualizez totalul
    var total = cart.reduce(function (acc, product) {
        return acc + product.price;
    }, 0);
    totalSpan.innerText = `$${total.toFixed(2)}`;
}



