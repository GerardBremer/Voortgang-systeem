@extends('layouts.app')

@section('content')

<?php
$opdrachten = App\Opdracht::all();
$leereenheden= App\Leereenheid::all();
$feedback= App\Feedback::all();
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

            <li data-toggle="collapse" data-target="#new" class="collapsed">
                <a href="{{ url('/opdrachten') }}"><i class="fa fa-list-ul"></i> Opdrachten </a>
            </li>
            <ul class="sub-menu collapse" id="new">
                <li>Privé</li>
                <li>Groep</li>
                <li>Extern</li>
            </ul>

            <li data-toggle="collapse" data-target="#products" class="collapsed active">
                <a href="{{ url('/feedback') }}"><i class="fa fa-comment fa-lg"></i> Feedback</a>
            </li>

        </ul>
    </div>
</div>

<div class="container">

  <div class="panel panel-default col-md-12" style="padding-left: 15px; padding-right: 15px;">
    <div class="panel-body" style="float:left; padding: 15px;">Feedback</div>
    <a href="#" class="btn btn-primary" id="feedbackbtn" style="float: right; margin-top: 8px;">Uitnodigen <span class="fa fa-user-plus"></span></a>
  </div>
    <div class="panel panel-default col-md-12" style="padding-right: 0;">
        <div class="row col-md-12" style="padding-right: 0;">
          <legend>Uitnodigingen</legend>
            <table class="table table-hover">
             <thead>
              <tr>
                <th>Email</th>
                <th>Opdracht</th>
                <th>Rol</th>
                <th>Status</th>
                <th>Feedback</th>
                <th class="text-center">Actie</th>
              </tr>
            </thead>
            <tr>

<?php
    foreach ($feedback as $feedbacks) {
        echo "<td>$feedbacks->email</td>";
        echo "<td>$feedbacks->opdracht</td>";
        echo "<td>$feedbacks->rol</td>";
        echo "<td><span class='label label-warning'>$feedbacks->status</span></td>";
        echo "<td>$feedbacks->feedback</td>";
        echo "<td class='text-center'>
        <a href='feedback/delete/$feedbacks->id' class='weigerenbtn label label-danger'><i class='fa fa-ban' aria-hidden='true'></i> Weigeren</a>
        <a href='#' class='accepterenbtn label label-success'><span class='fa fa-check-circle-o' aria-hidden='true'></span> Accepteren</a>
    </td></tr>";
    };
?>

                <?php
                if (isset($_POST['delete']))
                {
                    $id =$_REQUEST['delete'];

                    $sql="DELETE FROM feedback WHERE id='10'";
                    mysql_query($sql);
                }



        ?>
          </table>
        </div>

        <div id="uitnodigenmodal" class="modal">
          <div class="modal-content">
            <div class="modal-header">
              <span class="close">x</span>
              <h2>Uitnodigen</h2>
            </div>
            <div class="modal-body">
              <form action="feedback/uitnodigen" method="post">
                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                
                   <div style="float:left; width: 48%;">
                   <label for="for">Rol</label>
                    <select name="rol" class="form-control" style="float:left;" required> 
                            <option id="individueeltype">Student</option>
                            <option id="interntype">Docent</option>
                    </select>
                    </div>

                    <div style="float:right; width: 48%;">
                    <label for="opdracht">Opdracht</label>
                    <select name="opdracht" class="form-control" style="float:right;" required> 
                      <?php
                        foreach ($opdrachten as $opdracht) {
                          /* Toon alle leereenheden */
                          echo "<option name>";
                          echo $opdracht->titel;
                          echo "</option>"; } 
                      ?>
                    </select>
                    </div>

                        <!-- Email -->
                     <div style="width: 100%;">
                        <label for="email">School E-Mail</label>
                        <input type="text" name="email" class="form-control"; required>
                    </div>

                <div class="modal-footer">
                  <input class="button" type="Reset" id="uitnodigenannuleer" value = "Annuleren" style="float:left; text-align: center; cursor: pointer;" />
                  <input class="button" type="Submit" value = "Opslaan" style="float: right;" />
                </form> 
             </div>
        </div>
    </div>
</div>



        <div id="accepterenmodal" class="modal">
          <div class="modal-content">
            <div class="modal-header">
              <span class="close">x</span>
              <h2>Feedback</h2>
            </div>
            <div class="modal-body">
              <form action="feedback/accepteren" method="post">
                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">


                <textarea class="form-control" name="feedback_beschrijving" rows="6" placeholder="Typ hier je feedback..." maxlength="1000" required style="max-width: 100%;"></textarea>

                <div class="modal-footer">
                    <input class="button" type="Reset" id="accepterenannuleer" value = "Annuleren" style="float:left; text-align: center; cursor: pointer;" />
                    <input class="button" type="Submit" value = "Opslaan" style="float: right;" />
                </form> 
                </div>
            </div>
        </div>
        </div>

  <script type="text/javascript" src="js/feedback.js"></script>
  @endsection