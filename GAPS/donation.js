let bank = document.getElementById('bc1');
let upi = document.getElementById('bc2');
let payNow = document.getElementById('payNow');
let paymentMode;

bank.addEventListener('click', function() {
    paymentMode = document.getElementById('bc1').value;
});

upi.addEventListener('click', function() {
    paymentMode = document.getElementById('bc2').value;
});

payNow.addEventListener("click", function(event) {
    event.preventDefault(); // Prevent form submission for now
    if (paymentMode === "Bank Transfer") {
        window.location.href = "bank.html";
    } else if (paymentMode === "UPI") {
        window.location.href = "upi.html";
    }
});


