<?php include("header.php"); ?>
<?php include("connection.php") ?>
<?php
if (isset($_GET["id"])) {
  $property_id = $_GET["id"];
}
$userid = "";
if (isset($_SESSION["userid"])) {
  $userid = $_SESSION["userid"];
}
$query = "SELECT * FROM active_listings_tbl WHERE listing_id='$property_id'";
$result = mysqli_query($conn, $query);
if ($result->num_rows > 0) {
  $row = mysqli_fetch_assoc($result);
} else {
  header("location: index.php");
}
?>
<!-- product details area start -->
<div class="single-product-area section-padding-100 clearfix">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-lg-7">
        <div class="single_product_thumb">
          <div id="product_details_slider" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url(<?php echo $row["image_one"] ?>);"> </li>
              <li data-target="#product_details_slider" data-slide-to="1" style="background-image: url(<?php echo $row["image_two"] ?>);"> </li>
              <li data-target="#product_details_slider" data-slide-to="2" style="background-image: url(<?php echo $row["image_three"] ?>);"> </li>
              <li data-target="#product_details_slider" data-slide-to="3" style="background-image: url(<?php echo $row["image_four"] ?>);"> </li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <a class="gallery_img" href="<?php echo $row["image_one"] ?>">
                  <img class="d-block w-100" src="<?php echo $row["image_one"] ?>" alt="First slide">
                </a>
              </div>
              <div class="carousel-item">
                <a class="gallery_img" href="<?php echo $row["image_two"] ?>">
                  <img class="d-block w-100" src="<?php echo $row["image_two"] ?>" alt="Second slide">
                </a>
              </div>
              <div class="carousel-item">
                <a class="gallery_img" href="<?php echo $row["image_three"] ?>">
                  <img class="d-block w-100" src="<?php echo $row["image_three"] ?>" alt="Third slide">
                </a>
              </div>
              <div class="carousel-item">
                <a class="gallery_img" href="<?php echo $row["image_four"] ?>">
                  <img class="d-block w-100" src="<?php echo $row["image_four"] ?>" alt="Fourth slide">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-5">
        <div class="single_product_desc">
          <!-- product meta data -->
          <div class="product-meta-data">
            <div class="line"></div>
            <p class="product-price"><?php echo $row["price"] . " " . $row["price_format"] ?></p>
            <h4><?php echo $row["title"] ?></h4>
            <!-- Avaiable -->
            <p class="avaibility"><i class="fa fa-circle"></i> <?php echo $row["status"] ?></p>
          </div>

          <div class="short_overview my-5">
            <p><?php echo $row["discription"] ?></p>
          </div>
          <hr>
          <!-- Add to Cart Form -->
          <div class="short_overview my-5">
            <p><b>Property Type : </b> <?php echo $row["property_type"] ?></p>
            <p><b>Property Size : </b> <?php echo $row["property_size"] ?></p>
            <p><b>Location : </b> <?php echo $row["property_address"] ?></p>
            <p><b>City : </b> <?php echo $row["city"] ?></p>
            <p><b>Area Zipcode : </b> <?php echo $row["pin"] ?></p>
          </div>
          <form class="cart clearfix" method="post">
            <?php if ($row["owner"] == $userid) { ?>
              <button type="submit" name="edit" value="edit" class="btn amado-btn">EDIT LISTING</button>
            <?php } else { ?>
              <button type="submit" name="addtocart" value="5" class="btn amado-btn">Contact Owner</button>
            <?php } ?>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<!-- Product Details Area End -->
</div>
<!-- ##### Main Content Wrapper End ##### -->

<?php include("footer.php"); ?>