<?php
session_start();
require_once '../model/appointmentBookingModel.php';
if (!isset($_SESSION['email']))
{
    header('location: ../view/login.html');
    exit;
}
?>
<html>
<head>
    <title>Payment Form</title>
    <script src="../asset/js/paymentValidation.js"></script>
</head>
<body>
    <div class="container">
        <form action="../controller/paymentController.php" method="POST" onsubmit="return validateForm();">
            <h1>Select Your Payment Method</h1>
            <div id="payment_method">
                <label>
                    <input type="radio" name="payment_method" value="paypal" required />
                    Mobile Banking
                </label>
                <label>
                    <input type="radio" name="payment_method" value="card" required />
                    Debit/Credit Card
                </label>
            </div>
            <div>
            <label id="name">Name: <?php echo ($_SESSION['name']); ?></label><br>
            </div>
            <div>
            <label id="email">Email: <?php echo ($_SESSION['email']); ?></label><br>
            </div>
            <div>
                <label for="cardholder_name">Name on Card</label>
                <input type="text" id="cardholder_name" name="cardholder_name" required />
            </div>
            <div>
                <label for="card_number">Card Number</label>
                <input type="text" id="card_number" name="card_number" maxlength="16" required />
            </div>
            <div>
                <label>Expiry</label>
                <select name="expiry_month" id="expiry_month" required>
                    <option value="">MM</option>
                    <option value="1">01</option>
                    <option value="2">02</option>
                    <option value="3">03</option>
                    <option value="4">04</option>
                    <option value="5">05</option>
                    <option value="6">06</option>
                    <option value="7">07</option>
                    <option value="8">08</option>
                    <option value="9">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
                <span>/</span>
                <select name="expiry_year" id="expiry_year" required>
                    <option value="">YYYY</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                </select>
            </div>
            <div>
                <label for="cvv">CVC/CVV</label>
                <input type="text" id="cvv" name="cvv" maxlength="3" required />
            </div>
            <button type="button" onclick="confirmBook()">Confirm and Pay</button>
            <button type="button" onclick="returnToBook()">Go Back</button>
        </form>
    </div>
    <script src="../asset/JS/paymentValidation.js"></script>
</body>
</html>
