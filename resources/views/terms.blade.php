@extends('layouts.home')

@section('content')
<div class="col-md-10 mt-3 bg-white">
    <div class="row m-2 justify-content-center">
        <div class="col-md-3">
            <a class="text-dark" href="{{ url('/') }}">Announcements</a>
        </div>
        <div class="col-md-3">
            <a class="text-dark" href="{{ route('about') }}">About</a>
        </div>
        <div class="col-md-3">
            <u><a class="text-dark" href="{{ route('contact') }}">Contact Us</a></u>
        </div>
    </div>
</div>

<div class="col-md-10 mt-3">
    <h3>Terms and Agreement</h3>
    <h5>Accounts</h5>
    <p style="text-align:justify">
        You are responsible for maintaining the confidentiality of the password provided to you by the school and are fully responsible for all activities that occur under your Account such as viewing and printing the grades of the student. You agree to immediately notify the school principal or the student's adviser of any unauthorized use, or suspected unauthorized use of your Account or any other breach of security through messaging the adviser or the school principal (quelizasheryl@gmail.com). Papaya Academy cannot and will not be liable for any loss or damage arising from your failure to comply with the above requirements.
        <br><br>
        If copies of grades are needed for official record to be submitted, please contact the school at quelizasheryl@gmail.com or reach us at (02) 997-2894 to request the official copy of form138. Printed copy of grades from the website cannot be used as official copy of form138.
        <br><br>
        Papaya Academy is committed to protect the privacy rights of individuals on personal information pursuant to the provisions of the Data Privacy Act of 2012, its Implementing Rules and Regulations and other relevant issuances.
        <br><br>
        All employees, parents and school staff are enjoined to comply with and to share in the responsibility to secure and protect personal information collected and processed by Papaya Acedemy in pursuit of legitimate purposes.
    </p>

    <br>
    
    <br><br><br><br><br><br><br><br><br><br> 
</div>

@endsection
