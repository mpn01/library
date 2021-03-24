<?php
    if(isset($_GET['submit']) == false){
        header('Location: index.php');
    }
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="assets/img/icons/book.svg">
    <link rel="stylesheet" type="text/css" href="styles/css/list.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600&display=swap"
        rel="stylesheet">
    <title>Biblioteka domowa</title>
</head>
<body>
    <div id="results">
    <a id="goback-button" href="index.php">Powrót</a>
    <center><h1 class="page-title">Biblioteka domowa</h1></center>
    <?php
        try {
            $conn = new mysqli('localhost', 'root', '', 'library');
            if (mysqli_connect_error() != 0){
                Throw new Exception(mysqli_connect_error());
            } else {
                $f = $_GET['f'];
                $g = $_GET['g'];
                $w = $_GET['w'];

                switch ($f) {
                    case 1:
                        $query = "SELECT * FROM books";
                        echo "<center><h2 class='h2all'>Wyświetlono wszystkie pozycje</h2></center>";
                        break;
                    case 2:
                        $query = "SELECT * FROM `books` WHERE genre='".$g."'";
                        echo "<center><h2 class='h2all'>Wyświetlono pozycje z gatunku "."<span class='bluebg'>".$g."</span>"."</h2></center>";
                        break;
                    case 3:
                        $query = "SELECT * FROM books WHERE author LIKE %%$w%% OR other_authors LIKE %%$w%% OR title LIKE %%$w%% OR publishing_house LIKE %%$w%% OR original_title LIKE %%$w%% OR tag LIKE %%$w%%   ";
                        echo "<center><h2 class='h2all'>Wyświetlono pozycje zgodne z: &raquo".$w."&laquo</h2></center>";
                        break;
                }

                $result = $conn->query($query);
                // if($f == 1){
                //     echo "<center><h2 class='h2all'>Wyświetlono wszystkie pozycje</h2></center>";
                // } elseif($f == 2){
                //     echo "<center><h2 class='h2all'>Wyświetlono pozycje z gatunku "."<span class='bluebg'>".$g."</span>"."</h2></center>";
                // } else {
                //     echo "<center><h2 class='h2all'>Wyświetlono pozycje zgodne z: &raquo".$w."&laquo</h2></center>";
                // }

                while(($row = $result -> fetch_assoc()) != 0) {
                    echo "<div onclick='showInfo(".$row['id'].",1)' class='result'>";
                        echo $row['id'];
                        echo "<h2 class='title'>";
                            echo $row['title'];
                            echo " ";
                            echo "<span class='date'>";
                            if ($row['release_year'] == 0){
                                echo " ";
                            } else {
                                echo $row['release_year'];
                            }
                            echo "</span>";
                        echo "</h2>";
                        echo "<h3 class='author'>";
                            if($row['other_authors'] !== ""){
                                echo $row['author'].", ".$row['other_authors'];
                            } else {
                                echo $row['author'];
                            }
                        echo "</h3>";
                        echo "<div id='" . $row['id'] . "' class='info-container'>";
                            echo "Ilość stron: ";
                            echo $row['pages'];
                            if ($row['first_release'] == 0){
                                echo "";
                            } else {
                                echo ", pierwsze wydanie: " . $row['first_release'];
                            }
                            if ($row['original_title'] == ""){
                                echo "";
                            } else {
                                echo ", tytuł oryginału: <i>" . $row['original_title'] . "</i>";
                            }
                            echo ", ";
                            echo "Cena: ";
                            if($row['price'] == 0.00){
                               echo "<i>brak ceny</i>";
                            }else {
                               echo $row['price']." zł";
                               }
                            echo ", Gatunek: ";
                            echo $row['genre'];
                            if($row['publishing_house'] == ""){
                                echo " ";
                            } else {
                                echo ", Wydawnictwo: ".$row['publishing_house'];
                            }
                        echo "</div>";
                    echo "</div>";
                }
            }
            $conn -> close();
        } catch (Exception $e) {
            echo "Error ".$e;
        }
    ?>
    </div>
    <script src="js/list.js"></script>
</body>
</html>
