<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>RSA Encryption/Decryption</title>
</head>

<body>
    <div class="flex flex-col p-10 items-center justify-center text-center border-black border-4 rounded-3xl mx-auto my-auto">
        <div class="flex items-center justify-center">
            <div class="text-4xl flex flex-col items-center justify-center text-center mb-8 font-bold border-black border-4 border-b-8 rounded-3xl p-10">
                <!--  Public & Private Key-->
                <div class="flex flex-row">
                    <p class="text-xl font-bold">Your Encrypted Text (Cipher):</p>
                    @if(isset($ciphertext))
                    <p class="text-xl font-bold">{{ implode(',', $ciphertext) }}</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- <div class="w-2/3">
            <!-- Decrypt -->
            <!-- <div class="border-4 border-b-8 border-black rounded-3xl max-h-fit">
                <div class="text-4xl flex items-center justify-center text-center mb-8 font-bold">
                    Decrypt
                </div>
                <form method="POST" action="/decrypt">
                    @csrf
                    <div class="form-group flex items-center justify-center">
                        <label for="private_key">Private Key:</label>
                        <input type="text" class="form-control mx-2 px-3 py-2  bg-white border-4 shadow-sm border-black placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block rounded-3xl sm:text-sm focus:ring-1" placeholder="Input Private Key" id="private_key" name="private_key" required>
                    </div>
                    <div class="form-group flex items-center justify-center">
                        <label for="ciphertext">Chipertext:</label>
                        <textarea class="form-control border-4 border-black rounded-3xl" id="ciphertext" name="ciphertext" rows="1" required></textarea>
                    </div>
                    <button type="submit" class="mb-6 form-control w-2/3 font-bold text-white mx-auto text-center border-4 border-black bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 py-2 px-8 rounded-2xl drop-shadow-[0_4px_0_rgba(0,0,0,1)]">Decrypt</button>
                </form>
            </div>
        </div> -->
</body>

</html>