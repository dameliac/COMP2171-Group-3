<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/inventory.css">
    <script type=text/javascript.js src="../js/inventory.js"> </script>
    <title>Product page</title>
</head>
<body>
    <nav class="navbar">
        <!-- <button class="clear-button"><a href="#">BACK</a></button> -->
        <div class="logo"><a href="#">Laundry Inventory</a></div>
        <div class="search-container">
        </div>
    </nav>
    <div class="content" id="inventory">
        <div class="left-section">
            <h3>Liquid Detergents</h3>
            <div class="item-row" id="Liquid">
                <div class="card">
                    <img src="../img/liquids/all.jpeg" alt="Example Image">
                    <div class="card-content">
                      <h3>Card Title</h3>
                      <div class="btn-section">
                        <button type="submit" class="remove">-</button>
                        <button type="submit" class="add">+</button>
                      </div>
                    </div>
                </div>
            </div>
            <h3>Powder Detergents</h3>
            <div class="item-row" id="Powder">
                <div class="card">
                    <img src="../img/powder/Blanca.jpeg" alt="Example Image">
                    <div class="card-content">
                      <h3>Card Title</h3>
                      <div class="btn-section">
                        <button type="submit" class="remove">-</button>
                        <button type="submit" class="add">+</button>
                      </div>
                    </div>
                  </div>
            </div>
            <h3>Fabric Softeners</h3>
            <div class="item-row" id="Softeners">
                <div class="card">
                    <img src="../img/softeners/Downy.jpeg" alt="Example Image">
                    <div class="card-content">
                      <h3>Card Title</h3>
                      <div class="btn-section">
                        <button type="submit" class="remove">-</button>
                        <button type="submit" class="add">+</button>
                      </div>
                    </div>
                  </div>
            </div>
            <h3>Others</h3>
            <div class="item-row" id="Others">
                <div class="card">
                    <img src="../img/others/Brush.jpeg" alt="Example Image">
                    <div class="card-content">
                      <h3>Card Title</h3>
                      <div class="btn-section">
                        <button type="submit" class="remove">-</button>
                        <button type="submit" class="add">+</button>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
        <div class="right-section">
            <div class="container">
                <div class="head">
                    <h4>Product</h4>
                    <h4>Stock</h4>
                    <h4>Quantity</h4>
                    <h4>Total</h4>
                </div>
                <div class="itemlist">

                </div>
                <div class="btn">
                    <button class="cancel">CANCEL</button>
                    <button class="submit">SUBMIT</button>
                </div>


            </div>
        </div>
    </div>
    <footer class="footer">
    <div style="text-align: center;">
      <div class="col-xl-6 m-auto text-center">
        <div class="copyright">
          <p>&copy; UniFresh Laundry Xpress 2024. All rights reserved.</p>
        </div>
      </div>
    </div>
  </footer>
    
</body>
</html>