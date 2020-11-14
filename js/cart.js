console.log('Cart Page JS Loaded');
// Only show this on the cart JS 

//Checking every second as customer might remove all items in the cart.
function timed() {
    console.log('One second elapsed');

    //Need to capture link for back to shop button
    const backBtn = document.querySelector('.wc-backward');
    //Change the btn url
    backBtn.href = "/product-category/exhibition-on-screen-2/";
}
setInterval(timed, 1000);