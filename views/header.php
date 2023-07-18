<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bookstore</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Silkscreen&family=Ubuntu&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">

</head>

<body style="font-family: 'Ubuntu', sans-serif;">
    <div class="container">
        <header>
            <div class="jumbotron" style="background-color: #00171F; color: #00A8E8; text-align: center; font-family: 'Silkscreen', cursive;">
                <h1>Book Addicted📚</h1>
                <div class="card">
                    <div class="card-header">
                        Quote Today
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0" id="quoteBlock">
                            <p>Loading...</p>
                        </blockquote>

                        <script>
                            fetch('https://api.quotable.io/random')
                                .then(response => response.json())
                                .then(data => {
                                    const quoteBlock = document.getElementById('quoteBlock');
                                    const quote = data.content;
                                    const author = data.author;
                                    quoteBlock.innerHTML = `
                <p>"${quote}"</p>
                <footer class="blockquote-footer">${author}</footer>
            `;
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                });
                        </script>

                    </div>
                </div>
            </div>

            <nav class="navbar navbar-default" style="font-family: 'Silkscreen', cursive;">
                <ul class="nav navbar-nav">
                    <li role="presentation" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>">
                        <a href="index.php">Home🏠</a>
                    </li>
                    <?php if (!isset($_SESSION['type'])) : ?>
                        <li role="presentation">
                            <a href="login.php" style="color: green;">Log in🗝️</a>
                        </li>
                    <?php elseif ($_SESSION['type'] == 1) : ?>
                        <li role="presentation" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'edit_books.php') ? 'active' : ''; ?>">
                            <a href="edit_books.php">Data Buku📒</a>
                        </li>
                        <li role="presentation" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'edit_book.php') ? 'active' : ''; ?>">
                            <a href="edit_book.php">Tambah Buku📚</a>
                        </li>
                        <li role="presentation">
                            <a href="logout.php" style="color: red;">Log out🔒</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>

        </header>
        <main>