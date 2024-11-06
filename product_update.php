<?php

// echo "<pre>";

$id = $_GET['id'];


$servername = "localhost";
$username = "gigi";
$password = "admin";

// Create connection
$conn = new mysqli($servername, $username, $password, 'wad_first_testing_database');

if (!$conn) {
    echo "Connection failed: " . mysqli_connect_error();
}


//SQL

$old_data = "SELECT * FROM products WHERE id=$id";
$old_data_query = mysqli_query($conn, $old_data); // working stage
$single_old_data = mysqli_fetch_assoc($old_data_query);
// var_dump($single_old_data);


?>


<?php include('./template/header.php') ?>

<?php include('./template/top.php') ?>

<main class=" p-10 lg:pl-[18rem] lg:mx-0 mx-auto inline-block">

    <h1 class=" uppercase font-bold text-xl text-gray-700 font-serif mb-8">Manage Products</h1>

    <div class="p-8 lg:mt-0 bg-slate-100 rounded-[10px] sm:mt-6 ">
        <ol class="flex items-center whitespace-nowrap   pb-1 ">
            <li class="inline-flex items-center">
                <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500" href="#">
                    Home
                </a>
                <svg class="shrink-0 mx-2 size-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6"></path>
                </svg>
            </li>
            <li class="inline-flex items-center">
                <a class="flex items-center text-sm text-gray-700 font-semibold hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500" href="#">
                    Edit Products
                    <svg class="shrink-0 mx-2 size-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6"></path>
                    </svg>
                </a>
            </li>

        </ol>

        <hr class="shadow-sm mb-8 ">

        <div>
            <form action="./product_update_save.php" method="post">
                <input type="text" name="id" value="<?= $single_old_data['id'] ?>" hidden>
                <div class="flex items-start gap-3 ">
                    <div style="margin-bottom: 20px;">

                        <label for="name">Name</label>
                        <input type="text" name="name" class=" rounded p-2" placeholder="<?= $single_old_data['name'] ?>" required>
                    </div>

                    <div style="margin-bottom: 20px;">

                        <label for="name">Price</label>
                        <input type="text" name="price" class=" rounded p-2" placeholder="<?= $single_old_data['price'] ?>" required>
                    </div>
                    <div style="margin-bottom: 20px;">

                        <label for="name">Instock</label>
                        <input type="number" name="instock" class=" rounded p-2" placeholder="<?= $single_old_data['instock'] ?>" required>
                    </div>


                </div>
                <div class=" flex justify-end gap-3">
                    <button type="submit" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-teal-300 text-teal-800 hover:bg-teal-200 focus:outline-none focus:bg-teal-200 disabled:opacity-50 disabled:pointer-events-none dark:text-teal-500 dark:bg-teal-800/30 dark:hover:bg-teal-800/20 dark:focus:bg-teal-800/20">
                        Edit
                    </button>
                    <a href="./index.php" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-500 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:text-neutral-400 dark:border-neutral-700 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                        Cancel
                    </a>
                </div>
            </form>

        </div>

    </div>

</main>

<?php include('./template/sidebar.php') ?>

<?php include('./template/footer.php') ?>