<?php 

if($_SERVER["REQUEST_METHOD"] == "GET"){
  if(isset($_GET['plan'])):
  switch  ($_GET['plan']) {
    case 'premium':
      $price = 7000;
      break;
    case 'athlete':
      $price = 4500;
      break;
    case 'debutant':
      $price = 3000;
      break;
    default:
      $price = 0;
      break;
  }
  endif;
}else{
  echo "<script>alert('Veuilez choisir un pack valide');</script>";
  header("Location: ./index.php#Abonnements");
}
?>
<form class="credit-card" action="./index.php">
  <div class="form-header text-center">
    <h4 class="title">Credit card detail <i class="bi bi-credit-card"></i> </h4>
  </div>
  <div class="form-body">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-6">
        <!-- Card Number -->
        <input type="text" class="card-number" placeholder="Card Number">

          <!-- Date Field -->
        <div class="date-field">
            <div class="month">
              <select name="Month">
                  <option value="january">January</option>
                  <option value="february">February</option>
                  <option value="march">March</option>
                  <option value="april">April</option>
                  <option value="may">May</option>
                  <option value="june">June</option>
                  <option value="july">July</option>
                  <option value="august">August</option>
                  <option value="september">September</option>
                  <option value="october">October</option>
                  <option value="november">November</option>
                  <option value="december">December</option>
              </select>
            </div>
            <div class="year">
              <select name="Year">
                <?php for ($i = 2024; $i <= 2035; $i++): ?>
                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
              </select>
            </div>
        </div>

        <!-- Card Verification Field -->
        <div class="card-verification">
          <div class="cvv-input">
            <input type="text" placeholder="CVV">
          </div>
          <div class="cvv-details">
            <p>3 or 4 digits usually found <br> on the signature strip</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6">
          <br>
          <!-- Payment Method Selection -->
          <div class="payment-method">
            <div class="container">
              <div class="row">
                <div class="col-6 col-sm-4">
                  <label for="paypal" class="payment-option">
                    <input type="radio" id="paypal" name="payment-method" value="paypal">
                    <img src="https://filecache.mediaroom.com/mr5mr_paypal/177465/pp_h_rgb_logo_tn.jpg" alt="PayPal">
                  </label>
                </div>
                <div class="col-6 col-sm-4">
                  <label for="google-wallet" class="payment-option">
                    <input type="radio" id="google-wallet" name="payment-method" value="google-wallet">
                    <img src="https://1000logos.net/wp-content/uploads/2022/05/Google-Wallet-Logo.png" alt="Google Wallet">
                  </label>
                </div>
                <div class="col-6 mt-2 mt-sm-0 col-sm-4">
                  <label for="apple-pay" class="payment-option">
                    <input type="radio" id="apple-pay" name="payment-method" value="apple-pay">
                    <img src="https://download.logo.wine/logo/Apple_Pay/Apple_Pay-Logo.wine.png" alt="Apple Pay">
                  </label>
                </div>
              </div>
            </div>
          </div>

          <!-- Proceed Button -->
          <button type="submit" class="proceed-btn btn bg-warning text-secondary">Proceed <?php echo  $price." Dhs"; ?></button>
      </div>
    </div>
  </div>
  </div>
    
    
</form>


