<html>
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" type="text/css" href="styles/css/index.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:wght@300;400;600;700&display=swap"
        rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/img/icons/book.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home library</title>
</head>
<body>
    <div id="index">
        <h1 class="index_title">Home library</h1>
        <h3 class="index_subtitle">search for your book</h3>
        <form action="list.php" method="GET" id="index_form">
            <input name="s" id="index_form_searchbar" type="text" placeholder=" title, author, etc.">
            <select name="g" id="index_form_genrelist">
                <option value="">choose a genre</option>
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
            <a href="#" id="index_form_showall_button">Show all books</a>
            <button id="index_form_submit_button" type="submit" name="submit">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="32" height="32" viewBox="0 0 24 24" stroke-width="2 " stroke="#efefef" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <circle cx="10" cy="10" r="7" />
                <line x1="21" y1="21" x2="15" y2="15" />
                </svg>
            </button>
        </form>
    </div>
</body>
<!-- <script type="text/javascript" src="js/index.js"></script> -->
</html>