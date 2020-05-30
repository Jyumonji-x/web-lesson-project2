
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <script src="https://upcdn.b0.upaiyun.com/libs/jquery/jquery-2.0.2.min.js"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="src/css/main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="src/css/homeFixedButton.css">
</head>
<body>

    <header>
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Album</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="src/web/Browse.php">Browse <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="src/web/Search.php">Search <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <ul class="navbar-nav">

<?php
session_start();
if (isset($_SESSION["sessionUid"])){
    echo '          <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Account
                          </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="src/web/MyPhoto.php">
                            <svg class="bi bi-image-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M.002 3a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2h-12a2 2 0 01-2-2V3zm1 9l2.646-2.354a.5.5 0 01.63-.062l2.66 1.773 3.71-3.71a.5.5 0 01.577-.094L15.002 9.5V13a1 1 0 01-1 1h-12a1 1 0 01-1-1v-1zm5-6.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" clip-rule="evenodd"/>
                            </svg>
                            Photo
                        </a>
                        <a class="dropdown-item" href="src/web/Upload.php">
                            <svg class="bi bi-capslock-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.27 1.047a1 1 0 011.46 0l6.345 6.77c.6.638.146 1.683-.73 1.683H11.5v1a1 1 0 01-1 1h-5a1 1 0 01-1-1v-1H1.654C.78 9.5.326 8.455.924 7.816L7.27 1.047zM4.5 13.5a1 1 0 011-1h5a1 1 0 011 1v1a1 1 0 01-1 1h-5a1 1 0 01-1-1v-1z" clip-rule="evenodd"/>
                            </svg>
                            Upload
                        </a>
                        <a class="dropdown-item" href="src/web/Favourite.php">
                            <svg class="bi bi-heart-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" clip-rule="evenodd"/>
                            </svg>
                            Favourite
                        </a>
                        <a class="dropdown-item" href="src/php/LogOut.php">
                            <svg class="bi bi-people-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 008 15a6.987 6.987 0 005.468-2.63z"/>
                                <path fill-rule="evenodd" d="M8 9a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M8 1a7 7 0 100 14A7 7 0 008 1zM0 8a8 8 0 1116 0A8 8 0 010 8z" clip-rule="evenodd"/>
                            </svg>
                            Log out
                        </a>
                    </div>
                </li>';
}
else{
    echo '              <li class="nav-item">
                    <a class="nav-link" href="src/web/Login.php">Login <span class="sr-only">(current)</span></a>
                        </li>';
}
                        ?>

            </ul>
        </div>
    </nav>
    <main>
        <a href="./src/web/Details.php?path=5855174537.jpg">
            <img src="img/images/5855174537.jpg" class="img-fluid card-img-top">
        </a>

        <div id="pictureShowing" class="container">
            <script src="src/js/indexPictures.js"></script>
        </div>
    </main>
    <footer class="footer">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        Tongqiao Xu
                        No.19302010015
                    </div>
                    <div class="col-sm">
                        Hello World!
                    </div>
                    <div class="col-sm">
                        <img src="img/icons/qrCode.jpg" height="200" width="200">
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <a href="#top"><svg class="bi bi-arrow-up fixedButton" id="up" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z" clip-rule="evenodd"/>
            <path fill-rule="evenodd" d="M7.646 2.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8 3.707 5.354 6.354a.5.5 0 1 1-.708-.708l3-3z" clip-rule="evenodd"/>
        </svg></a>
    <a id="refreshBtn" name="refresh"><svg class="bi bi-arrow-clockwise fixedButton" id="back" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M3.17 6.706a5 5 0 0 1 7.103-3.16.5.5 0 1 0 .454-.892A6 6 0 1 0 13.455 5.5a.5.5 0 0 0-.91.417 5 5 0 1 1-9.375.789z" clip-rule="evenodd"/>
        <path fill-rule="evenodd" d="M8.147.146a.5.5 0 0 1 .707 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 1 1-.707-.708L10.293 3 8.147.854a.5.5 0 0 1 0-.708z" clip-rule="evenodd"/>
    </svg></a>
    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="src/js/indexRefresh.js"></script>
</body>
</html>