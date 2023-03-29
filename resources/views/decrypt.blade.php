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
                    <p class="text-xl font-bold">Your Decrypted Text:</p>
                    @if(isset($plaintext))
                    <p class="text-xl font-bold">{{ $plaintext }}</p>
                    @endif
                </div>
            </div>
        </div>
</body>

</html>