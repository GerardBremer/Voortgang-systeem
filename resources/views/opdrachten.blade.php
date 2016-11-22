@extends('layouts.app')
<link rel="stylesheet" href="css/app.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="css/opdrachten.css" type="text/css" media="screen"/>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<script src="http://code.jquery.com/jquery-1.10.1.js"></script>
@section('content')

    <!-- Opdracht and Leereenheid models containing tables with opdracht information and leereenheden-->
    <?php
    use App\Opdracht;
    use App\Leereenheid;

    $opdrachten = App\Opdracht::all();
    $leereenheden= App\Leereenheid::all();
    ?>

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

                <li data-toggle="collapse" data-target="#service" class="collapsed">
                    <a href="{{ url('/leereenheden') }}"><i class="fa fa-book fa-lg"></i> Leereenheden </a>
                </li>
                <ul class="sub-menu collapse" id="service">
                    <li>Lopende leereenheden</li>
                    <li>Behaalde Leereenheden</li>

                </ul>

                <li data-toggle="collapse" data-target="#new" class="collapsed active">
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
            <div class="panel-body" style="float:left; padding: 15px;">Opdrachten </div>
            <!-- Opdracht toevoegen knop -->
            <a href="#" class="btn btn-primary" id="myBtn" style="float: right; margin-top: 8px;">Opdracht Toevoegen <span class="glyphicon glyphicon-plus"></span> </a>
        </div>

        <!-- Lopende Opdrachten -->
        <div class="panel panel-default col-md-4">
            <div class="panel-heading" id="lopendeopdrachten">Lopende Opdrachten <i class="fa fa-chevron-up chevronuprotate" aria-hidden="true"></i> </div>
            <div class="panel-body lopendeopdrachtendiv">
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

            <!-- Afgeronde Opdrachten -->
            <hr style="margin:0px;">
            <div class="panel-heading" id="afgerondeopdrachten">Afgeronde Opdrachten <i class="fa fa-chevron-down chevrondownrotate" aria-hidden="true"></i> </div>
            <div class="panel-body afgerondeopdrachtendiv">
                <?php
                // Haal opdrachten met status "afgerond" op
                $opdrachtafgerond = DB::table('opdrachten')->where('status', '=', 'afgerond')->get();

                foreach ($opdrachtafgerond as $opdracht2) {
                    echo "<button class='col-md-12 well clickable customdiv opdracht' value='$opdracht2->id'>";
                    echo ($opdracht2->titel);
                    echo "</button>";
                }
                ?>
            </div>
        </div>

        <!--Leereenheden -->
        <div class="panel panel-default col-md-4">
            <div class="panel-heading">Gekoppelde Leereenheden</div>
            <div class="panel-body leereenhedendiv">

                    <!-- Div waar ajax data van getopdracht.php in word gezet -->
                    <div id="gekoppeldeleereenheden"><b>Selecteer een opdracht om gekoppelde leerenheden te zien..</b></div>

            </div>
        </div>

        <!-- Geselecteerde Opdracht -->
        <div class="panel panel-default col-md-4" style="margin-right: 0%;">
            <div class="panel-heading">
                Opdracht Details
            </div>

            <!-- Opdracht type, status en beschrijving -->
            <div class="panel-body opdrachtdetails">
                <!-- Div waar ajax data van getopdracht.php in word gezet -->
                <div id="opdrachtdetails"><b>Selecteer een opdracht om opdracht details te zien...</b></div>
            </div>
        </div>

        <!-- Opdracht Toevoegen -->
        <div id="opdrachttoevoegenmodal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <!-- Modal header -->
                <div class="modal-header">
                    <span class="close" style="margin-top: 15px;">x</span>
                    <h2 style="margin-top: 15px; margin-bottom: 15px;">Opdracht Toevoegen</h2>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <form action="opdrachten/toevoegen" method="post" id="opdrachttoevoegenform">
                        <input type = "hidden" name = "_token" value = "{{ Session::token() }}">

                        <!-- Titel -->
                        <div style="float:left; width: 48%;">
                            <label for="opdracht_titel">Naam</label>
                            <input type="text" name="opdracht_titel" class="form-control"; required>
                        </div>

                        <!-- Type -->
                        <div style="float:right; width: 48%;">
                            <label for="opdracht_type">Type</label>
                            <select name="opdracht_type" class="form-control" onchange="typeSelectCheck(this);" required>
                                <option id="individueeltype">Individueel</option>
                                <option id="interntype">Intern</option>
                                <option id="externtype">Extern</option>
                            </select>
                        </div> <br><br><br><br>

                        <!-- Beschrijving -->
                        <label for="opdracht_beschrijving">Beschrijving</label> <div id="charactercount" style="float: right;"></div>
                        <textarea id="beschrijving" name="opdracht_beschrijving" class="form-control" maxlength="500" rows=2 cols=20 style="width: 100%; max-width: 100%; height: 110px;"></textarea> <br>

                        <!-- Leereenheden -->
                        <!-- Beschikbare Leereenheden -->
                        <div class="col-md-2" style="width: 45%; padding: 0px;">
                            <label for="select1">Beschikbare Leereenheden</label>
                            <select id="select1" name="selectmultiple" class="form-control" multiple="multiple">
                                <?php
                                foreach ($leereenheden as $Leereenheid) {
                                    /* Toon alle leereenheden */
                                    echo "<option name='opdracht_leereenheden'>";
                                    echo $Leereenheid->naam;
                                    echo "</option>"; }
                                ?>
                            </select>
                        </div>

                        <!-- Knoppen voor het verplaatsen van leereenheden tussen de multiselects -->
                        <ul style="list-style-type:none; float: left; padding: 0px; margin: 0px; margin-left: 2%; margin-right: 2%; width: 6%;">
                            <li><button class="button fa fa-angle-double-right" href="#" id="add" style="margin: 0px; padding-right: 25px; padding-top: 8px; padding-bottom: 8px; margin-bottom: 10px; font-size: 20px;     margin-top: 27px;"></button> </li>
                            <li><button class="button fa fa-angle-double-left" href="#" id="remove" style="margin: 0px; padding-right: 25px; padding-top: 8px; padding-bottom: 8px; font-size: 20px;"></button></li>
                        </ul>

                        <!-- Geselecteerde Leereenheden -->
                        <div class="col-md-2" style="width: 45%; float: right; padding: 0px;">
                            <label for="select2">Geselecteerde Leereenheden</label>
                            <select id="select2" name="opdracht_leereenheden" class="form-control" multiple="multiple" required>
                            </select>
                        </div> <br><br><br><br><br><br>

                        <!-- Deadline -->
                        <div style="float:right; width: 48%;">
                            <label for="deadline">Deadline</label>
                            <input type="date" name="opdracht_deadline" class="form-control" required/>
                        </div>

                        <!-- Individuele of Groeps opdracht -->
                        <div id="indiviudeelofgroepsopdrachtdiv">
                            <label for="individueel">Individuele of groeps opdracht</label> <br>
                            <!-- Individueel -->
                            <label for="individueel" style="margin-top: 1%; margin-right: 5%;">Individueel
                                <input type="radio" name="individueelgroepselect" value="Individueel" checked />
                            </label>

                            <!-- Groep -->
                            <label for="groep">Groep
                                <input type="radio" name="individueelgroepselect" value="Groep" />
                            </label> <br><br>
                        </div>

                        <!-- Opdracht uploaden -->
                        <div id="opdrachtuploadendiv" style="float:left; width: 48%;">
                            <label for="opdracht_link">Link naar opdracht</label>
                            <input type="text" name="opdracht_link" class="form-control"; required>
                        </div>
                        <br>
                        <br>
                        <br>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <!-- Sluiten en Opslaan -->
                    <input class="button" type="reset" id="annuleer" value = "Annuleren" style="float:left; text-align: center; cursor: pointer;" />
                    <input class="button" type="Submit" value = "Opslaan" style="float: right;" />
                    </form>
                </div>
            </div>
        </div>

        <!-- Uitnodigen -->
        <div id="opdrachtuitnodigenmodal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">

                <!-- Modal header -->
                <div class="modal-header">
                    <span class="close" style="margin-top: 15px;">x</span>
                    <h2 style="margin-top: 15px; margin-bottom: 15px;">Uitnodigen voor opdracht</h2>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="opdrachten/uitnodigen" method="post" id="opdrachtuitnodigenform">
                        <input type = "hidden" name = "_token" value = "{{ Session::token() }}">

                        <!-- Dropdown om te kiezen of je een student of docent wilt uitnodigen
                             Als de optie word veranderd word met een javascript methode opties die niet van toepassing zijn
                             op de gekozen persoon weggehaald, zo kan je bijvoorbeeld niet een student uitnodigen voor het beoordelen van een opdracht -->
                        <div style="float:left; width: 48%;">
                            <label for="persoon_uitnodigen">Wie wil je uitnodigen?</label>
                            <select id="persoon_uitnodigen_select" name="persoon_uitnodigen" class="form-control" onchange="typepersoonSelectCheck(this);" required>
                                <option id="uitnodigen_student">Student</option>
                                <option id="uitnodigen_docent">Docent</option>
                            </select>
                        </div>

                        <!-- Dropdown om te kiezen waarvoor je de student of docent wilt uitnodigen -->
                        <div style="float:right; width: 48%;">
                            <label for="waarvoor_uitnodigen">Waarvoor uitnodigen?</label>

                            <select id="waarvoor_uitnodigen_select" name="waarvoor_uitnodigen" class="form-control" required>
                                <option id="uitnodigen_feedback">Feedback</option>
                                <option id="uitnodigen_beoordeling">Beoordeling</option>
                                <option id="uitnodigen_groepsopdracht">Groepsopdracht</option>
                            </select>

                        </div> <br> <br> <br> <br>

                        <!-- Email -->
                        <div style="width: 100%;">
                            <label for="uitnodigen_email">School E-Mail</label>
                            <input type="text" name="uitnodigen_email" class="form-control"; required>
                        </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <!-- Sluiten en Opslaan -->
                    <input class="button" type="reset" id="uitnodigenannuleer" value = "Annuleren" style="float:left; text-align: center; cursor: pointer;" />
                    <input class="button" type="Submit" value = "Uitnodigen" style="float: right;" />
                    </form>
                </div>
            </div>
        </div>

        <!-- Reflecteren -->
        <div id="opdrachtreflecterenmodal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">

                <!-- Modal header -->
                <div class="modal-header">
                    <span class="close" style="margin-top: 15px;">x</span>
                    <h2 style="margin-top: 15px; margin-bottom: 15px;">Reflecteren voor opdracht</h2>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="opdrachten/reflecteren" method="post" id="opdrachtuitnodigenform">
                        <input type = "hidden" name = "_token" value = "{{ Session::token() }}">

                        <!-- Beschrijving -->
                        <label for="opdracht_reflectie">Reflectie</label> <div id="charactercount" style="float: right;"></div>
                        <textarea id="reflectie" name="opdracht_reflectie" class="form-control" maxlength="500" rows=2 cols=20 style="width: 100%; max-width: 100%; height: 110px;"></textarea>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <!-- Sluiten en Opslaan -->
                    <input class="button" type="reset" id="reflectieannuleer" value = "Annuleren" style="float:left; text-align: center; cursor: pointer;" />
                    <input class="button" type="Submit" value = "Opslaan" style="float: right;" />
                    </form>
                </div>
            </div>
        </div>

        <!-- Javascript src -->
        <script src="js/opdrachten.js"></script>

        <!-- Sluit Container -->
    </div>

@endsection