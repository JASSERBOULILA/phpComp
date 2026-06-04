<main>

    <sec1tion>
        <h2>Popular Movies Week Five Lesson</h2>
    </sec1tion>
    <section>
        <?php 
            foreach($lessonMovieRecords as $singleMovie) {
                // securely handle text data with htmlspecialchars() to avoid XSS (Cross-Site Scripting) attacks
                $validatedTitle = htmlspecialchars($singleMovieObject->title ?? "Unknown Title");
                $validatedRelease = htmlspecialchars($singleMovieObject->release_date ?? "Unknown Release Date");
                $validateDescription = htmlspecialchars($singleMovieObject->description ?? "Unknown Description");  
                $validateActors = htmlspecialchars($singleMovieObject->main_actors ?? "Unknown Actors");  
            }
        ?>
    </section>
</main>