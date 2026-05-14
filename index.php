<?php 
// created an multidimensional array
$students = [
    ["name" => "jasser" , "score" =>20],
     ["name" => "ahmed" , "score" =>40],
     ["name" => "rally" , "score" =>60],
     ["name" => "monta" , "score" =>80]];


// function to check the grade status if it less than 50 return fail if higher then return pass
function getGradeStatus($score){
    if($score > 50){
        return "<span class='pass'>PASS</span>";
    }elseif($score <= 50){
        return "<span class='fail'>FAIL</span>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow">
    <meta name = "description" content="lab1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab</title>
</head>
<body>
    <header>
        <h1>Lab</h1>
    </header>
    <section>
    <!-- this to check if the array students is empty -->
        <?php if(empty($students)): ?>
            <!-- if empty print no students founds -->
            <p>No Students founds</p>
        <!--else loop over the array and print the name and the score -->
        <?php else: ?>
            <?php foreach($students as $student): ?>
                <div class="studentCard"> <?php echo htmlspecialchars($student["name"]) ?></div>
                <!-- called the function getGradeStatus to print passed or fail student based on the score -->
                <div class="studentCard"> <?php echo getGradeStatus($student["score"]) ?></div>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>
    <footer>
        <!-- copyright and the counts of the students -->
        <p>@copyright <?php date("Y") ?> </p>
        <?php echo "total students:". count($students) ?>
    </footer>
</body>
</html>
