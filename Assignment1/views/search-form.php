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