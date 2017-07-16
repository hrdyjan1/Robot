<?php
include("inc/conection.php");
include("inc/functions.php");

if (isset($_GET["id"]) &&
    isset($_GET["cat"])
   ){
     $id = filter_input(INPUT_GET,"id",FILTER_SANITIZE_NUMBER_INT);
     $cat = $_GET["cat"];

    switch ($cat) {
      case 'games':
        $item = get_full_info_about_one_item($id, $cat, $db);
        $cat = 'Game';
        break;
      case 'os':
        $item = get_full_info_about_one_item($id, $cat, $db);
        $cat = 'Operating System';
        break;
    }

}

if (empty($item)) {
    header("location:catalog.php");
    exit;
}

$pageTitle = $item["title"];
$section = null;

include("inc/header.php"); ?>

  <div class="product">
    <!-- Left Column / Headphones Image -->
    <div class="left-column">
      <?php echo "<img data-image='red' class='active soft' src='" . $item["img"]. "' alt='" . $item["title"]. "'>" ?>
    </div>

    <!-- Right Column -->
    <div class="right-column">

      <!-- Product Description -->
      <div class="product-description">
        <?php echo "<span>" . $cat . "</span>" ?>
        <?php echo "<h1>" . $item["title"] . "</h1>" ?>
        <?php echo "<p>" . $item["description"] . "</p>" ?>
      </div>

      <!-- Product Configuration -->
      <div class="product-configuration">

          <!-- Cable Configuration -->
          <div class="cable-config">
            <span>Pay form</span>

            <div class="cable-choose">
              <button>Bitcoin</button>
              <button>Cash</button>
            </div>

            <a href="#">How to pay your product?</a>
          </div>
        </div>

      <!-- Product Pricing -->
      <div class="product-price">
        <?php echo "<span>" . $item["price_dol"] . "$</span>" ?>
        <a href="#" class="cart-btn">Add to cart</a>
      </div>
    </div>

  </div>

</div>
</div>

</body>
</html>
