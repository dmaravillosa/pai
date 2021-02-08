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
    <h3>Terms and Conditions</h3>
    <h5>Accounts</h5>
    <p style="text-align:justify">
        You are responsible for maintaining the confidentiality of the password provided to you by the school and are fully responsible for all activities that occur under your Account such as viewing and printing the grades of the student. You agree to immediately notify the school principal or the student's adviser of any unauthorized use, or suspected unauthorized use of your Account or any other breach of security through messaging the adviser or the school principal. Papaya Academy cannot and will not be liable for any loss or damage arising from your failure to comply with the above requirements.
        <br><br>
        If copies of grades are needed for official record to be submitted, please contact the school to request the official. Printed copy of grades from the website cannot be used as official copy of form138.
        <br><br>
        Papaya Academy is committed to protect the privacy rights of individuals on personal information pursuant to the provisions of the Data Privacy Act of 2012, its Implementing Rules and Regulations and other relevant issuances.
    </p>

    <br>
    
    <h5>
        WHAT PERSONAL DATA WE STORE
    </h5>

    <p style="text-align:justify">
        Papaya Academy stores the some Personal Data of its students, faculty and staff, including, but not limited to, full name, students' grades, attendance, behavior, teachers' names and teachers' email address.
    
        Papaya Academy collects data in the following manner:
        <br>
        1. Through official students' school records <br>
        2. Information provided by the school employees
    </p>
    <h5>
        HOW DOES PAPAYA ACADEMY USE PERSONAL DATA
    </h5>
    <p style="text-align:justify">
        To the maximum extent allowed by law, Papaya Academy may use personal data of its students and employees to pursue its objectives. In particular, the personal data collected by Papaya Academy shall be used, among others, to: to monitor and report on the students' progress.
        <br><br>
        All employees, parents and school staff are enjoined to comply with and to share in the responsibility to secure and protect personal information collected and processed by Papaya Acedemy in pursuit of legitimate purposes.
    </p>
    <br><br><br><br><br><br><br><br><br><br> 
</div>

@endsection
