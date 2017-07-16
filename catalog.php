<?php
include("inc/conection.php");
include("inc/functions.php");


// Initialization
$games = null;
$os = null;
$items_per_page = 6;
$count_of_items = 0;

$pageTitle = "FullCatalog";
$section = null;


// Checking getters - category, pagination
if (isset($_GET["cat"])) {
    if ($_GET["cat"] == "games") {
        $pageTitle = "Games";
        $section = "games";
        $games = get_basic_info_about_items('games', $db);
    } else if ($_GET["cat"] == "os") {
        $pageTitle = "Operation system";
        $section = "os";
        $os = get_basic_info_about_items('os', $db);
    }
}

// Count of items, if no category
$count_of_items = get_catalog_count($section, $db);
// print_r($count_of_items);

// Checking pagination
if (isset($_GET["pg"])) {
  $current_page = filter_input(INPUT_GET, "pg", FILTER_SANITIZE_NUMBER_INT);
}
if(empty($current_page)){
  $current_page = 1;
}



include("inc/header.php"); ?>




<div class="recomendation">
  <h1 id="title"><?php
  if ($section != null) {
      echo "<a href='catalog.php'>Full Catalog</a> &gt; ";
  }
  echo $pageTitle; ?></h1>
</div>

<div class="content clearfix">

  <?php
  switch ($section) {

    case 'games':
      $catalog = $games;
      $categories = array_category($catalog);
      foreach ($categories as $item) {
        echo get_item_html('games',$catalog[$item]);
      }
      break;

    case 'os':
      $catalog = $os;
      $categories = array_category($catalog);
      foreach ($categories as $item) {
        echo get_item_html('os',$catalog[$item]);
      }
      break;

    default:
      $games = get_basic_info_about_items('games', $db);
      $os = get_basic_info_about_items('os', $db);

      foreach($games as $key => $value){
       $games[$key]['cat'] = 'games';
      }
      foreach($os as $key => $value){
       $os[$key]['cat'] = 'os';
      }
      $catalog = array_merge($games, $os);
      $categories = array_category($catalog);

      foreach ($categories as $item) {
          echo get_item_html($catalog[$item]['cat'],$catalog[$item]);
      }
      break;
  }
?>

  </div>
</div>
</div>

</body>
</html>
