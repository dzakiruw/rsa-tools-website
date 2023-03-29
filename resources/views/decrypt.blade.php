<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>RSA Encryption/Decryption</title>
</head>

<body>
    <h1>RSA Decryption</h1>

    @if(isset($plaintext))
    <p>Plaintext: {{ $plaintext }}</p>
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


</body>

</html>