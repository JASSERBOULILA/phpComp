<?php

require_once 'api-config.php';

$search = trim($_GET['search'] ?? 'programming');

$gifs = getGifs($search);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Search GIFs using the GIPHY API and PHP">
    <meta name="author" content="Jasser Boulila">

    <title>GIF Finder</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<header>
    <div class="container">
        <h1>GIF Finder</h1>
        <p>Search and discover animated GIFs powered by the GIPHY API.</p>
    </div>
</header>

<main class="container">

    <section class="search-section">

        <form method="GET" class="search-form">

            <input
                type="text"
                name="search"
                placeholder="Search for GIFs..."
                value="<?= htmlspecialchars($search) ?>"
            >

            <button type="submit">
                Search
            </button>

        </form>

    </section>

    <section class="results">

        <?php if (!empty($gifs)): ?>

            <div class="gif-grid">

                <?php foreach ($gifs as $gif): ?>

                    <article class="gif-card">

                        <img
                            src="<?= htmlspecialchars($gif['images']['fixed_height']['url']) ?>"
                            alt="<?= htmlspecialchars($gif['title']) ?>"
                        >

                        <div class="gif-content">
                            <h3>
                                <?= htmlspecialchars($gif['title']) ?>
                            </h3>
                        </div>

                    </article>

                <?php endforeach; ?>

            </div>

        <?php else: ?>

            <p class="no-results">
                No GIFs found for your search.
            </p>

        <?php endif; ?>

    </section>

</main>

<footer>
    <p>API Integration Assignment | GIPHY Search API</p>
</footer>

</body>

</html>