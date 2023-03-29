<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>RSA Encryption/Decryption</title>
</head>

<body>
    <h1>RSA Encryption/Decryption</h1>

    <form method="POST" action="/">
        @csrf
        <div class="form-group">
            <label for="p">P:</label>
            <input type="text" class="form-control" id="p" name="p" required>
        </div>
        <div class="form-group">
            <label for="q">Q:</label>
            <input type="text" class="form-control" id="q" name="q" required>
        </div>
        <button type="submit" class="btn btn-primary">Generate</button>
    </form>

    @if(isset($public_key))
    <p>Public Key: {{ ($public_key) }}</p>
    @endif

    @if(isset($private_key))
    <p>Private Key: {{ ($private_key) }}</p>
    @endif

    <form method="POST" action="/encrypt">
        @csrf
        <div class="form-group">
            <label for="public_key">Public Key:</label>
            <input type="text" class="form-control" id="public_key" name="public_key" required>
        </div>
        <div class="form-group">
            <label for="plaintext">Plaintext:</label>
            <textarea class="form-control" id="plaintext" name="plaintext" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Encrypt</button>
    </form>


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