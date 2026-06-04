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
                        <h3><?= htmlspecialchars($gif['title']) ?></h3>
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