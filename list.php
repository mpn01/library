<html data-theme="light">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="assets/img/icons/favicon.svg">
    <link rel="stylesheet" type="text/css" href="styles/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="styles/css/list.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:wght@300;400;600;700&display=swap"
        rel="stylesheet">
    <title>Your books</title>
</head>
<body>
    <div id="global_toggle">
        <input type="checkbox" id="global_darkmode_toggle" />
        <label for="global_darkmode_toggle" id="global_darkmode_toggle_label"></label>
    </div>
    <div id="list">
        <h1 class="main_title">Library</h1>
        <?php
            try {
                require("connect.php");

                $conn = new mysqli($servername, $username, $password, $database);
                if (mysqli_connect_error() != 0){
                    Throw new Exception(mysqli_connect_error());
                } else {

                    //filter books by conditions
                    if (isset($_GET["a"])){
                        //display all books
                        $query = "SELECT * FROM books";
                        //show information about which books have been displayed
                        echo "<center><h2 class='main_subtitle'>All books displayed</h2> </center>";
                    } elseif (isset($_GET["g"]) && $_GET["s"] == "") {
                        //display books with choosen genre
                        $genre = $_GET["g"];
                        $query = "SELECT * FROM books WHERE genre = '$genre'";
                        //show information about which books have been displayed
                        echo "<center><h2 class='main_subtitle'>Books of genre "."<span class='main_subtitle_highlight'>".$genre."</span>"."</h2> </center>";
                    } elseif (isset($_GET["s"]) && !isset($_GET["g"])) {
                        //display books where author, other authors, title, original title or publishing house equals to typed
                        $search = $_GET["s"];
                        $query = "SELECT * FROM books WHERE author LIKE '%%$search%%' OR other_authors LIKE '%%$search%%' OR title LIKE '%%$search%%' OR publishing_house LIKE '%%$search%%' OR original_title LIKE '%%$search%%'";
                        //show information about which books have been displayed
                        echo "<center><h2 class='main_subtitle'>Books which contains the: &raquo".$search."&laquo</h2></center>";
                    } elseif (isset($_GET["s"]) && isset($_GET["g"])) {
                        //display book with choosen genre, where author, other authors, title, original title or publishing house equals to typed
                        $genre = $_GET["g"];
                        $search = $_GET["s"];
                        $query = "SELECT * FROM books WHERE genre LIKE '$genre' AND author LIKE '%%$search%%' OR other_authors LIKE '%%$search%%' OR title LIKE '%%$search%%' OR publishing_house LIKE '%%$search%%' OR original_title LIKE '%%$search%%'";
                        //show information about which books have been displayed
                        echo "<center><h2 class='main_subtitle'>Books which contains the: &raquo".$search."&laquo where genre is: <span class='main_subtitle_highlight'>".$genre."</span></h2></center>";
                    }

                    $result = $conn->query($query);
                    //write out all records
                    while(($row = $result -> fetch_assoc()) != 0) {
        ?>
        <div class="list_item">
            <div class="list_item_">
                <span class="list_item_id"><?php echo $row['id'];?></span>
                <h2 class="list_item_title">
                    <?php echo $row['title']." ";?>
                    <span class="list_item_date">
                        <?php if ($row['release_year'] == 0){ echo " ";} else { echo $row['release_year'];}?>
                    </span>
                </h2>
                <h3 class="list_item_author">
                    <?php if($row['other_authors'] !== ""){ echo "<a href='#'>".$row['author']."</a> ".$row['other_authors']; } else { echo "<a href='author.php?a=".$row['author']."'>".$row['author']."</a>";}?>
                </h3>
            </div>
            <div class="list_item_info"> 
                <div id="column-1">
                    <div class="list_item_info_pages"><b>Pages</b> <?php echo $row['pages'];?> </div>
                    <div class="list_item_info_price"><b>Price</b> <?php if($row['price'] == null){ echo ""; }else { echo $row['price']." zł";} ?> </div>
                    <div class="list_item_info_release"><?php if ($row['first_release'] == 0){ echo "";} else { echo "<b>First release</b> " . $row['first_release'];}?> </div>
                </div>
                <div id="column-2">
                    <div class="list_item_info_genre"><b>Genre </b><?php echo $row['genre'];?></div>
                    <div class="list_item_info_house"><?php if($row['publishing_house'] == ""){ echo ""; } else {echo "<b>Publishing house</b> ".$row['publishing_house'];}?></div>
                    <div class="list_item_info_original"><?php if ($row['original_title'] == ""){ echo "";} else { echo "<b>Original title</b> <i>".$row['original_title'] . "</i>";}?></div>
                </div>
                <!-- <div id="column-3">
                    <img class="list_item_info_cover" src="assets/covers/placeholder.png"/>
                </div> -->
            </div>
        </div>
        <?php
                    }
                }
                $conn -> close();
                } catch (Exception $e) { echo "Error ".$e; }
        ?>
        <button id="list_goback_button" onclick="goBack()">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <line x1="5" y1="12" x2="19" y2="12" />
                <line x1="5" y1="12" x2="11" y2="18" />
                <line x1="5" y1="12" x2="11" y2="6" />
            </svg>Back
        </button>
    </div>
    <script src="js/list.js"></script>
    <script src="js/darkmode.js"></script>
</body>
</html>