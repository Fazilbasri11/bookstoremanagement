<?php
include 'init.php';
include 'views/header.php';
include 'views/aside.php';

// Mengambil semua buku
$query = 'SELECT Books.id, Books.title, Books.author, Books.cover FROM Books';
$result = $mysqli->query($query);

$books = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }
}
?>

<section class="col-md-10">
    <div class="row" style="margin-bottom: 5%;">
        <div class="col-md-12">
            <h2>Cari Buku🔍</h2>
            <input type="text" id="searchInput" class="form-control" placeholder="Search books...">
        </div>
    </div>
    <div class="row" id="searchResults">
        <?php foreach ($books as $book) { ?>
            <div class="col-sm-6 col-md-4 book-item" style="height: 620px">
                <div class="thumbnail">
                    <a href="book.php?id=<?php echo $book['id']; ?>">
                        <img src="images/<?php echo ($book['cover'] ? $book['cover'] : 'default-placeholder.png'); ?>" alt="">
                    </a>
                    <div class="caption">
                        <h3><?php echo $book['title']; ?></h3>
                        <h5><?php echo $book['author']; ?></h5>
                        <p><a href="book.php?id=<?php echo $book['id']; ?>" class="btn btn-primary" role="button">Details</a></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#searchInput').on('input', function() {
            var searchQuery = $(this).val().toLowerCase();

            $('.book-item').each(function() {
                var bookTitle = $(this).find('h3').text().toLowerCase();
                var bookAuthor = $(this).find('h5').text().toLowerCase();

                if (bookTitle.includes(searchQuery) || bookAuthor.includes(searchQuery)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>

<?php
include 'views/footer.php';
?>