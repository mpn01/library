<html data-theme="light">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="assets/img/icons/book.svg">
    <link rel="stylesheet" type="text/css" href="styles/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="styles/css/index.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:wght@300;400;600;700&display=swap"
        rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Home library</title>
</head>
<body>
    <div id="global_toggle">
        <input type="checkbox" id="global_darkmode_toggle" />
        <label for="global_darkmode_toggle" id="global_darkmode_toggle_label"></label>
    </div>
    <div id="index">
        <h1 class="main_title">Home library</h1>
        <h3 class="main_subtitle">search for your book</h3>
        <form action="list.php" method="GET" id="index_form">
            <div tabindex="0" id="index_form_searchbox">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#948f8f" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />
                    <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" />
                </svg>
                <input tabindex="0" name="s" id="index_form_searchbar" type="text" placeholder="title, author or tag">
            </div>
            <select name="g" id="index_form_genrelist">
                <option value="" disabled selected>choose a genre</option>
                <?php
                    $conn = new mysqli('localhost', 'root', '', 'library');
                    try {
                        if ($conn->connect_errno != 0){
                            throw new Exception(mysqli_connect_errno());
                        } else {
                            $query = "SELECT DISTINCT genre FROM books WHERE genre <>'' ORDER BY genre";
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
            <a href="list.php?a" id="index_form_showall_button">Show all books</a>
            <button id="index_form_submit_button" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="32" height="32" viewBox="0 0 24 24" stroke-width="2 " stroke="#efefef" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <circle cx="10" cy="10" r="7" />
                    <line x1="21" y1="21" x2="15" y2="15" />
                </svg>
            </button>
            <button type="reset" id="index_form_reset_button">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <line x1="18" y1="6" x2="6" y2="18" />
                <line x1="6" y1="6" x2="18" y2="18" />
            </svg>
        </button>
        </form>

    </div>
    <script src="js/index.js"></script>
    <script src="js/darkmode.js"></script>
</body>
</html>