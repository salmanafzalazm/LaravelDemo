<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Email</title>
</head>
<body>
@if (session('status'))
    <p style="color: green">{{ session('status') }}</p>
@endif

<form method="POST" action="{{ route('sendMailPost') }}">
    @csrf
    <label for="email">Send email to:</label>
    <input type="email" name="email" id="email" value="{{ old('email') }}" required>
    @error('email')
        <p style="color: red">{{ $message }}</p>
    @enderror
    <button type="submit">Send</button>
</form>
</body>
</html>
