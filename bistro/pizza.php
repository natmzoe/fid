<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Thank You for Your Order</title>
  <style>
    ol, ul { list-style-type: none; }
    body {  
      background-color: #faf2e4;
      margin: 0 10%;
      font-family: sans-serif;
    }
    h1 {
      text-align: center;
      font-family: serif;
      font-weight: normal;
      text-transform: uppercase;
      border-bottom: 1px solid #57b1dc;
      margin-top: 30px;
    }
    h2 {
      color: #d1633c;
      font-size: 1em;
    }
    p.disclaimer { 
      border-top: 1px solid #d1633c; 
      padding-top: 1em;
    }
  </style>
</head>

<body>

<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  echo '<p><em>No form data received. Please submit the pizza form first.</em></p>';
  exit;
}

// Safely handle toppings input
if (isset($_POST['toppings']) && is_array($_POST['toppings'])) {
  $toppings = implode(', ', $_POST['toppings']);
  $toppings_problem = false;
} else {
  $toppings = '<em>empty</em>';
  $toppings_problem = true;
}
?>

<h1>THANK YOU</h1>

<p>Thank you for ordering from Black Goose Bistro. We have received the following information about your order:</p>

<h2>Your Information</h2>
<ul>
  <li><strong>Name:</strong> <?php print isset($_POST['customername']) && $_POST['customername'] ? htmlspecialchars($_POST['customername']) : '<em>empty</em>'; ?></li>
  <li><strong>Address:</strong> <?php print isset($_POST['address']) && $_POST['address'] ? htmlspecialchars($_POST['address']) : '<em>empty</em>'; ?></li>
  <li><strong>Telephone number:</strong> <?php print isset($_POST['telephone']) && $_POST['telephone'] ? htmlspecialchars($_POST['telephone']) : '<em>empty</em>'; ?></li>
  <li><strong>Email Address:</strong> <?php print isset($_POST['email']) && $_POST['email'] ? htmlspecialchars($_POST['email']) : '<em>empty</em>'; ?></li>
</ul>

<p><strong>Delivery instructions:</strong> <?php print isset($_POST['instructions']) && $_POST['instructions'] ? htmlspecialchars($_POST['instructions']) : '<em>empty</em>'; ?></p>

<h2>Your Pizza</h2>

<?php if (!isset($_POST['crust']) && $toppings_problem && !isset($_POST['pizzas'])) { ?>
  <em>Sorry, we did not receive your information. <a href="pizza.html">Try again.</a></em>
<?php } else { ?>
  <ul>
    <li><strong>Crust:</strong> <?php print isset($_POST['crust']) && $_POST['crust'] ? htmlspecialchars($_POST['crust']) : '<em>empty</em>'; ?></li>
    <li><strong>Toppings:</strong> <?php print $toppings; if ($toppings_problem) { ?><span style="color:red">*</span><?php } ?></li>
    <li><strong>Number:</strong> <?php print isset($_POST['pizzas']) && $_POST['pizzas'] ? htmlspecialchars($_POST['pizzas']) : '<em>empty</em>'; ?></li>
  </ul>
<?php } ?>

<p class="disclaimer"><small>This site is for educational purposes only. No pizzas will show up at your door.</small></p>

</body>
</html>

