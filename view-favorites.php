<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="css/semantic.js"></script>
  
    <link href="css/semantic.css" rel="stylesheet">
    <link href="css/icon.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>
<?php include 'includes/art-header.inc.php'; ?>

<main class="ui container">
    <section class="ui basic segment">
      <h2>Favorites</h2>
        <table class="ui basic collapsing table">
          <thead>
            <tr>
              <th>Image</th>
              <th>Title</th>
              <th>Action</th>
          </tr></thead>
          <tbody>
            <?php 
            if (isset($_SESSION['favorites']) && !empty($_SESSION['favorites'])) {
                foreach ($_SESSION['favorites'] as $favorite) {
                    $paintingID = htmlspecialchars($favorite['PaintingID']);
                    $imageFileName = htmlspecialchars($favorite['ImageFileName']);
                    $title = htmlspecialchars($favorite['Title']);
                    echo "
                    <tr>
                        <td><img src='images/art/square-medium/" . $imageFileName . ".jpg' alt='" . $title . "'></td>
                        <td><a href='single-painting.php?id=$paintingID'>$title</a></td>
                        <td><a class='ui small button' href='remove-favorites.php?PaintingID=$paintingID'>Remove</a></td>
                    </tr>";
                }
            }
            ?>
        </tbody>
        <tfoot class="full-width">
            <th colspan="3">
                <a class="ui left floated small primary labeled icon button" href="remove-favorites.php?action=removeAll">
                    <i class="remove circle icon"></i> Remove All Favorites
                </a>
            </th>
        </tfoot>

         </table>
    </section>
</main>

<footer class="ui black inverted segment">
    <div class="ui container">footer</div>
</footer>
</body>
</html>
