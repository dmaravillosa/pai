@extends('layouts.home')

@section('content')
<div class="col-md-10 mt-3 bg-white">
    <div class="row m-2 justify-content-center">
        <div class="col-md-3">
            <a class="text-dark" href="{{ url('/') }}">Announcements</a>
        </div>
        <div class="col-md-3">
            <u><a class="text-dark" href="{{ route('about') }}">About</a></u>
        </div>
        <div class="col-md-3">
            <a class="text-dark" href="{{ route('contact') }}">Contact Us</a>
        </div>
    </div>
</div>

<div class="col-md-10 mt-3">

    <!-- <img class="img-fluid" src="http://via.placeholder.com/900x200"> -->
    <img class="img-fluid" src="{{ asset('cover.jpg') }}">

    <br><br>

    <h4>Papaya Academy School</h4>

    <h6>
        The Papaya Academy teaches students Grades 1 to 6. The school focuses not only on the curricular activities but also in non- curricular activities like scouting, chess, taekwondo, drama, volleyball, basketball, and theater: drama, singing and dancing.
        <br><br>
        The school has several facilities that help the children in their learning. A classroom that caters 30 children, a library, audio and computer room, administration office, gymnasium, kitchen, clinic and a science laboratory.
        <br><br>
        Besides of all the activities done annually, the children had their educational tour, sports and music competitions between other schools.
        <br><br>
        The children and the teachers have different religious backgrounds, and all religions are respected. The teachers in Papaya Academy are professionals and are equip with talents.
        <br><br>
    </h6>

    <h4>Mission</h4>
    <h6>
        Papaya's mission is to create a student- focused academic and educational environment, which aspires to achieve excellence. It promotes positive beliefs and values. It acknowledges and appreciates the diversity of different religious and humanitarian beliefs. Its goal is to prepare students to succeed in further educational studies and into the world of work and to help them develop into mature adults with sense of purpose and belonging.
    </h6>

    <br>

    <h4>Main Goal and Objective of Papaya Academy</h4>
    <h6>
        Papaya Academy is a privately owned school founded upon Humanitarian and Christian beliefs and Values. It is dedicated to providing access to a quality education, believing that all children have this right.
    </h6>

    <br>
    <h4>Specific Goals and Objectives</h4>
    <h6>
        Papaya Academy aims to develop the whole child-- spiritual, moral, emotional, intellectual, social and physical aspects of life through varied experiences and teaching methods. The specific goals and objectives are:
	</h6>
    <ul>
        <li>
            Each member of the school community should be valued as a uniquely created individual.
        </li>
        <li>
            Effective learning is achieved through stimulating student curiosity, creativity and enthusiasm through holistic education.
        </li>
    </ul>
    <small><i>"Sources: Manual of Operation (Papaya Academy Inc.) and <a href="http://www.kalinga.nl" target="_blank">http://www.kalinga.nl</a>"</i></small>



    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
@endsection
