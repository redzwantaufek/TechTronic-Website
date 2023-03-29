const body = document.body;
let lastScroll = 0;

window.addEventListener("scroll", () => {
	const currentScroll = window.pageYOffset;
	if (currentScroll <= 0) {
		body.classList.remove("scroll-up");
		return;
	}

	if (currentScroll > lastScroll && !body.classList.contains("scroll-down")) {
		body.classList.remove("scroll-up");
		body.classList.add("scroll-down");
	} else if (
		currentScroll < lastScroll &&
		body.classList.contains("scroll-down")
	) {
		body.classList.remove("scroll-down");
		body.classList.add("scroll-up");
	}
	lastScroll = currentScroll;
});

// Define a cart object to store the items
var cart = [];

// Add a click event listener to all "Add to Cart" buttons
var buttons = document.querySelectorAll('.add-to-cart');
for (var i = 0; i < buttons.length; i++) {
  buttons[i].addEventListener('click', addToCart);
}

function addToCart(event) {
  // Get the product ID from the data attribute
  var productId = event.target.getAttribute('data-id');
  
  // Find the product in the cart (if it already exists)
  var item = cart.find(function(item) {
    return item.id === productId;
  });
  
  // If the product is not in the cart, add it
  if (!item) {
    item = {
      id: productId,
      quantity: 0
    };
    cart.push(item);
  }
  
  // Increment the quantity
  item.quantity++;
  
  // Update the cart UI
  updateCart();
}

function updateCart() {
  // Find the cart element in the HTML
  var cartElement = document.getElementById('cart');
  
  // Clear the cart HTML
  cartElement.innerHTML = '';
  
  // Calculate the total price and quantity
  var total = 0;
  var quantity = 0;
  for (var i = 0; i < cart.length; i++) {
    var item = cart[i];
    var product = getProductById(item.id);
    total += product.price * item.quantity;
    quantity += item.quantity;
    
    // Create a new row in the cart HTML
    var row = document.createElement('tr');
    row.innerHTML = '<td>' + product.name + '</td><td>' + item.quantity + '</td><td>$' + (product.price * item.quantity).toFixed(2) + '</td>';

	 // Add the row to the cart HTML
    cartElement.appendChild(row);
  }
  
  // Update the total price and quantity in the HTML
  document.getElementById('cart-quantity').textContent = quantity;
  document.getElementById('cart-total').textContent = '$' + total.toFixed(2);
}
