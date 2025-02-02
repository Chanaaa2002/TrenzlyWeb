@extends('layouts.frontend')

@section('pages')

<section class="relative w-full banner-section">
    <video autoplay muted loop playsinline class="w-full h-auto">
      <source src="{{ asset('images/banner.mp4') }}" type="video/mp4">
    </video>

    <div class="absolute inset-0 flex items-end justify-center bottom-20 banner-container">
      <div class="text-center banner-content">
        <a href="#" class="inline-block px-4 py-2 text-lg font-semibold tracking-wide text-black bg-white banner-btn w-80">CLICK TO SHOP THE NEW ITEMS</a>
      </div>
    </div>
  </section>










  <section id="brand" class="container">
    <div class="flex flex-wrap justify-center gap-4 py-5">
      <img class="w-1/2 h-auto sm:w-1/3 md:w-1/4 lg:w-1/6" src="{{ asset('images/brands/1.png') }}" alt="Brand 1">
      <img class="w-1/2 h-auto sm:w-1/3 md:w-1/4 lg:w-1/6" src="{{ asset('images/brands/2.png') }}" alt="Brand 2">
      <img class="w-1/2 h-auto sm:w-1/3 md:w-1/4 lg:w-1/6" src="{{ asset('images/brands/3.png') }}" alt="Brand 3">
      <img class="w-1/2 h-auto sm:w-1/3 md:w-1/4 lg:w-1/6" src="{{ asset('images/brands/4.png') }}" alt="Brand 4">
      <img class="w-1/2 h-auto sm:w-1/3 md:w-1/4 lg:w-1/6" src="{{ asset('images/brands/5.png') }}" alt="Brand 5">
      <!-- <img class="w-1/2 h-auto sm:w-1/3 md:w-1/4 lg:w-1/6" src="./img/brands/6.png" alt="Brand 6"> -->
    </div>
  </section>




  <section class="section__container collection__container">
    <img src="{{ asset('images/collec.jpeg') }}" alt="collection">
    <div class="collection__content">
      <h2 class="section__title">NEW COLLECTION</h2>
      <p>#35 ITEMS</p>
      <h4>AVAILABLE ON STORE</h4>
      <buttton class="btn">SHOP NOW</buttton>
    </div>
  </section>


  <section class="category-section">
    <div class="category-grid">
        
        <div class="category-item large-item">
            <img src="{{ asset('images/dress.jpg') }}" alt="Organic Raw">
            <div class="category-overlay">
                <h3>ELEGANT DRESSES</h3>
                <p>Handmade</p>
            </div>
        </div>
        
       
        <div class="category-item">
            <img src="{{ asset('images/formal.jpg') }}" alt="Category 2">
            <div class="category-overlay">
                <h3>FORMAL WEAR</h3>
                <p>Handmade</p>
            </div>
        </div>

        
        <div class="category-item">
            <img src="{{ asset('images/casual.jpg') }}" alt="Category 3">
            <div class="category-overlay">
                <h3>CASUAL WEAR</h3>
                <p>Handmade</p>
            </div>
        </div>

        
        <div class="category-item">
            <img src="{{ asset('images/bikini.jpg') }}" alt="Category 4">
            <div class="category-overlay">
                <h3>BIKINI WEAR</h3>
                <p>Handmade</p>
            </div>
        </div>

       
        <div class="category-item">
            <img src="{{ asset('images/beach.jpg') }}" alt="Category 5">
            <div class="category-overlay">
                <h3>BEACH WEAR</h3>
                <p>Handmade</p>
            </div>
        </div>
    </div>
