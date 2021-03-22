<html>
<head> <title> test </title></head>
<body>
    <form method="POST" action="{{ route('coordonnes_patch')}}">
        @csrf
        <input type="text" name="adress">
        <button type="submit"> envoyer </button>
    </form>
</body>
<html>