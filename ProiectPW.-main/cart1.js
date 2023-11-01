var cart = [];
var total = 0;

// Functie pentru adaugarea unui produs în cos
function addToCart(productName, price, image) {

    var cart = JSON.parse(localStorage.getItem('cart')) || [];
    var total = parseFloat(localStorage.getItem('total')) || 0;
    cart.push({ name: productName, price: price , image: image });
    total += price;

    localStorage.setItem('cart', JSON.stringify(cart));
    localStorage.setItem('total', total);

    // Actualizez afisarea cosului
        }
    updateCartUI();


