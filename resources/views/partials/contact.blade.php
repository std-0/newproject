@extends('layouts.app')

<title>Contact</title>

@section('content')

<h1 class="top">Contacte</h1>
<div class="container">
    <div class="content col-md-6">
  <form action="#">
    <label for="fname">Nume</label>
    <input type="text" id="fname" name="firstname" placeholder="Numele dumneavostră:">

    <label for="lname">Prenume</label>
    <input type="text" id="lname" name="lastname" placeholder="Prenumele dumneavostră:">

    <label for="country">Țara de origine</label>
    <select id="country" name="tara">
      <option value="md">Moldova</option>
      <option value="uk">Ucraina</option>
      <option value="ro">Romania</option>
    </select>

    <label for="subject">Comentariu</label>
    <textarea id="subject" name="subject" placeholder="Aici scrieți comentariul" style="height:200px"></textarea>

    <input type="submit" value="Trimite">
  </form>
  </div>
</div>
@endsection