</section>







  <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">

    <h2 class="mb-8 text-4xl font-semibold text-center underline-offset-8">ON SALE <span class="block w-10 h-1 mx-auto bg-black"></span></h2>

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
      <!-- First Item -->
      <div class="relative group">
        <img src="{{ asset('images/sale1.jpg') }}" alt="Man Outerwear" class="object-cover w-full h-auto transition-transform duration-500 transform group-hover:scale-105">
        <div class="absolute inset-0 flex flex-col items-center justify-center transition-opacity duration-500 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100">
          <p class="text-2xl font-semibold text-white">MEN'S WEAR</p>
          <p class="text-4xl font-bold text-white">Sale 40% off</p>
          <p class="text-xl text-white">DON'T MISS</p>
          <a href="#" class="px-4 py-2 mt-4 text-lg font-semibold tracking-wide text-black uppercase transition-colors duration-300 bg-white hover:bg-black hover:text-white">Shop Now</a>
        </div>
      </div>

      <!-- Second Item -->
      <div class="relative group">
        <img src="{{ asset('images/acces1.jpg') }}" alt="Woman T-Shirt" class="object-cover w-full h-auto transition-transform duration-500 transform group-hover:scale-105">
        <div class="absolute inset-0 flex flex-col items-center justify-center transition-opacity duration-500 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100">
          <p class="text-2xl font-semibold text-white">ACCESSORIES</p>
          <p class="text-4xl font-bold text-white">Sale 25% off</p>
          <p class="text-xl text-white">DON'T MISS</p>
          <a href="#" class="px-4 py-2 mt-4 text-lg font-semibold tracking-wide text-black uppercase transition-colors duration-300 bg-white hover:bg-black hover:text-white">Shop Now</a>
        </div>
      </div>

      <!-- Third Item -->
      <div class="relative group">
        <img src="{{ asset('images/hero-2.jpg') }}" alt="Jackets" class="object-cover w-full duration-500 transform h-95 tran3sition-transform group-hover:scale-105">
        <div class="absolute inset-0 flex flex-col items-center justify-center transition-opacity duration-500 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100">
          <p class="text-2xl font-semibold text-white">WOMEN'S WEAR</p>
          <p class="text-4xl font-bold text-white">Sale 20% off</p>
          <p class="text-xl text-white">DON'T MISS</p>
          <a href="#" class="px-4 py-2 mt-4 text-lg font-semibold tracking-wide text-black uppercase transition-colors duration-300 bg-white hover:bg-black hover:text-white">Shop Now</a>
        </div>
      </div>
    </div>
  </div>

  <br>
  <br>
  <br>
  <br>




 

