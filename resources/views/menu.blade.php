@extends('layouts.app')



@section('content')
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <div class="nav-side-menu">
        <div class="brand"> Hier moet de balk </div>
        <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

        <div class="menu-list">

            <ul id="menu-content" class="menu-content collapse out">
                <li>
                    <a href="#">
                        <i class="fa fa-home fa-lg" class="collapsed active"></i> Profiel
                    </a>
                </li>

                <li  data-toggle="collapse" data-target="#products" class="collapsed active">
                    <a href="#"><i class="fa fa-dashboard fa-lg"></i> Dashboard <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="products">
                    <li class="active"><a href="#">Test</a></li>
                    <li><a href="#">Test</a></li>


                </ul>


                <li data-toggle="collapse" data-target="#service" class="collapsed">
                    <a href="#"><i class="fa fa-globe fa-lg"></i> Leereenheden <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="service">
                    <li>Lopende leereenheden</li>
                    <li>Behaalde Leereenheden</li>

                </ul>


                <li data-toggle="collapse" data-target="#new" class="collapsed">
                    <a href="#"><i class="fa fa-file-text-o fa-lg"></i> Opdrachten <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="new">
                    <li>Privé</li>
                    <li>Groep</li>
                    <li>Extern</li>
                </ul>


                <li>
                    <a href="#">
                        <i class="fa fa-user fa-lg"></i> Feedback
                    </a>
                </li>


            </ul>
        </div>


    </div>




    <div class="dashboard-container">
        <div class="dashboard-content">
            <div class="dashboard-top">
                <div class="dashboard-top-left">
                    <div class="dashboard-top-left-welkom">
                        <div class="dashboard-top-left-welkom-content">
                            <h1>Welkom, student!</h1>

                        </div>

                    </div>
                    <div class="dashboard-top-left-leereenheden">
                        <div class="dashboard-top-left-leereenheden-content">
                            <p>Te behalen leereenheden</p>
                            <hr>

                            <div class="temporary-test-leereenheid">
                                <p>Leereenheid 1</p>

                            </div>
                            <div class="temporary-test-leereenheid">
                                <p>Leereenheid 2</p>

                            </div>
                            <div class="temporary-test-leereenheid">
                                <p>Leereenheid 3</p>

                            </div>
                            <div class="temporary-test-leereenheid">
                                <p>Leereenheid 4</p>


                            </div>
                        </div>

                    </div>
                </div>
                <div class="dashboard-top-notificaties">
                    <div class="dashboard-top-notificaties-content">
                        <p>Notificaties</p>
                        <hr>

                        <div class="temporary-test-notificatie">
                            <p>23-01-2020</p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="dashboard-bottom">
                <div class="dashboard-bottom-opdrachten">
                    <p>Lopende opdrachten</p>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    @endsection


