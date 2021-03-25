<html>
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" type="text/css" href="styles/css/index.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600&display=swap"
        rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/img/icons/book.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home library</title>
</head>
<body>
    <div id="search_container">
        <center><h1>Home library</h1></center>
        <center><h3 class="sub-text"><i>Choose and option</i></h3></center>
        <form action="list.php" method="GET" class="search-form">
            <div class="radio" id="button_books_all">
            <input type="radio" id="booksAll" name="option" value="1">Show all books
            </div>
            <br />
            <div class="radio" id="button_books_genre">
            <input type="radio" id="booksGenre" name="option" value="2">Show books of the selected genre
            </div>
            <br />
            <div class="radio" id="button_books_search">
            <input type="radio" id="booksSearch" name="option" value="3">Find a book
            </div>
            <input name="w" class="search-bar" type="text" placeholder=" title, author, etc.">
            <div id="prostokat"></div>
            <select name="g" class="type-list">
                <option value=''><span class='lightgray'>choose a genere</span></option>
                <?php
                    $conn = new mysqli('localhost', 'root', '', 'library');
                    try {
                        if($conn->connect_errno != 0){
                            throw new Exception(mysqli_connect_errno());
                        } else {
                            $query = "SELECT DISTINCT `genre` FROM `books` WHERE genre <>'' ORDER BY genre";
                            $result = $conn -> query($query);

                            while(($row = $result -> fetch_assoc()) !== null) {
                                echo "<option>".$row['genre']."</option>";
                            }
                        }
                    } catch (Exception $e) {
                        echo $e;
                    }
                    $conn -> close();
                ?>
            </select>
            <button class="search-submit-button" type="submit" name="submit">Go to the library</button>
        </form>
    </div>
</body>
<script type="text/javascript" src="js/index.js"></script>
</html>