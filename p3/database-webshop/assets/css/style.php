<?php
$liqry = $con->prepare("SELECT name, description, category_image.image FROM category INNER JOIN category_image on category.category_id = category_image.category_id WHERE category.active = 1 AND category_image.active = 1");
if ($liqry === false) {
    trigger_error(mysqli_error($con));
} else {
    // $liqry->bind_param('s', $categoryName, $categoryDescription);
    $liqry->bind_result($categoryName, $categoryDescription, $img);
    if ($liqry->execute()) {
        $liqry->store_result();
        while ($liqry->fetch()) {
?>


<?php
        }
    }
    $liqry->close();
}
?>


<?php
    header("Content-type: text/css; charset: UTF-8");
?>

.article-category{
    background-image:url(<?php echo BASEURL ?>/assets/img/img_category/<?php echo $img ?>);
}