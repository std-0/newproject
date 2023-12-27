@extends('layouts.app')

<title>contact</title>

@section('content')
    <div id="home" class="w3-content">

        <div id="contact" class="w3-container w3-center w3-padding-32">

            <h2 class="w3-wide">CONTACTE</h2>
            Moldova, Vom vedea<br>
            Phone: +373 060010101<br>
            Email: examnple@mail.com<br>
            <p class="w3-opacity w3-center"><i>Doriți să ne contactați? Scrieți!</i></p>

            <form action="/action_page.php" target="_blank">
                <input type="text" class="form-control" placeholder="Nume">
                <input type="text" class="form-control" placeholder="Prenume">
                <label for="comment">Mesaj:</label>
                <textarea class="form-control" rows="5" id="comment" name="text"></textarea> <br>
                <button class="w3-button w3-black" type="submit">Trimite</button>
            </form>
        </div>

    </div>
@endsection
