<aside class="col-md-2" style="font-family: 'Silkscreen', cursive;">
    <ul class="nav nav-pills nav-stacked">
        <?php
        $result = $mysqli->query('SELECT * FROM genres');
        while ($row = $result->fetch_assoc()) {
            echo '<li>
                <a href="books.php?genre=' . $row["id"] . '" style="color: #00A8E8;">' . $row["name"] . '</a>
            </li>';
        }
        ?>
    </ul>
</aside>