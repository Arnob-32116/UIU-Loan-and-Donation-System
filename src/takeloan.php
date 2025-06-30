<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="./output.css" rel="stylesheet" />
    <title>Take Loan</title>
  </head>
  <body class="bg-gray-900 text-amber-100">
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
    <!--Navbar Ended-->

    <div id="container">
      <div id="heading-text" class="flex justify-start ml-[5rem]">
        <div class="flex flex-col">
          <div class="text-5xl pt-[1.75rem] pb-[0.5rem] text text-orange-400">
            Your Financial Boost Starts Here
          </div>
          <div class="text-3xl pb-[1.5rem] text text-blue-300">
            Fill Up Your Loan Application In 5 Minutes And See The Magic
          </div>
        </div>
      </div>
      <form  enctype="multipart/form-data"  action="../assets/scripts/upload_image.php" method="post">
      <div id="form-space" class="ml-[5rem] mr-[5rem] w-[70%]">
        <div id="title-space flex flex-col">
          <div class="mb-1">
            <label
              for="default-input"
              class="block mb-2 text-2xl font-medium text-gray-900 dark:text-white"
              >Title</label
            >
            <div class="">
              <input
                type="text"
                id="title-input"
                name="title"
                placeholder="Enter your title here"
                oninput="characterRemaining('title-input' , 'title-char-rem')"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              />
              <label
                class="flex mt-[1rem] justify-end text-lg"
                id="title-char-rem"
                >35 characters remaining</label
              >
            </div>
          </div>
        </div>
        <div id="description space">
          <label
            for="message"
            class="block mb-2 text-2xl font-medium text-gray-900 dark:text-white"
            >Your Description</label
          >
          <textarea
            id="description"
            rows="4"
            name = "description"
            class="block p-2.5 w-full text-xl text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Write your description here..."
          ></textarea>
        </div>
         <label for="number-input" class="block mb-2 text-2xl font-large text-gray-900 dark:text-white">Loan Amount :</label>
    <input type="number" id="amount" name = "amount" aria-describedby="helper-text-explanation" class="bg-gray-50 mb-4 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Amount in taka" required />


    <label for="number-input" class="block mb-2 text-2xl font-large text-gray-900 dark:text-white">Maximum Interest Rate Offered :</label>
    <input type="number" id="interest" name="interest" aria-describedby="helper-text-explanation" class="bg-gray-50 mb-4 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Insert interest percent" required />

        <div id="button-space" class="flex justify-start gap-155">
          <div class="flex flex-col gap-y-1.5 mt-[1rem]">


            <div id="add-image-button">
              <button
                type="button"
                class="text-white bg-gray-800 w-[13.9rem] hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-xl px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700"
              >
                <div class="flex justify-center items-center gap-1">
                  <img src="../assets/images/image_icon.png" class="h-8 w-8" />
                  <input type="file"  name = "file" accept="image/*" style = " opacity:0; position:absolute ">
                  <div>Add Images</div>
                </div>
              </button>
            </div>
            <div id="add-catagory-button">
              <button
                type="button"
                class="w-[14rem] text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-xl px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700"
                onclick="popup()"
              >
                <div class="flex justify-center items-center gap-1">
                  <img
                    src="../assets/images/category_icon.png"
                    class="h-8 w-8"
                  />
                  <div class="">Add Catergory</div>
                </div>

              </button>
            </div>

            <div id="selected-tag" name="selected-tag" class="mt-4 text-xl text-amber-400 font-semibold">
                No tag selected
            </div>
              <input type="hidden" name="tag" id="selectedTagInput" value="">


          </div>
          <div class="flex flex-col justify-center">
            <button
              type="submit"
              class="text-white w-[12rem] bg-green-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-xl px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700"
            >
               <div class="flex justify-center text-2xl items-center gap-1">
                  <img
                    src="../assets/images/submit_icon.png"
                    class="h-8 w-8"
                  />
                  <div class="">Submit</div>
               </div>
            </button>
          </div>
        </div>
      </div>
    </div>
    </form>

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
    function characterRemaining(id, id1) {
      let inputField = document.getElementById(id);
      let inputText = inputField.value;
      let rem = 35 - inputText.length;
      let label = document.getElementById(id1);
      if (rem < 0) {
        inputField.value = inputText.slice(0, 35);
      }
      if (rem < 0) {
        rem = 0;
      }
      label.textContent = rem + ' characters remaining';
    }

    function popup(){
        window.open('catpoploan.html', '', 'width=240,height=300,left=400,top=800');
    }

    function receiveTag(tag) {

      document.getElementById('selected-tag').innerText = `Selected Tag: ${tag}`;
       document.getElementById('selectedTagInput').value = tag;
    }

  </script>
</html>
