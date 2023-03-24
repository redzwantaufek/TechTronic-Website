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

function getProductById(productId) {
	// This function should return the product with the given ID
	// You can define your own products array or retrieve them from a server-side script
  }
  
  function calculateTotal() {
	// Find the total price of all items in the cart
	var total = 0;
	for (var i = 0; i < cart.length; i++) {
	  var item = cart[i];
	  var product = getProductById(item.id);
	  total += product.price * item.quantity;
	}
	return total;
  }
