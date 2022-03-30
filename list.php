<html data-theme="light">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="assets/favicon.png">
    <link rel="stylesheet" type="text/css" href="styles/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="styles/css/list.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:wght@300;400;600;700&display=swap"
        rel="stylesheet">
    <title>Results | Library</title>
</head>
<body>
    <div id="theme">
        <input type="checkbox" id="theme__toggle" />
        <label for="theme__toggle" id="theme__toggle--state"></label>
    </div>
    <main>
        <h1 id="title">Library</h1>
        <?php
            try {
                require("connect.php");

                $conn = new mysqli($servername, $username, $password, $database);
                if (mysqli_connect_error() != 0){
                    Throw new Exception(mysqli_connect_error());
                } else {
                    //display books by conditions
                    if (isset($_GET["a"])){ //display all books
                        $query = "SELECT * FROM books";
                        echo "<center><h2 class='subtitle'>All books displayed</h2> </center>";
                    } elseif (isset($_GET["g"]) && $_GET["s"] == "") { //display books searched by genre
                        $genre = $_GET["g"];
                        $query = "SELECT * FROM books WHERE genre = '$genre'";
                        echo "<center><h2 class='subtitle'>Books of genre "."<span class='subtitle subtitle--highlight'>".$genre."</span>"."</h2> </center>"; //show information about which books have been displayed
                    } elseif (isset($_GET["s"]) && !isset($_GET["g"])) { //display books searched by text (author, title, other authors, publishing house, original title)
                        $search = $_GET["s"];
                        $query = "SELECT * FROM books WHERE author LIKE '%%$search%%' OR other_authors LIKE '%%$search%%' OR title LIKE '%%$search%%' OR publishing_house LIKE '%%$search%%' OR original_title LIKE '%%$search%%'";
                        echo "<center><h2 class='subtitle'>Books which contains the: &raquo".$search."&laquo</h2></center>";
                    } elseif (isset($_GET["s"]) && isset($_GET["g"])) { //display books searched by genre and text
                        $genre = $_GET["g"];
                        $search = $_GET["s"];
                        $query = "SELECT * FROM books WHERE genre LIKE '$genre' AND author LIKE '%%$search%%' OR other_authors LIKE '%%$search%%' OR title LIKE '%%$search%%' OR publishing_house LIKE '%%$search%%' OR original_title LIKE '%%$search%%'";
                        echo "<center><h2 class='subtitle'>Books which contains the: &raquo".$search."&laquo where genre is: <span class='subtitle subtitle--highlight'>".$genre."</span></h2></center>";
                    }

                    $result = $conn->query($query);
                    while(($row = $result -> fetch_assoc()) != 0) { //write out all records
        ?>
        <div id="item">
            <div id="item__info">
                <span id="item__id"><?php echo $row['id'];?></span>
                <h2 id="item__title">
                    <?php echo $row['title']." ";?>
                    <span id="item__date">
                        <?php if ($row['release_year'] == 0){ echo " ";} else { echo $row['release_year'];}?>
                    </span>
                </h2>
                <h3 id="item__author">
                    <?php if($row['other_authors'] !== ""){ echo "<a href='#'>".$row['author']."</a> ".$row['other_authors']; } else { echo "<a href='author.php?a=".$row['author']."'>".$row['author']."</a>";}?>
                </h3>
            </div>
            <div id="item__details">
                <div class="details__column details__column--left">
                    <div id="details__pages"><b>Pages</b> <?php echo $row['pages'];?> </div>
                    <div id="details__price"><b>Price</b> <?php if($row['price'] == null){ echo ""; } else { echo $row['price']." zł";} ?> </div>
                    <div id="details__release"><?php if ($row['first_release'] == 0){ echo "";} else { echo "<b>First release</b> " . $row['first_release'];}?> </div>
                </div>
                <div class="details__column details__column--middle">
                    <div id="details__genre"><b>Genre </b><?php echo $row['genre'];?></div>
                    <div id="details__house"><b>Publishing house </b><?php if ($row['publishing_house'] == ""){ echo "-"; } else { echo $row['publishing_house']; }?></div>
                    <div id="details__original"><b>Original title</b><?php if ($row['original_title'] == ""){ echo "-"; } else { echo "<i>".$row['original_title']."</i>";}?></div>
                </div>
                <div class="details__column details__column--right">
                    <img id="details__cover" src="<?php if($row['cover'] == NULL) { echo "assets/covers/placeholder.png";} else { echo $row['cover'];}?>"/>
                </div>
            </div>
        </div>
        <?php
                    }
                }
                $conn -> close();
                } catch (Exception $e) { echo "Error ".$e; }
        ?>
        <button id="button--goback" onclick="goBack()">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <line x1="5" y1="12" x2="19" y2="12" />
                <line x1="5" y1="12" x2="11" y2="18" />
                <line x1="5" y1="12" x2="11" y2="6" />
            </svg>Back
        </button>
    </main>
    <script src="js/list.js"></script>
    <script src="js/darkmode.js"></script>
</body>
</html>