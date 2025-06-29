<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="./output.css" rel="stylesheet" />
    <title>Loans</title>
  </head>
  <body class="bg-gray-900 text-amber-100">
    <!--Navbar Start-->
    <div
      class="mx-auto px-20 py-6 flex justify-between items-center text-white"
    >
      <div class="flex items-center space-x-3">
        <img
          src="../assets/images/United_International_University_Monogram.svg.png"
          alt="Logo"
          class="h-8"
        />
        <span class="text-xl font-bold">UIU Help Box</span>
      </div>
      <nav class="space-x-6 hidden md:flex items-center">
        <a href="index.html" class="hover:text-orange-400">Home</a>
        <a
          href="index.html"
          onclick="ScrollToService()"
          class="hover:text-orange-400"
          >Our Services</a
        >
        <a href="catagories.html" class="hover:text-orange-400">Categories</a>
        <a href="#" class="hover:text-orange-400">Contact us</a>
        <button
          class="bg-orange-400 hover:bg-orange-700 text-white px-4 py-2 rounded-lg"
        >
          Get Started
        </button>
      </nav>
    </div>

    <!--Navbar End-->

    <div class="flex flex-col justify-items-start mt-[3rem] w-[100%]">
      <div class="flex flex-col justify-center ml-[7%]">
        <div class="flex align-middle text-4xl font-bold">
          Give Loans that Benifit Everybody
        </div>
      </div>
    </div>

    <!--SearchBar Start-->

    <div class="p-6 flex justify-start ml-[5%]">
      <form class="w-2xl" action="" method="get">
        <label
          for="default-search"
          class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white"
          >Search</label
        >
        <div class="relative">
          <div
            class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none"
          >
            <svg
              class="w-4 h-4 text-gray-500 dark:text-gray-400"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 20 20"
            >
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"
              />
            </svg>
          </div>
          <input
            type="search"
            id="default-search"
            name="search"
            class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Search Mockups, Logos..."

          />
          <button
            type="submit"
            class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
          >
            Search
          </button>
        </div>
      </form>

    </div>
    <!--SearchBar End-->
    <div class="grid grid-cols-3 row-auto gap-y-7 ml-[7%] mt-[2%]">


<!--Here lied the card-->
    <?php


require '../assets/scripts/dbconnection.php';

$search_text = isset($_GET['search']) ? trim($_GET['search']) : '';
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$limit = 9;
$offset = ($page - 1) * $limit;
if ($search_text === '') {
    $sql = "SELECT * FROM Donation ORDER BY donation_id DESC LIMIT $limit OFFSET $offset";
} else {
    $sql = "SELECT * FROM Donation WHERE description_title LIKE '%$search_text%' ORDER BY donation_id DESC LIMIT $limit OFFSET $offset";
}

$result = $conn->query($sql);

if ($result && $result->num_rows > 0):
    while ($row = $result->fetch_assoc()):
?>
    <!-- Card Start -->
    <div class="h-max[100] w-75 flex flex-col gap-3 items-center">
        <div>
            <img
                src="<?= $row['photo'] ?>"
                class="h-max[60] w-max[60] rounded-2xl"
                alt="Loan Photo"
            />
        </div>
        <a href="donation-description.php?id=<?php echo $row['donation_id'] ?>">
        <div class="flex align-middle text font-light">
            <?= $row['description_title'] ?>
        </div>
    </a>
    </div>
    <!-- Card End -->
<?php
    endwhile;
else:
    echo "<p>No results found.</p>";
endif;
?>


    </div>

    <div class="flex justify-center p-10">
      <form action="" method="get">
         <input type="hidden" name="page" value="<?= $page + 1 ?>">

      <button
        type="submit"
        name = "see_more_button"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
      >
        See More
      </button>
      </form>
    </div>

    <!--Footer Code-->
    <div class="flex justify-around mt-20 mb-10">
      <div class="flex-col justify-between">
        <div class="font-light">
          For More information or Inquiry Contact us at
        </div>
        <div class="font-light">uiuloananddonation@gmail.com</div>
      </div>

      <div class="flex justify-around items-center gap-5">
        <div class="font-light">Terms and Condition</div>
        <div class="font-light">Cookie Policy</div>
        <div class="font-medium">Legal</div>

        <div
          class="bg-amber-500 h-10 p-4 rounded-3xl flex flex-col justify-center"
        >
          <button class="flex justify-evenly gap-2">
            <div class="flex justify-center gap-1">
              <img src="/assets/images/tick.png" class="h-5 w-5" />
              English
            </div>
            <div>|</div>
            <div>United States</div>
          </button>
        </div>
      </div>
    </div>
    <!--footer End here-->
  </body>
  <script>
    function ScrollToService() {
      document
        .querySelector('#services')
        .scrollIntoView({ behavior: 'smooth' });
    }
    function ScrollToContact() {
      document.querySelector('#contact').scrollIntoView({ behavior: 'smooth' });
    }
    function ScrollToAbout() {
      document.querySelector('#about').scrollIntoView({ behavior: 'smooth' });
    }
  </script>
</html>
