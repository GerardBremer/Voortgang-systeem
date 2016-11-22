@extends('layouts.app')
<?php
$leereenheden = App\Leereenheid::all();
$opdrachten = App\Opdracht::all();
?>

<link rel="stylesheet" href="css/app.css" type="text/css" media="screen"/>  
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

@section('content')

    <!-- Menu -->
    <div class="nav-side-menu">
        <div class="brand"> Hier moet de balk </div>
        <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

        <div class="menu-list">

            <ul id="menu-content" class="menu-content collapse out">

                <li  data-toggle="collapse" data-target="#products" class="collapsed">
                    <a href="{{ url('/') }}"><i class="fa fa-dashboard fa-lg"></i> Dashboard </a>
                </li>
                <ul class="sub-menu collapse" id="products">
                    <li class="active"><a href="#">Test</a></li>
                    <li><a href="#">Test</a></li>
                </ul>

                <li data-toggle="collapse" data-target="#service" class="collapsed active">
                    <a href="{{ url('/leereenheden') }}"><i class="fa fa-book fa-lg"></i> Leereenheden </a>
                </li>
                <ul class="sub-menu collapse" id="service">
                    <li>Lopende leereenheden</li>
                    <li>Behaalde Leereenheden</li>

                </ul>

                <li data-toggle="collapse" data-target="#new" class="collapsed">
                    <a href="{{ url('/opdrachten') }}"><i class="fa fa-list-ul"></i> Opdrachten </a>
                </li>
                <ul class="sub-menu collapse" id="new">
                    <li>Privé</li>
                    <li>Groep</li>
                    <li>Extern</li>
                </ul>

                <li data-toggle="collapse" data-target="#products" class="collapsed">
                    <a href="{{ url('/feedback') }}"><i class="fa fa-comment fa-lg"></i> Feedback</a>
                </li>

            </ul>
        </div>
    </div>

<div class="container">


<!-- Kolom header met leereenheden toevoegen knop -->
<div class="panel panel-default col-md-12" style="padding-left: 15px; padding-right: 15px;">
  <div class="panel-body" style="float:left; padding: 15px;">Leereenheden</div>
  <a href="#" class="btn btn-default btn-primary" id="feedbackbtn" style="float: right; margin-top: 7px;">Toevoegen</a>
</div>

<!--Leereenheden Kolom  -->
<div class="panel panel-default col-md-4" style="margin-right: 1%;">
  <div class="panel-heading">Leereenheden
    <a class="tooltips" href="#">
      <i class="fa fa-question" style="float:right;">
      </i>
      <span>Klik op een leereenheid om de preview te zien.
      </span>
    </a>
  </div>
  <div class="panel-body">
    <?php
// Haal leereenheden uit de database in een array
foreach ($leereenheden as $leereenheid) {
  echo "<button class='col-md-12 well customdiv clickable' style='text-align: left;'>";
  echo "<a class='leer' onclick='showDiv()'>$leereenheid->naam </a><a href='/vs/resources/assets/$leereenheid->naam.pdf'><i style='float:right' class='fa fa-external-link'></i></a>";
  echo "</button>";
} ?>
  </div>
</div>

<!--Lopende Opdrachten Kolom -->
<div class="panel panel-default col-md-4" style="margin-right: 1%;">
  <div class="panel-heading">Gekoppelde Opdrachten</div>
    <div class="panel-body">
  <?php
foreach ($opdrachten as $opdracht) {
echo "<div class='col-md-12 well customdiv' >";
echo $opdracht->titel;
echo "</div>"; }
?>
</div>
</div>

  <!-- Popup Formulier -->
  <div id="uitnodigenmodal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <span class="close">x
        </span>
        <h2>Leereenheid toevoegen
        </h2>
      </div>
      <div class="modal-body">
        <form action="leereenheden/toevoegen" method="post">
          <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
          Leereenheid:  
          <select name="leereenheid_naam" class="form-control">
            <option value="MGIDEVBT1">MGIDEVBT1
            </option>
            <option value="MGIDEVBT2">MGIDEVBT2
            </option>
          </select>   
          <br>
          NLQF: 
          <select name="leereenheid_nlqf" class="form-control">
            <option value="Niveau 1">Niveau 1
            </option>
            <option value="Niveau 2">Niveau 2
            </option>
            <option value="Niveau 3">Niveau 3
            </option>
            <option value="Niveau 4">Niveau 4
            </option>
          </select>  
          <br>                    
          </div>
        <div class="modal-footer">
          <input class="button" type="Reset" id="annuleer" value = "Annuleren" style="float:left; text-align: center; cursor: pointer;" />
          <input class="button" type="Submit" value = "Opslaan" style="float: right;" />
          </form>
      </div>
    </div>
  </div>

<!-- PDF Preview Kolom -->
<div class="panel panel-default col-md-4" style="margin-right: 0%;">
  <div class="panel-heading">Preview</div>
  <div class="panel-body" style="padding: 1px;">
  <?php
// Haal leereenheden uit de database en
// zet deze in de PDF link.
foreach ($leereenheden as $leereenheid){
echo "<object id='welcomeDiv' style='display:none' width='100%' height='55%' data='/vs/resources/assets/$leereenheid->naam.pdf#page=1&zoom=55'></object>";
}?>
</div>
</div>

</div>
<script type="text/javascript" src="js/feedback.js"></script>


@endsection
