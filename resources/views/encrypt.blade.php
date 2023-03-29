<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>RSA Encryption/Decryption</title>
</head>

<body>
    <h1>RSA Encryption</h1>

    @if(isset($ciphertext))
    <p>Ciphertext: {{ implode(',', $ciphertext) }}</p>
    @endif

    <form method="POST" action="/decrypt">
        @csrf
        <div class="form-group">
            <label for="private_key">Private Key:</label>
            <input type="text" class="form-control" id="private_key" name="private_key" required>
        </div>
        <div class="form-group">
            <label for="ciphertext">Chipertext:</label>
            <textarea class="form-control" id="ciphertext" name="ciphertext" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Decrypt</button>
    </form>


</body>

</html>