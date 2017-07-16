<?php

function get_basic_info_about_items($category, $db){
  try {
    $sql = 'SELECT id,title, img, description FROM ' . $category;
    $result_games = $db->query($sql);
  } catch (Exception $e) {
    echo "Unable to retrieved results.";
    exit;
  }
  return $result_games->fetchAll(PDO::FETCH_ASSOC);
}

function get_full_info_about_one_item($id, $cat, $db){
  try {
    $result = $db->prepare("SELECT id,title, img, description, price_dol, price_bit FROM $cat WHERE id = ?");
    $result->bindParam(1, $id, PDO::PARAM_INT);
    $result->execute();
  } catch (Exception $e) {
    echo "Unable to retrieved results.";
    exit;
  }
  return $result->fetch(PDO::FETCH_ASSOC);
}

function get_basic_info_about_random_items($cat, $db){
  try {
    $sql = "SELECT id,title, img, description FROM $cat ORDER BY RAND() LIMIT 3";
    $results = $db->query($sql);
  } catch (Exception $e) {
    echo "Unable to retrieved results.";
    exit;
  }
  return $results->fetchAll(PDO::FETCH_ASSOC);
}

function get_catalog_count($category, $db){
  try {
    switch ($category) {
      case 'games':
        $sql = 'SELECT count(id) FROM games';
        $results = $db->query($sql);
        break;

      case 'os':
        $sql = 'SELECT count(id) FROM os';
        $results = $db->query($sql);
        break;

      default:
        $count = 0;

        $sql = 'SELECT
          ( SELECT COUNT(*) FROM games) AS count1,
          ( SELECT COUNT(*) FROM os ) AS count2 FROM dual';
        $results = $db->query($sql);
        $ans = $results->fetchAll(PDO::FETCH_ASSOC);

        foreach ($ans as $key => $val) {
          foreach ($val as $key => $value) {
            $count += $value;
          }
        };
        return $count;
        break;
    }
  } catch (Exception $e) {
    echo "Unable to retrieved results.";
    exit;
  }
  return $results->fetchColumn(0);
}

function get_item_html($cat,$item) {
  $output = "<div class='photo-container'><div class='try'><img src='"
  . $item["img"] . "' alt='"
  . $item["description"] . "'/></div><h3>"
  . $item["title"] . "</h3><p>"
  . $item["description"] . "</p><a href='details.php?id="
  . $item['id'] . "&cat="
  . $cat . "' class='button-order'>download</a></div>";
  return $output;
}

function array_category($catalog) {
    $output = array();
    foreach ($catalog as $id => $item) {
            $sort = $item["title"];
            // $sort = ltrim($sort,"The ");
            // $sort = ltrim($sort,"A ");
            // $sort = ltrim($sort,"An ");
            $output[$id] = $sort;
    }
    asort($output);
    return array_keys($output);
}
?>
