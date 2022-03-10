<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="theme-color" content="#000000" />
        <link rel="shortcut icon" href="./img/icons/icon.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="./img/icons/icon.png" />
        <link rel="stylesheet" href="./vendor/@fortawesome/fontawesome-free/css/all.min.css" />
        <link rel="stylesheet" href="./css/tailwindcss.css"/>
        <style>
            .input-group-btn button {
                background-color: Transparent !important;
                border-top: 1px solid #E3E3E3;
                padding: 4px 10px 10px 5px;
                border-bottom: 1px solid #E3E3E3;
                border-right: 1px solid #E3E3E3;
                border-top-right-radius: 30px !important;
                border-bottom-right-radius: 30px !important;
                border-left: 0px;
                height: 50px;
            }
            .input-group-btn button:hover {
                border-top: 1px solid #f96332;
                border-bottom: 1px solid #f96332;
                border-right: 1px solid #f96332;
            }
            .input-group-btn button img {
                width: 30px;
                height: 40px;
                min-width: 30px;
                min-height: 40px;
            }
            .input-group {
                height: 0px !important;
                border-right: 0px !important;
            }
            .input-group input {
                height: 50px !important;
                align-self: center;
                border-right: 0px !important;
                border-left: 1px solid #E3E3E3 !important;
                border-top: 1px solid #E3E3E3 !important;
                border-bottom: 1px solid #E3E3E3 !important;
                border-left: 1px solid #E3E3E3 !important;
                border-top-left-radius: 30px !important;
                border-bottom-left-radius: 30px !important;
                padding-left: 20px;
                margin-left: 0px !important;
                background-color: Transparent !important;
                outline: transparent;
                width: 90% !important;
                color: #fff;
                min-width: 90% !important;
                max-width: 90% !important;
            }
            .input-group input:focus {
                border-right: 0px !important;
                border-left: 1px solid #f96332 !important;
                border-top: 1px solid #f96332 !important;
                border-bottom: 1px solid #f96332 !important;
            }
        </style>
        <title>InfoDot</title>
    </head>
    <body class="text-gray-800 antialiased">
        <nav class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg">
            @if (Route::has('login'))
                <div class="container px-4 mx-auto flex flex-wrap items-center justify-between"> 
                    <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
                        @auth
                            <a href="{{ url('/home') }}" class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-no-wrap uppercase text-white">
                                Dashboard
                            </a>
                        @else
                  <button class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                    type="button"
                    onclick="toggleNavbar('example-collapse-navbar')"
                  >
                    <i class="text-white fas fa-bars"></i>
                  </button>
                </div>
                <div
                  class="lg:flex flex-grow items-center bg-white lg:bg-transparent lg:shadow-none hidden"
                  id="example-collapse-navbar"
                >
                  <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
                    <li class="flex items-center">
                      <a
                        class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                        href="https://web.facebook.com/infodotbusinesses"
                        target="_blank"
                        ><i
                          class="lg:text-gray-300 text-gray-500 fab fa-facebook text-lg leading-lg "
                        ></i
                        ><span class="lg:hidden inline-block ml-2">Share</span></a
                      >
                    </li>
                    <li class="flex items-center">
                      <a
                        class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                        href="https://twitter.com/InfoDot3"
                        target="_blank"
                        ><i
                          class="lg:text-gray-300 text-gray-500 fab fa-twitter text-lg leading-lg "
                        ></i
                        ><span class="lg:hidden inline-block ml-2">Tweet</span></a
                      >
                    </li>
                    <li class="flex items-center">
                      <a
                        class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                        href="https://www.instagram.com/infodot_businesses_official/"
                        target="_blank"
                        ><i
                          class="lg:text-gray-300 text-gray-500 fab fa-instagram text-lg leading-lg "
                        ></i
                        ><span class="lg:hidden inline-block ml-2">Follow</span></a
                      >
                    </li>
                    <li class="flex items-center">
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="bg-white text-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3" type="button" style="transition: all 0.15s ease 0s;">Sign in
                            </a>
                        @endif
                        @endauth
                    </li>
                    {{-- <li class="flex items-center">
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-white text-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3" type="button" style="transition: all 0.15s ease 0s;">Sign Up
                            </a>
                        @endif
                    </li> --}}
                  </ul>
                </div>
              </div>
            @endif
        </nav>
        <main>
      <div class="relative pt-16 pb-32 flex content-center items-center justify-center" style="max-height: 300px;">
        <div class="absolute top-0 w-full h-full bg-center bg-cover" style='background-image: url("./img/background.jpg");' >
          <span
            id="blackOverlay"
            class="w-full h-full absolute opacity-50 bg-black"
          ></span>
        </div>
        
        <div
          class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
          style="height: 70px; transform: translateZ(0px);"
        >
          <svg
            class="absolute bottom-0 overflow-hidden"
            xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="none"
            version="1.1"
            viewBox="0 0 2560 100"
            x="0"
            y="0"
          >
            <polygon
              class="text-gray-300 fill-current"
              points="2560 0 2560 100 0 100"
            ></polygon>
          </svg>
        </div>
      </div>
      <section class="relative block py-24 lg:pt-0 bg-gray-900">
        <div class="container mx-auto px-4 mt-32">
          <div class="flex flex-wrap justify-center lg:-mt-64 -mt-48">
            <div class="w-full lg:w-6/12 px-4">
              <h4 class="text-2xl font-semibold  text-gray-300 text-center mt-16">Want to work with us?</h4>
                  <p class="leading-relaxed mt-1 mb-4 text-gray-600 text-center">
                    Complete this form and we will get back to you in 24 hours.
                  </p>
              <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300 mt-16"
              >
                <div class="flex-auto p-5 lg:p-10">
                  <h4 class="text-2xl font-semibold text-grey-300">Contact Us</h4>
                  <div class="relative w-full mb-3 mt-8">
                    <label
                      class="block uppercase text-gray-700 text-xs font-bold mb-2"
                      for="full-name"
                      >Full Name</label
                    ><input
                      type="text"
                      class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full"
                      placeholder="Full Name"
                      style="transition: all 0.15s ease 0s;"
                    />
                  </div>
                  <div class="relative w-full mb-3">
                    <label
                      class="block uppercase text-gray-700 text-xs font-bold mb-2"
                      for="email"
                      >Email</label
                    ><input
                      type="email"
                      class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full"
                      placeholder="Email"
                      style="transition: all 0.15s ease 0s;"
                    />
                  </div>
                  <div class="relative w-full mb-3">
                    <label
                      class="block uppercase text-gray-700 text-xs font-bold mb-2"
                      for="message"
                      >Message</label
                    ><textarea
                      rows="4"
                      cols="80"
                      class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full"
                      placeholder="Type a message..."
                    ></textarea>
                  </div>
                  <div class="text-center mt-6">
                    <button
                      class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
                      type="button"
                      style="transition: all 0.15s ease 0s;"
                    >
                      Send Message
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <footer class="relative bg-gray-300 pt-8 pb-6">
      <div
        class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
        style="height: 80px; transform: translateZ(0px);"
      >
        <svg
          class="absolute bottom-0 overflow-hidden"
          xmlns="http://www.w3.org/2000/svg"
          preserveAspectRatio="none"
          version="1.1"
          viewBox="0 0 2560 100"
          x="0"
          y="0"
        >
          <polygon
            class="text-gray-300 fill-current"
            points="2560 0 2560 100 0 100"
          ></polygon>
        </svg>
      </div>
      <div class="container mx-auto px-4">
        <div class="flex flex-wrap">
          <div class="w-full lg:w-6/12 px-4">
            <h4 class="text-3xl font-semibold">Let's keep in touch!</h4>
            <h5 class="text-lg mt-0 mb-2 text-gray-700">
              Find us on any of these platforms, we respond 1-2 business days.
            </h5>
            <div class="mt-6">
              <a
                class="bg-white text-blue-600 shadow-lg font-normal p-3 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
                href="https://web.facebook.com/infodotbusinesses"
                target="_blank"
                type="button"
              >
                <i class="fab fa-facebook-square"></i>
              </a>

              <a
                class="bg-white text-pink-400 shadow-lg font-normal p-3 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
                href="https://www.instagram.com/infodot_businesses_official/"
                target="_blank"
                type="button"
              >
                <i class="fab fa-instagram"></i>
              </a>

              <a
                class="bg-white text-blue-400 shadow-lg font-normal p-3 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
                href="https://twitter.com/InfoDot3"
                target="_blank"
                type="button"
              >
                <i class="fab fa-twitter"></i>
              </a>

            </div>
          </div>
          <div class="w-full lg:w-6/12 px-4">
            <div class="flex flex-wrap items-top mb-6">
              <div class="w-full lg:w-4/12 px-4 ml-auto">
                <span
                  class="block uppercase text-gray-600 text-sm font-semibold mb-2"
                  >Useful Links</span
                >
                <ul class="list-unstyled">
                  <li>
                    <a
                      class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                      href="{{ url('/') }}"
                      >Home</a
                    >
                  </li>
                  <li>
                    <a
                      class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                      href="{{ url('/login') }}"
                      >Sign In</a
                    >
                  </li>
                  <li>
                    <a
                      class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                      href="{{ url('/register') }}"
                      >Create Account</a
                    >
                  </li>
                  <li>
                    <a
                      class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                      href="{{ url('/register') }}"
                      >BluePin Inc</a
                    >
                  </li>
                </ul>
              </div>
              <div class="w-full lg:w-4/12 px-4">
                <span
                  class="block uppercase text-gray-600 text-sm font-semibold mb-2"
                  >Other Resources</span
                >
                <ul class="list-unstyled">
                  <li>
                    <a
                      class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                      href="{{ url('/about') }}"
                      >About Us</a
                    >
                  </li>
                  <li>
                    <a
                      class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                      href="{{ url('/features') }}"
                      >Features</a
                    >
                  </li>
                  <li>
                    <a
                      class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                      href="{{ url('/contact') }}"
                      >Contact Us</a
                    >
                  </li>
                  <li>
                    <a
                      class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                      href="{{ url('/terms') }}"
                      >Terms &amp; Conditions</a
                    >
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <hr class="my-6 border-gray-400" />
        <div
          class="flex flex-wrap items-center md:justify-between justify-center"
        >
          <div class="w-full md:w-4/12 px-4 mx-auto text-center">
            <div class="text-sm text-gray-600 font-semibold py-1">
              Copyright © 2019 InfoDot
              <a
                href="https://www.creative-tim.com"
                class="text-gray-600 hover:text-gray-900"
                >All Rights Reserved.</a
              >.
            </div>
          </div>
        </div>
      </div>
    </footer>
  </body>
  <script>
    function toggleNavbar(collapseID) {
      document.getElementById(collapseID).classList.toggle("hidden");
      document.getElementById(collapseID).classList.toggle("block");
    }
  </script>
</html>
