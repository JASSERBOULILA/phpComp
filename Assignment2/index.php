<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "./classes/Database.php";
require_once "./classes/Pizza.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = $_POST["name"];
    $size = $_POST["size"];
    $quantity = $_POST["quantity"];
    $topping = $_POST["topping"];

    $database = new Database(
        "172.31.22.43",
        "pizza",
        "Jasser200657132",
        "xKhhRBS7EN"
    );

    $db = $database->connect();

    $pizza = new Pizza($db);

    $pizza->create(
        $name,
        $size,
        $quantity,
        $topping
    );

    $message = "Your pizza order under doing";
}

require_once "./views/header.php";

?>


<?php require_once 'views/header.php'; ?>

<main class="container">

    <h1>Order a Pizza</h1>

    <?php if ($message !== ""): ?>

        <p class="message">
            <?= $message ?>
        </p>

    <?php endif; ?>

    <form method="post">

        <label for="name">Your Name</label>

        <input
            type="text"
            id="name"
            name="name"
            required
        >

        <label for="size">Pizza Size</label>

        <select id="size" name="size" required>

            <option value="">Select Size</option>
            <option value="Small">Small</option>
            <option value="Medium">Medium</option>
            <option value="Large">Large</option>

        </select>

        <label for="quantity">Quantity</label>

        <input
            type="number"
            id="quantity"
            name="quantity"
            min="1"
            value="1"
            required
        >

        <label for="topping">Topping</label>

        <select id="topping" name="topping">

            <option value="Cheese">Cheese</option>
            <option value="Pepperoni">Pepperoni</option>
            <option value="Mushroom">Mushroom</option>

        </select>

        <button type="submit">
            Order Pizza
        </button>

    </form>

</main>


<?php require_once './views/footer.php'; ?>