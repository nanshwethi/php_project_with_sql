<?php
$servername = "localhost";
$username = "gigi";
$password = "admin";


// Create connection
$conn = new mysqli($servername, $username, $password, 'wad_first_testing_database');

if (!$conn) {
    echo "Connection failed: " . mysqli_connect_error();
}

$read = "SELECT * FROM products";

$query = mysqli_query($conn, $read);

// while($data = mysqli_fetch_row($query)){
//     print_r($data);
// }

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
                    Products
                    <svg class="shrink-0 mx-2 size-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6"></path>
                    </svg>
                </a>
            </li>

        </ol>

        <hr class="shadow-sm mb-8 ">

        <div>
            <form action="./product_save.php" method="post">
                <div class="flex items-start gap-3 ">

                    <div style="margin-bottom: 20px;">

                        <label for="name">Name</label>
                        <input type="text" name="name" class=" rounded p-2" required>
                    </div>
                    <div style="margin-bottom: 20px;">

                        <label for="name">Price</label>
                        <input type="text" name="price" class=" rounded p-2" required>
                    </div>
                    <div style="margin-bottom: 20px;">

                        <label for="name">Instock</label>
                        <input type="number" name="instock" class=" rounded p-2" required>
                    </div>
                    <div>
                        <button type="submit" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-green-100 text-green-800 hover:bg-green-200 focus:outline-none focus:bg-green-200 disabled:opacity-50 disabled:pointer-events-none dark:text-green-500 dark:bg-green-800/30 dark:hover:bg-green-800/20 dark:focus:bg-green-800/20">
                            Create
                        </button>
                    </div>
                </div>

            </form>
            <div>
                <div class="flex flex-col">
                    <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="border overflow-hidden dark:border-neutral-700">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Id</th>
                                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Name</th>
                                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Price</th>
                                            <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Instock</th>
                                            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase dark:text-neutral-500 text-end">Created_at</th>
                                            <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">

                                        <?php while ($data = mysqli_fetch_row($query)): ?>
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200"><?= $data[0] ?></td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200"><?= $data[1] ?></td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200 "><?= $data[2] ?></td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200 text-end"><?= $data[3] ?></td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200 text-end"><?= $data[4] ?></td>
                                                <td class="px-6 py-4 whitespace-nowrap flex text-sm font-medium text-gray-800 justify-end dark:text-neutral-200 text-end">
                                                    <div class="inline-flex rounded-lg shadow-sm">
                                                        <a href="./product_update.php?id=<?= $data[0] ?>" class="py-2 px-3 inline-flex justify-center items-center first:rounded-s-lg first:ms-0 last:rounded-e-lg text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                                            </svg>
                                                        </a>
                                                        <a onclick="confirm('Do you want to delete data?')" href="./product_delete.php?id=<?= $data[0] ?>" type="button" class="py-2 px-3 inline-flex justify-center items-center  -ms-px first:rounded-s-lg first:ms-0 last:rounded-e-lg text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 fill-red-50 stroke-red-500">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                            </svg>
                                                        </a>

                                                    </div>


                                                </td>
                                            </tr>
                                        <?php endwhile ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</main>

<?php include('./template/sidebar.php') ?>

<?php include('./template/footer.php') ?>