<!-- classic collection -->

  <h2 class="mb-8 text-4xl font-semibold text-center underline-offset-8">CLASSIC COLLECTION <span class="block w-20 h-1 mx-auto bg-black"></span></h2>

  <div class="grid grid-cols-1 gap-6 p-4 md:grid-cols-2 lg:grid-cols-4">



    <div class="relative w-full overflow-hidden bg-white rounded-lg shadow-lg group">
      <div class="relative ">
        <img src="{{ asset('images/cards/t2.jpg') }}" alt="Clothing Item 1" class="object-cover w-full h-auto transition duration-300 ease-in-out border-solid group-hover:opacity-0">
        <img src="{{ asset('images/cards/t3.jpeg') }}" alt="Clothing Item 1 Back" class="absolute inset-0 object-cover w-full h-auto transition duration-300 ease-in-out border-solid opacity-0 group-hover:opacity-100">
      </div>
      <div class="p-2">
        <h3 class="text-xl font-semibold text-gray-800">Classic Tee</h3>
        <p class="text-lg text-gray-500">LKR 2,750.00</p>
        <!-- <p class="text-sm text-gray-500">Color: Jet Black</p> -->

        <div class="flex items-center justify-between space-x-2 justify-between-2">
          <div class="flex mt-2 space-x-2">
            <div class="relative object-cover w-8 h-8 bg-green-500 border border-gray-300 rounded-full hover:bg-green-900 group">

              <span class="absolute px-2 py-1 text-xs text-white transform -translate-x-1/2 bg-black rounded opacity-0 bottom-6 left-1/2 hover:opacity-80">
                Green
              </span>
            </div>

            <div class="relative object-cover w-8 h-8 bg-blue-500 border border-gray-300 rounded-full hover:bg-blue-700 group">
              <span class="absolute px-2 py-1 text-xs text-white transform -translate-x-1/2 bg-black rounded opacity-0 bottom-6 left-1/2 hover:opacity-80">
                Blue
              </span>
            </div>

            <div class="relative object-cover w-8 h-8 bg-black border border-gray-300 rounded-full hover:bg-black group">
              <span class="absolute px-2 py-1 text-xs text-white transform -translate-x-1/2 bg-black rounded opacity-0 bottom-6 left-1/2 hover:opacity-80">
                Black
              </span>
            </div>

            <button class="flex items-center justify-center w-8 h-8 bg-gray-100 border border-gray-300 rounded-full">
              <span class="text-xs text-gray-600">+5</span>
            </button>
          </div>


          <div class="relative flex items-center justify-center object-cover w-10 h-10 bg-gray-100 border border-gray-300 rounded-full group">
            <a href="#"><i class='text-3xl bx bxs-shopping-bag'></i></a>
          </div>


        </div>




      </div>

    </div>


    <div class="relative w-full overflow-hidden bg-white rounded-lg shadow-lg group">
      <div class="relative ">
        <img src="{{ asset('images/cards/t5.jpg') }}" alt="Clothing Item 1" class="object-cover w-full h-auto transition duration-300 ease-in-out border-solid group-hover:opacity-0">
        <img src="{{ asset('images/cards/t4.jpg') }}" alt="Clothing Item 1 Back" class="absolute inset-0 object-cover w-full h-auto transition duration-300 ease-in-out border-solid opacity-0 group-hover:opacity-100">
      </div>
      <div class="p-2">
        <h3 class="text-xl font-semibold text-gray-800">Classic Hoodie</h3>
        <p class="text-lg text-gray-500">LKR 4,750.00</p>
        <!-- <p class="text-sm text-gray-500">Color: Jet Black</p> -->

        <div class="flex items-center justify-between space-x-2 justify-between-2 ">
          <div class="flex mt-2 space-x-2">
              <div class="relative object-cover w-8 h-8 bg-green-500 border border-gray-300 rounded-full hover:bg-green-900 group">

                <span class="absolute px-2 py-1 text-xs text-white transform -translate-x-1/2 bg-black rounded opacity-0 bottom-6 left-1/2 hover:opacity-80">
                  Green
                </span>
              </div>

              <div class="relative object-cover w-8 h-8 bg-blue-500 border border-gray-300 rounded-full hover:bg-blue-700 group">
                <span class="absolute px-2 py-1 text-xs text-white transform -translate-x-1/2 bg-black rounded opacity-0 bottom-6 left-1/2 hover:opacity-80">
                  Blue
                </span>
              </div>

              <div class="relative object-cover w-8 h-8 bg-black border border-gray-300 rounded-full hover:bg-black group">
                <span class="absolute px-2 py-1 text-xs text-white transform -translate-x-1/2 bg-black rounded opacity-0 bottom-6 left-1/2 hover:opacity-80">
                  Black
                </span>
              </div>

              <button class="flex items-center justify-center w-8 h-8 bg-gray-100 border border-gray-300 rounded-full">
                <span class="text-xs text-gray-600">+5</span>
              </button>
          </div>
          <div class="relative flex items-center justify-center object-cover w-10 h-10 bg-gray-100 border border-gray-300 rounded-full group">
            <a href="#"><i class='text-3xl bx bxs-shopping-bag'></i></a>
          </div>


        </div>




      </div>

    </div>

    <div class="relative w-full overflow-hidden bg-white rounded-lg shadow-lg group">
      <div class="relative ">
        <img src="{{ asset('images/cards/t7.jpg') }}" alt="Clothing Item 1" class="object-cover w-full h-auto transition duration-300 ease-in-out border-solid group-hover:opacity-0">
        <img src="{{ asset('images/cards/t6.jpg') }}" alt="Clothing Item 1 Back" class="absolute inset-0 object-cover w-full h-auto transition duration-300 ease-in-out border-solid opacity-0 group-hover:opacity-100">
      </div>
      <div class="p-2">
        <h3 class="text-xl font-semibold text-gray-800">Classic Active Tee</h3>
        <p class="text-lg text-gray-500">LKR 2,850.00</p>
        <!-- <p class="text-sm text-gray-500">Color: Jet Black</p> -->

        <div class="flex items-center justify-between space-x-2 justify-between-2">
          <div class="flex mt-2 space-x-2">
            <div class="relative object-cover w-8 h-8 bg-green-500 border border-gray-300 rounded-full hover:bg-green-900 group">

              <span class="absolute px-2 py-1 text-xs text-white transform -translate-x-1/2 bg-black rounded opacity-0 bottom-6 left-1/2 hover:opacity-80">
                Green
              </span>
            </div>

            <div class="relative object-cover w-8 h-8 bg-blue-500 border border-gray-300 rounded-full hover:bg-blue-700 group">
              <span class="absolute px-2 py-1 text-xs text-white transform -translate-x-1/2 bg-black rounded opacity-0 bottom-6 left-1/2 hover:opacity-80">
                Blue
              </span>
            </div>

            <div class="relative object-cover w-8 h-8 bg-black border border-gray-300 rounded-full hover:bg-black group">
              <span class="absolute px-2 py-1 text-xs text-white transform -translate-x-1/2 bg-black rounded opacity-0 bottom-6 left-1/2 hover:opacity-80">
                Black
              </span>
            </div>

            <button class="flex items-center justify-center w-8 h-8 bg-gray-100 border border-gray-300 rounded-full">
              <span class="text-xs text-gray-600">+5</span>
            </button>
          </div>


          <div class="relative flex items-center justify-center object-cover w-10 h-10 bg-gray-100 border border-gray-300 rounded-full group">
            <a href="#"><i class='text-3xl bx bxs-shopping-bag'></i></a>
          </div>


        </div>




      </div>

    </div>



    <div class="relative w-full overflow-hidden bg-white rounded-lg shadow-lg group">
      <div class="relative ">
        <img src="{{ asset('images/cards/t8.jpg') }}" alt="Clothing Item 1" class="object-cover w-full h-auto transition duration-300 ease-in-out border-solid group-hover:opacity-0">
        <img src="{{ asset('images/cards/t9.jpg') }}" alt="Clothing Item 1 Back" class="absolute inset-0 object-cover w-full h-auto transition duration-300 ease-in-out border-solid opacity-0 group-hover:opacity-100">
      </div>
      <div class="p-2">
        <h3 class="text-xl font-semibold text-gray-800">Classic Active Long Sleeve Tee</h3>
        <p class="text-lg text-gray-500">LKR 4,850.00</p>
        <!-- <p class="text-sm text-gray-500">Color: Jet Black</p> -->

        <div class="flex items-center justify-between space-x-2 justify-between-2">
          <div class="flex mt-2 space-x-2">
            <div class="relative object-cover w-8 h-8 bg-green-500 border border-gray-300 rounded-full hover:bg-green-900 group">

              <span class="absolute px-2 py-1 text-xs text-white transform -translate-x-1/2 bg-black rounded opacity-0 bottom-6 left-1/2 hover:opacity-80">
                Green
              </span>
            </div>

            <div class="relative object-cover w-8 h-8 bg-blue-500 border border-gray-300 rounded-full hover:bg-blue-700 group">
              <span class="absolute px-2 py-1 text-xs text-white transform -translate-x-1/2 bg-black rounded opacity-0 bottom-6 left-1/2 hover:opacity-80">
                Blue
              </span>
            </div>

            <div class="relative object-cover w-8 h-8 bg-black border border-gray-300 rounded-full hover:bg-black group">
              <span class="absolute px-2 py-1 text-xs text-white transform -translate-x-1/2 bg-black rounded opacity-0 bottom-6 left-1/2 hover:opacity-80">
                Black
              </span>
            </div>

            <button class="flex items-center justify-center w-8 h-8 bg-gray-100 border border-gray-300 rounded-full">
              <span class="text-xs text-gray-600">+5</span>
            </button>
          </div>


          <div class="relative flex items-center justify-center object-cover w-10 h-10 bg-gray-100 border border-gray-300 rounded-full group">
            <a href="#"><i class='text-3xl bx bxs-shopping-bag'></i></a>
          </div>


        </div>




      </div>

    </div>

  </div>

    <br>
    <br>
    <br>

















    <h2 class="mb-8 text-4xl font-semibold text-center underline-offset-8">DRESSES COLLECTION <span class="block w-20 h-1 mx-auto bg-black"></span></h2>

