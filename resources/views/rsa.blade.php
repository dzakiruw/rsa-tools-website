<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>RSA Encryption/Decryption</title>
</head>

<body>
    <main class="flex item-start justify-center flex-col">

        <!-- Navbar -->
        <nav class="relative container mx-auto p-6 font-rubik">
            <!-- Flex Container For All Items -->
            <div class="flex items-center justify-between">
                <!-- Flex Container For Logo/Menu -->
                <div class="flex items-center space-x-20">
                    <!-- Logo -->
                    <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_tijj0wnj.json" background="transparent" speed="1" style="width: 180px; height: 180px;" loop autoplay></lottie-player>
                    <!-- Navigation Menu -->
                    <div class="hidden space-x-12 font-bold lg:flex">
                        <a href="#tts" class="text-grayishViolet hover:text-gray-500 cursor-pointer">Tool</a>
                        <a href="#tts" class="text-grayishViolet hover:text-gray-500">Tech Stack</a>
                        <a href="#about" class="text-grayishViolet hover:text-gray-500">About Us</a>
                    </div>
                </div>
                <!-- Right Buttons Menu -->
                <div class="hidden items-center space-x-6 font-bold text-grayishViolet lg:flex">
                    <button class="px-8 py-3 font-bold text-white bg-blue-700 rounded-full hover:opacity-70 border-4 border-b-[10px] border-black">
                        Welcome
                    </button>
                </div>
            </div>
        </nav>

        <!-- Hero Container -->
        <div class="container flex flex-col-reverse mx-auto p- pb-0 lg:flex-row font-rubik">
            <!-- Content Container -->
            <div class="flex flex-col space-y-10 mb-44 lg:mt-16 lg:w-1/2 xl:mb-52">
                <div class="text-6xl font-bold text-center lg:text-8xl lg:text-left">
                    More than just a Encrypt-Decrypt Tool
                </div>
                <p class="text-2xl text-center text-gray-400 lg:max-w-md lg:text-left">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
                <div class="mx-auto lg:mx-0">
                    <a href="#tts" class="py-5 px-10 text-2xl font-bold text-white bg-blue-700 rounded-full lg:py-4 hover:opacity-70 border-4 border-b-[10px] border-black">Get Started</a>
                </div>
            </div>

            <!-- Animation Image -->
            <div class="mb-0 mx-auto pl-28 md:w-180 lg:mb-0 lg:w-1/2">
                <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_cgjrfdzx.json" background="transparent" speed="1" style="width: 600px; height: 600px;" loop autoplay></lottie-player>
            </div>
        </div>

        <!-- Wave Section -->
        <div class="#ffff">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#f3f4f5" fill-opacity="1" d="M0,32L60,48C120,64,240,96,360,106.7C480,117,600,107,720,128C840,149,960,203,1080,202.7C1200,203,1320,149,1380,122.7L1440,96L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
            </svg>
            <div class="bg-[#f3f4f5] w-full h-64"></div>
            <div class="bg-[#ffff]">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#f3f4f5" fill-opacity="1" d="M0,32L60,69.3C120,107,240,181,360,224C480,267,600,277,720,240C840,203,960,117,1080,85.3C1200,53,1320,75,1380,85.3L1440,96L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path>
                </svg>
            </div>
        </div>

        <!-- Encrypt-Decrypt Tool -->
        <div class="flex flex-row mr-6">
            <div class="flex flex-col p-10 items-start justify-center text-center">
                <div>
                    <div class="flex flex-col border-4 border-b-8 border-black rounded-3xl p-10 items-center justify-center text-center">
                        <div class="flex flex-col">
                            <div class="text-4xl flex items-center justify-center text-center mb-8 font-bold">
                                Insert 2 Different Prime Number
                            </div>
                        </div>

                        <form method="POST" action="/">
                            @csrf
                            <div class="flex flex-row">
                                <div class="form-group">
                                    <input type="text" id="p" name="p" value="" required="" class="form-control mx-2 px-3 py-2 bg-white border-4 shadow-sm border-black placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block rounded-3xl sm:text-sm focus:ring-1" placeholder="Input Prime Mumber">
                                </div>
                                <div class="form-group">
                                    <input type="text" id="q" name="q" value="" required class="form-control mx-2 px-3 py-2 bg-white border-4 shadow-sm border-black placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block rounded-3xl sm:text-sm focus:ring-1 place-content-center" placeholder="Input Prime Mumber">
                                </div>
                            </div>

                            <button type="submit" class="text-white font-bold form-control mx-auto text-center border-4 w-full border-black bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 mt-6 py-2 px-8 rounded-2xl drop-shadow-[0_4px_0_rgba(0,0,0,1)]">Generate
                                Key</button>
                        </form>

                        <div class="text-4xl flex flex-col items-center justify-center text-center my-6 font-bold border-black border-4 border-b-8 rounded-3xl p-10">
                            <!--  Public & Private Key-->
                            <div class="flex flex-row">
                                <p class="text-xl font-bold">Public Key: </p>
                                @if(!empty($public_key))
                                <p class="text-xl font-bold">{{ $public_key }} </p>
                                @endif
                            </div>
                            <div class="flex flex-row">
                                <p class="text-xl font-bold">Private Key: </p>
                                @if(!empty($private_key))
                                <p class="text-xl font-bold">{{ $private_key }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-center">
                        <lottie-player src="https://assets10.lottiefiles.com/private_files/lf30_tdnhii9y.json" background="transparent" speed="1" style="width: 400px; height: 400px;" loop autoplay></lottie-player>
                    </div>
                </div>
            </div>

            <div class="flex flex-col p-10 items-center justify-center text-center w-2/3 border-black border-4 rounded-3xl mx-10">



                <div class="w-2/3">
                    <!-- Encrypt -->
                    <div class="border-4 border-b-8 border-black rounded-3xl p-16 mb-8 max-h-fit ">
                        <div class="text-4xl flex items-center justify-center text-center mb-8 font-bold">
                            Encrypt
                        </div>
                        <form method="POST" action="/encrypt">
                            @csrf
                            <div class="form-group flex items-center justify-center mb-8">
                                <label for="public_key" class="font-bold text-lg">Public Key:</label>
                                <input type="text" class="w-full form-control mx-2 px-3 py-2 bg-white border-4 shadow-sm border-black placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block rounded-3xl sm:text-sm focus:ring-1" placeholder="Input Public Key" id="public_key" name="public_key" required>
                            </div>
                            <div class="form-group flex items-center justify-center mb-8">
                                <label for="plaintext" class="font-bold text-lg">Plaintext: </label>
                                <textarea class="w-full form-control border-4 border-black rounded-3xl" id="plaintext" name="plaintext" rows="2" required></textarea>
                            </div>
                            <button type="submit" class="form-control w-2/3 font-bold text-white text-center border-4 border-black bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 py-2 px-8 rounded-2xl drop-shadow-[0_4px_0_rgba(0,0,0,1)]">Encrypt</button>
                        </form>
                    </div>

                    <!-- Decrypt -->
                    <div class="border-4 border-b-8 border-black rounded-3xl max-h-fit p-16">
                        <div class="text-4xl flex items-center justify-center text-center mb-8 font-bold">
                            Decrypt
                        </div>
                        <form method="POST" action="/decrypt">
                            @csrf
                            <div class="form-group flex items-center justify-center">
                                <label for="private_key" class="font-bold text-lg">Private Key:</label>
                                <input type="text" class="w-full form-control mx-2 px-3 py-2  bg-white border-4 shadow-sm border-black placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block rounded-3xl sm:text-sm focus:ring-1" placeholder="Input Private Key" id="private_key" name="private_key" required>
                            </div>
                            <div class="form-group flex items-center justify-center mt-6">
                                <label for="ciphertext" class="font-bold text-lg">Chipertext:</label>
                                <textarea class="w-full form-control border-4 border-black rounded-3xl" id="ciphertext" name="ciphertext" rows="2" required></textarea>
                            </div>
                            <button type="submit" class="mt-8 form-control w-2/3 font-bold text-white mx-auto text-center border-4 border-black bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 py-2 px-8 rounded-2xl drop-shadow-[0_4px_0_rgba(0,0,0,1)]">Decrypt</button>
                        </form>
                    </div>
                </div>


            </div>
    </main>

    <img src="https://i.ibb.co/x1cgLst/group-ilustration.png" alt="group-ilustration" border="0">

    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</body>

</html>