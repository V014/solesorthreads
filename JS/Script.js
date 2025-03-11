function toggleMenu(){
    const navMenu= document.getElementById("nav-menu");
    navMenu.classList.toggle("active");
}
// Sample product data
const products = [
    {
        name: "Nike Air Force 1",
        price: "$120",
        image: "imgs/product9.jpg"
    },
    {
        name: "Adidas campus green",
        price: "$250",
        image: "imgs/product3.jpg"
    },
    {
        name: "jordan 4 purple dynasty",
        price: "$100",
        image: "imgs/product2.jpg"
    }
];

function displayProducts() {
    const productList = document.getElementById("product-list");
    
    if (!productList) {
        console.error("Error: #product-list not found in the HTML.");
        return; // Stop the function if the div is missing
    }
    productList.innerHTML="";

    // Loop through each product and create HTML elements
    products.forEach(product => {
        const productCard = document.createElement("div");
        productCard.classList.add("product-card");

        productCard.innerHTML = `
            <img src="${product.image}" alt="${product.name}">
            <h3>${product.name}</h3>
            <p>${product.price}</p>
          <button onclick="addToCart('${product.name}', '${product.price}', '${product.image}')">
    Add to Cart
</button> 
        `;

        productList.appendChild(productCard);
    });
}

// Call the function when the page loads
document.addEventListener("DOMContentLoaded", displayProducts);
let cart = JSON.parse(localStorage.getItem("cart")) || [];

function addToCart(name, price, image) {
    let item = { name, price, image };
    cart.push(item);
    
    localStorage.setItem("cart", JSON.stringify(cart));
    alert(`${name} added to cart!`);
    displayCart();
}

// Function to display the cart
function displayCart() {
    console.log("displaycart() function is running...");
    const cartList = document.getElementById("cart-list");
    const totalPriceElement = document.getElementById("total-price");

    if(!cartList ||! totalPriceElement) {
        console.error("Error: cart elements not found in the HTML");
        return;
    }

    cartList.innerHTML = ""; // Clear existing items
    let total = 0;
if(cart.length===0){
    cartList.innerHTML= "<p> your cart is empty.</p>";
    totalPriceElement.textContent="Total: $0.00";
    return;
}
    cart.forEach((item, index) => {
        total += parseFloat(item.price.replace("$", "")); // Convert price to number

        const cartItem = document.createElement("div");
        cartItem.classList.add("cart-item");
        cartItem.innerHTML = `
            <img src="${item.image}" alt="${item.name}">
            <h3>${item.name}</h3>
            <p>${item.price}</p>
            <button onclick="removeFromCart(${index})">Remove</button>
        `;
        cartList.appendChild(cartItem);
    });

    totalPriceElement.textContent = `Total: $${total.toFixed(2)} `;
    console.log(`Total price: $$
        {total.toFixed(2)} `);
}

// Function to remove an item from the cart
function removeFromCart(index) {
    cart.splice(index, 1);
    localStorage.setItem("cart", JSON.stringify(cart));
    displayCart();
}

// Load cart on page load
document.addEventListener("DOMContentLoaded", displayCart);

document.addEventListener("DOMContentLoaded", () => {
    // Handle registration
    document.getElementById("register-form")?.addEventListener("submit", async function (e) {
        e.preventDefault();
        
        const name = document.getElementById("name").value;
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;

        const response = await fetch("register.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ name, email, password })
        });

        const data = await response.json();
        alert(data.message);
        if (data.success) window.location.href = "login.html";
    });

    // Handle login
    document.getElementById("login-form")?.addEventListener("submit", async function (e) {
        e.preventDefault();

        const email = document.getElementById("login-email").value;
        const password = document.getElementById("login-password").value;

        const response = await fetch("login.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ email, password })
        });

        const data = await response.json();
        alert(data.message);
        if (data.success) window.location.href = "dashboard.html"; // Redirect to user dashboard
    });
});