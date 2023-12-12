<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }

    h1 {
      text-align: center;
    }

    .order-form {
      max-width: 400px;
      margin: 0 auto;
    }

    label {
      display: block;
      margin-bottom: 8px;
    }

    input, select {
      width: 100%;
      padding: 8px;
      margin-bottom: 16px;
      box-sizing: border-box;
    }

    button {
      background-color: #4CAF50;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }

    button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>

  <h1>Order Form</h1>

  <div class="order-form">
    <form>
      

      <label for="quantity">Quantity:</label>
      <input type="number" id="quantity" name="quantity" min="1" required>

      <label for="name">Your Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Your Email:</label>
      <input type="email" id="email" name="email" required>
      <label for="email">phone number:</label>
      <input type="number" id="num" name="phone number" required>
      <label for="email">address:</label>
      <textarea id="add" rows="4"></textarea>


      <button type="submit">Place Order</button>
    </form>
  </div>

</body>
</html>