<?php
  session_start();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="./output.css" rel="stylesheet" />
    <title>Title to be given from database</title>
  </head>

  <body class="bg-gray-900 text-amber-100">
    <!--Navbar Start-->
    <div class="px-20 py-6 flex justify-between items-center text-white">
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
        <a href="#" class="hover:text-orange-400">Our Services</a>
        <a href="#" class="hover:text-orange-400">About us</a>
        <a href="#" class="hover:text-orange-400">Contact us</a>
        <button
          class="bg-orange-400 hover:bg-orange-700 text-white px-4 py-2 rounded-lg"
        >
          Get Started
        </button>
      </nav>
    </div>

    <!--Navbar End-->
<?php
  require '../assets/scripts/dbconnection.php';
  $id = $_GET['id'];
  $sql = "SELECT * FROM Loan WHERE loan_id = $id";
  $result = $conn->query($sql);
  $loan_info = $result->fetch_assoc();
?>
    <div class="flex justify-normal gap-[5%]">
      <!--Left panel -->
      <div class="ml-[7%] max-w-[50%] ">
        <div class="flex flex-col justify-center">
          <div class="flex align-middle text-4xl font-bold">
            <?php echo $loan_info['description_title'] ?>
          </div>
        </div>
        <div
          class="max-h-[540px] max-w-[540px] mt-[2%] flex justify-items-start"
        >
          <img src="<?php echo $loan_info['loan_photo']?>" class="rounded-2xl" />
        </div>
        <div class="flex justify-items-start gap-2 p-2 mt-[1%]">
          <div>
            <img
              src="../assets/images/userdesc.png"
              class="max-h-[25px] max-w-[25px]"
            />
          </div>
          <div class="font-light">
            <?php
                 $user_id = $loan_info['loan_taker_user_id'];
                 $sql = " SELECT  * FROM UserInfo WHERE user_id = $user_id";
                 $result = $conn->query($sql);
                 $user_info = $result->fetch_assoc();
                 echo $user_info['name'];
            ?>
          </div>
        </div>

        <div class="mt-[1%]">
          <button
            class="bg-[#34c759] p-2 pr-3 pl-3 rounded-full flex justify-items-start align-middle gap-1"
          >
            <img
              src="../assets/images/tick.png"
              class="max-h-[18px] max-w-[15px] mt-0.5"
            />
            Varified Loan
          </button>
        </div>

        <div class="text-justify mt-[4%]">
          <?php echo $loan_info['description']; ?>
        </div>
      </div>
      <!--Right Panel -->
      <div class="ml-5">
        <div class="flex justify-center gap-5 ">
          <div class="flex flex-col justify-normal gap-y-5 mt-[25%]">
            <div
              class="flex justify-center text-justify text-2xl text-amber-200"
            >
              TK. <?php echo $loan_info['amount']; ?> Asked
            </div>
            <div class="flex justify-between gap-6">
              <div>Tk.<?php echo $loan_info['amount']; ?> Will be returned with</div>
              <div><?php echo $loan_info['interest']; ?>% interest</div>
            </div>
            <div>
              <div class="flex flex-col gap-4">
                <button class="bg-black pt-2 pb-2 rounded-full text-xl">
                  Negotitae
                </button>
                <button class="bg-black pt-2 pb-2 rounded-full text-xl">
                  Give Loan
                </button>
              </div>
            </div>
          </div>

        </div>

      </div>
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
</html>
