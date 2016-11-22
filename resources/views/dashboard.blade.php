@extends('layouts.app')
<link rel="stylesheet" href="css/app.css" type="text/css" media="screen"/>  
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
@section('content')

    <!-- Menu -->
    <div class="nav-side-menu">
        <div class="brand"> Hier moet de balk </div>
        <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

        <div class="menu-list">

            <ul id="menu-content" class="menu-content collapse out">

                <li  data-toggle="collapse" data-target="#products" class="collapsed active">
                    <a href="{{ url('/') }}"><i class="fa fa-dashboard fa-lg"></i> Dashboard </a>
                </li>
                <ul class="sub-menu collapse" id="products">
                    <li class="active"><a href="#">Test</a></li>
                    <li><a href="#">Test</a></li>
                </ul>

                <li data-toggle="collapse" data-target="#service" class="collapsed">
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

        <!-- Pagina titel -->
        <div class="panel panel-default col-md-12" style="padding-left: 15px; padding-right: 15px;">
            <!-- Pagina titel -->
            <div class="panel-body" style="float:left; padding: 15px;">Dashboard </div>
        </div>

        <!-- Pagina titel -->
        <div class="panel panel-default col-md-9" style="padding-left: 15px; padding-right: 15px; width: 74%;">
            <!-- Pagina titel -->
            <div class="panel-body" style="float:left; padding: 15px;">Te Behalen Leereenheden </div>
            <?php
            // Haal opdrachten met status "lopend" op
            $lopendeleereenheden = DB::table('leereenheden')->where('status', '=', 'lopend')->get();
            foreach ($lopendeleereenheden as $leereenheid) {
                echo "<button class='col-md-12 well clickable customdiv opdracht' value='$leereenheid->id'>";
                echo $leereenheid->naam;
                /* Sluit div */
                echo "</button>"; }
            ?>
        </div>

        <!-- Pagina titel -->
        <div class="panel panel-default col-md-3" style="padding-left: 15px; padding-right: 15px; margin-right: 0%;">
            <!-- Pagina titel -->
            <div class="panel-body" style="float:left; padding: 15px;">Notificaties</div>
            <?php
            // Haal opdrachten met status "lopend" op
            $lopendeopdrachten = DB::table('opdrachten')->where('status', '=', 'lopend')->get();
            foreach ($lopendeopdrachten as $opdracht1) {
                echo "<button class='col-md-12 well clickable customdiv opdracht' value='$opdracht1->id'>";
                echo $opdracht1->type;
                /* Sluit div */
                echo "</button>"; }
            ?>
        </div>

        <!-- Pagina titel -->
        <div class="panel panel-default col-md-12" style="padding-left: 15px; padding-right: 15px; margin-right: 0%;">
            <!-- Pagina titel -->
            <div class="panel-body" style="float:left; padding: 15px;">Te Behalen Opdrachten</div>
            <?php
            // Haal opdrachten met status "lopend" op
            $lopendeopdrachten = DB::table('opdrachten')->where('status', '=', 'lopend')->get();
            foreach ($lopendeopdrachten as $opdracht1) {
                echo "<button class='col-md-12 well clickable customdiv opdracht' value='$opdracht1->id'>";
                echo $opdracht1->titel;
                /* Sluit div */
                echo "</button>"; }
            ?>
        </div>


        </div>

@endsection