<div class="grid grid-cols-1 gap-6 p-4 md:grid-cols-2 lg:grid-cols-4">



  <div class="relative w-full overflow-hidden bg-white rounded-lg shadow-lg group">
    <div class="relative ">
      <img src="{{ asset('images/cards/t10.jpg') }}" alt="Clothing Item 1" class="object-cover w-full h-auto transition duration-300 ease-in-out border-solid group-hover:opacity-0">
      <img src="{{ asset('images/cards/t11.jpg') }}" alt="Clothing Item 1 Back" class="absolute inset-0 object-cover w-full h-auto transition duration-300 ease-in-out border-solid opacity-0 group-hover:opacity-100">
    </div>
    <div class="p-2">
      <h3 class="text-xl font-semibold text-gray-800">Bustier Corset Midi Dress</h3>
      <p class="text-lg text-gray-500">LKR 8,750.00</p>
      <!-- <p class="text-sm text-gray-500">Color: Jet Black</p> -->

      <div class="flex items-center justify-between space-x-2 justify-between-2">
        <div class="flex mt-2 space-x-2">
          <div class="relative object-cover w-8 h-8 bg-green-500 border border-gray-300 rounded-full hover:bg-green-900 group">

            <span class="absolute px-2 py-1 text-xs text-white transform -translate-x-1/2 bg-black rounded opacity-0 bottom-6 left-1/2 hover:opacity-80">
              Green
            </span>
          </div>

          <div class="relative object-cover w-8 h-8 bg-blue-500 border border-gray-300 rounded-full hover:bg-blue-700 group">
            <span class="absolute px-2 py-1 text-xs text-white transform -translate-x-1/2 bg-black rounded opacity-0 bottom-6 left-1/2 hover:opacity-80">
              Blue
            </span>
          </div>

          <div class="relative object-cover w-8 h-8 bg-black border border-gray-300 rounded-full hover:bg-black group">
            <span class="absolute px-2 py-1 text-xs text-white transform -translate-x-1/2 bg-black rounded opacity-0 bottom-6 left-1/2 hover:opacity-80">
              Black
            </span>
          </div>

          <button class="flex items-center justify-center w-8 h-8 bg-gray-100 border border-gray-300 rounded-full">
            <span class="text-xs text-gray-600">+5</span>
          </button>
        </div>


        <div class="relative flex items-center justify-center object-cover w-10 h-10 bg-gray-100 border border-gray-300 rounded-full group">
          <a href="#"><i class='text-3xl bx bxs-shopping-bag'></i></a>
        </div>


      </div>




    </div>

  </div>


  <div class="relative w-full overflow-hidden bg-white rounded-lg shadow-lg group">
    <div class="relative ">
      <img src="{{ asset('images/cards/t12.jpg') }}" alt="Clothing Item 1" class="object-cover w-full h-auto transition duration-300 ease-in-out border-solid group-hover:opacity-0">
      <img src="{{ asset('images/cards/t13.jpg') }}" alt="Clothing Item 1 Back" class="absolute inset-0 object-cover w-full h-auto transition duration-300 ease-in-out border-solid opacity-0 group-hover:opacity-100">
    </div>
    <div class="p-2">
      <h3 class="text-xl font-semibold text-gray-800">Halter Mini Dress</h3>
      <p class="text-lg text-gray-500">LKR 5,750.00</p>
      <!-- <p class="text-sm text-gray-500">Color: Jet Black</p> -->

      <div class="flex items-center justify-between space-x-2 justify-between-2 ">
        <div class="flex mt-2 space-x-2">
            <div class="relative object-cover w-8 h-8 bg-green-500 border border-gray-300 rounded-full hover:bg-green-900 group">

              <span class="absolute px-2 py-1 text-xs text-white transform -translate-x-1/2 bg-black rounded opacity-0 bottom-6 left-1/2 hover:opacity-80">
                Green
              </span>
            </div>

            <div class="relative object-cover w-8 h-8 bg-blue-500 border border-gray-300 rounded-full hover:bg-blue-700 group">
              <span class="absolute px-2 py-1 text-xs text-white transform -translate-x-1/2 bg-black rounded opacity-0 bottom-6 left-1/2 hover:opacity-80">
                Blue
              </span>
            </div>

            <div class="relative object-cover w-8 h-8 bg-black border border-gray-300 rounded-full hover:bg-black group">
              <span class="absolute px-2 py-1 text-xs text-white transform -translate-x-1/2 bg-black rounded opacity-0 bottom-6 left-1/2 hover:opacity-80">
                Black
              </span>
            </div>

            <button class="flex items-center justify-center w-8 h-8 bg-gray-100 border border-gray-300 rounded-full">
              <span class="text-xs text-gray-600">+5</span>
            </button>
        </div>
        <div class="relative flex items-center justify-center object-cover w-10 h-10 bg-gray-100 border border-gray-300 rounded-full group">
          <a href="#"><i class='text-3xl bx bxs-shopping-bag'></i></a>
        </div>


      </div>




    </div>

  </div>

  <div class="relative w-full overflow-hidden bg-white rounded-lg shadow-lg group">
    <div class="relative ">
      <img src="{{ asset('images/cards/t14.jpg') }}" alt="Clothing Item 1" class="object-cover w-full h-auto transition duration-300 ease-in-out border-solid group-hover:opacity-0">
      <img src="{{ asset('images/cards/t15.jpg') }}" alt="Clothing Item 1 Back" class="absolute inset-0 object-cover w-full h-auto transition duration-300 ease-in-out border-solid opacity-0 group-hover:opacity-100">
    </div>
    <div class="p-2">
      <h3 class="text-xl font-semibold text-gray-800">Bustier Midi Dress</h3>
      <p class="text-lg text-gray-500">LKR 7,450.00</p>
      <!-- <p class="text-sm text-gray-500">Color: Jet Black</p> -->

      <div class="flex items-center justify-between space-x-2 justify-between-2">
        <div class="flex mt-2 space-x-2">
          <div class="relative object-cover w-8 h-8 bg-green-500 border border-gray-300 rounded-full hover:bg-green-900 group">

            <span class="absolute px-2 py-1 text-xs text-white transform -translate-x-1/2 bg-black rounded opacity-0 bottom-6 left-1/2 hover:opacity-80">
              Green
            </span>
          </div>

          <div class="relative object-cover w-8 h-8 bg-blue-500 border border-gray-300 rounded-full hover:bg-blue-700 group">
            <span class="absolute px-2 py-1 text-xs text-white transform -translate-x-1/2 bg-black rounded opacity-0 bottom-6 left-1/2 hover:opacity-80">
              Blue
            </span>
          </div>

          <div class="relative object-cover w-8 h-8 bg-black border border-gray-300 rounded-full hover:bg-black group">
            <span class="absolute px-2 py-1 text-xs text-white transform -translate-x-1/2 bg-black rounded opacity-0 bottom-6 left-1/2 hover:opacity-80">
              Black
            </span>
          </div>

          <button class="flex items-center justify-center w-8 h-8 bg-gray-100 border border-gray-300 rounded-full">
            <span class="text-xs text-gray-600">+5</span>
          </button>
        </div>


        <div class="relative flex items-center justify-center object-cover w-10 h-10 bg-gray-100 border border-gray-300 rounded-full group">
          <a href="#"><i class='text-3xl bx bxs-shopping-bag'></i></a>
        </div>


      </div>




    </div>

  </div>



  <div class="relative w-full overflow-hidden bg-white rounded-lg shadow-lg group">
    <div class="relative ">
      <img src="{{ asset('images/cards/t16.jpg') }}" alt="Clothing Item 1" class="object-cover w-full h-auto transition duration-300 ease-in-out border-solid group-hover:opacity-0">
      <img src="{{ asset('images/cards/t17.jpg') }}" alt="Clothing Item 1 Back" class="absolute inset-0 object-cover w-full h-auto transition duration-300 ease-in-out border-solid opacity-0 group-hover:opacity-100">
    </div>
    <div class="p-2">
      <h3 class="text-xl font-semibold text-gray-800">Twisted Maxi Dress</h3>
      <p class="text-lg text-gray-500">LKR 6,850.00</p>
      <!-- <p class="text-sm text-gray-500">Color: Jet Black</p> -->

      <div class="flex items-center justify-between space-x-2 justify-between-2">
        <div class="flex mt-2 space-x-2">
          <div class="relative object-cover w-8 h-8 bg-green-500 border border-gray-300 rounded-full hover:bg-green-900 group">

            <span class="absolute px-2 py-1 text-xs text-white transform -translate-x-1/2 bg-black rounded opacity-0 bottom-6 left-1/2 hover:opacity-80">
              Green
            </span>
          </div>

          <div class="relative object-cover w-8 h-8 bg-blue-500 border border-gray-300 rounded-full hover:bg-blue-700 group">
            <span class="absolute px-2 py-1 text-xs text-white transform -translate-x-1/2 bg-black rounded opacity-0 bottom-6 left-1/2 hover:opacity-80">
              Blue
            </span>
          </div>

          <div class="relative object-cover w-8 h-8 bg-black border border-gray-300 rounded-full hover:bg-black group">
            <span class="absolute px-2 py-1 text-xs text-white transform -translate-x-1/2 bg-black rounded opacity-0 bottom-6 left-1/2 hover:opacity-80">
              Black
            </span>
          </div>

          <button class="flex items-center justify-center w-8 h-8 bg-gray-100 border border-gray-300 rounded-full">
            <span class="text-xs text-gray-600">+5</span>
          </button>
        </div>


        <div class="relative flex items-center justify-center object-cover w-10 h-10 bg-gray-100 border border-gray-300 rounded-full group">
          <a href="#"><i class='text-3xl bx bxs-shopping-bag'></i></a>
        </div>


      </div>




    </div>

  </div>

