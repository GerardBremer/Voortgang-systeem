<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <link href="{{ URL::asset('css/admin.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ URL::asset('js/admin.js') }}"></script>

</head>

<body>

<div id="header">
    <p>Voortgangssysteem</p>
</div>


<div class="form">
<p class="title">Gebruiker toevoegen</p>
    <div class="line"></div>
<ul id="selector">
    <li id="student" class="active">Student</li>
    <li id="docent">Docent</li>
    <li id="coach">Coach</li>
</ul>

{{-- Invoervelden @ Student --}}


    <div id="fstudent">
        {{ Form::open(['action' => 'AdminController@store', 'method' => 'POST']) }}

        <p>
            {{ Form::label('name', 'Voornaam') }}
            {{ Form::text('fname', substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 5)), 0, 3)) }}
        </p>

        <p>
            {{ Form::label('lastname', 'Achternaam') }}
            {{ Form::text('lname', substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 5)), 0, 3)) }}
        </p>

        <p>
            {{ Form::label('studentnumber', 'Student nummer') }}
            {{ Form::number('snumber', substr(str_shuffle(str_repeat("0123456789", 5)), 0, 6)) }}
        </p>

        <p>
            {{ Form::label('studentemail', 'Student email') }}
            {{ Form::email('email', substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 5)), 0, 3) . '@email.com') }}
        </p>

        <p>
            {{ Form::submit('Toevoegen', array('class' => 'btn')) }}
            {{ Form::hidden('role', 'student') }}

        </p>
        {{ Form::close() }}
    </div>
    {{-- Invoervelden @ Docent --}}
    <div id="fdocent">
        {{ Form::open(['action' => 'AdminController@store', 'method' => 'POST']) }}
        <p>
            {{ Form::label('name', 'Voornaam') }}
            {{ Form::text('fname', substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 5)), 0, 3)) }}
        </p>

        <p>
            {{ Form::label('lastname', 'Achternaam') }}
            {{ Form::text('lname', substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 5)), 0, 3)) }}
        </p>

        <p>
            {{ Form::label('studentemail', 'Docent email') }}
            {{ Form::email('email', substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 5)), 0, 3) . '@email.com') }}
        </p>

        <p>
            {{ Form::submit('Toevoegen', array('class' => 'btn')) }}
            {{ Form::hidden('role', 'teacher') }}
        </p>
        {{ Form::close() }}

    </div>
    {{-- Invoervelden @ Coach--}}
    <div id="fcoach">
        {{ Form::open(['action' => 'AdminController@store', 'method' => 'POST']) }}
        <p>
            {{ Form::label('name', 'Voornaam') }}
            {{ Form::text('fname', substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 5)), 0, 3)) }}
        </p>

        <p>
            {{ Form::label('lastname', 'Achternaam') }}
            {{ Form::text('lname', substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 5)), 0, 3)) }}
        </p>

        <p>
            {{ Form::label('studentemail', 'Coach email') }}
            {{ Form::email('email', substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 5)), 0, 3) . '@email.com') }}
        </p>

        <p>
            {{ Form::submit('Toevoegen', array('class' => 'btn')) }}
            {{ Form::hidden('role', 'coach') }}
        </p>
        {{ Form::close() }}
    </div>
</div>
</body>
</html>