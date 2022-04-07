<html data-theme="light">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="assets/favicon.png">
    <link rel="stylesheet" type="text/css" href="styles/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="styles/css/index.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:wght@300;400;600;700&display=swap"
        rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Search | Library</title>
</head>
<body>
    <div id="theme">
        <input type="checkbox" id="theme__toggle" />
        <label for="theme__toggle" id="theme__toggle--state"></label>
    </div>
    <header>
        <h1 id="title"> 📚 Library</h1>
    </header>
    <main>        
        <h3 class="subtitle">search for your book</h3>
        <form action="list.php" method="GET" id="search">
            <div tabindex="0" id="search__bar">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="23" height="23" viewBox="0 0 24 24" stroke-width="1.5" stroke="#948f8f" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <circle cx="10" cy="10" r="7" />
                    <line x1="21" y1="21" x2="15" y2="15" />
                </svg>
                <input tabindex="0" name="s" id="bar__input" type="text" placeholder="author, title or tag">
            </div>
            <select name="g" id="search__select">
                <option value="" disabled selected>choose a genre</option>
                <?php
                    require("connect.php");

                    $conn = new mysqli($servername, $username, $password, $database);
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
            <a href="list.php?a" class="search__button search__button--showall">Show all</a>
            <button type="submit" class="search__button search__button--submit">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#efefef" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <circle cx="10" cy="10" r="7" />
                    <line x1="21" y1="21" x2="15" y2="15" />
                </svg>
            </button>
            <button type="reset" class="search__button search__button--reset">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="#efefef" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <line x1="18" y1="6" x2="6" y2="18" />
                    <line x1="6" y1="6" x2="18" y2="18" />
                </svg>
            </button>
        </form>
    </main>
    <script src="js/index.js"></script>
    <script src="js/darkmode.js"></script>
</body>
</html>