</div>

<br>
<br>
<br>


    <div class="flex justify-center">
      
      
        <img src="{{ asset('images/ban.jpg') }}" alt="banner" class="h-auto w-50" >

    </div>



    <br>
    <br>
    <br>




    



<section class="flex items-center justify-center w-full h-64 bg-gray-100">
  <div class="flex items-center justify-between w-full max-w-6xl px-4 mx-auto">
    
    <div class="flex items-center space-x-2">
      <span class="inline-block w-6 h-8 bg-black"></span>
      <span class="inline-block w-20 h-8 bg-black"></span>
    </div>

    
    <div class="text-center">
      <h2 class="text-2xl font-extrabold text-gray-900 sm:text-3xl">OUR NEWEST PRODUCTS STRAIGHT TO YOUR INBOX.</h2>
      <p class="mt-3 text-base text-gray-600 sm:text-lg">Be the first to know about our products, limited-time offers, community events, and more.</p>
      <div class="flex justify-center mt-8">
        <input type="email" placeholder="Enter your email address" class="px-8 py-4 border border-gray-300 rounded-l-full focus:outline-none">
        <button class="px-4 py-2 font-medium text-white bg-black rounded-r-full">SIGN UP</button>
      </div>
    </div>
    
    <div class="flex items-center space-x-2 transform rotate-180">
      <span class="inline-block w-6 h-8 bg-black"></span>
      <span class="inline-block w-20 h-8 bg-black"></span>
    </div>
  </div>
</section> 


@endsection