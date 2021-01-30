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
    <h3>Terms</h3>

    <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eu congue risus, eget ullamcorper metus. Vestibulum metus ex, porttitor eu augue in, interdum molestie leo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus at neque nibh. Vivamus sit amet porttitor felis. Sed egestas urna sit amet suscipit iaculis. Praesent commodo porta massa, et commodo quam interdum vitae. Suspendisse metus quam, faucibus at nisi ut, fringilla aliquam arcu. Praesent lacus dolor, dictum non risus eget, volutpat condimentum dolor. Vestibulum blandit sit amet erat sed ornare. Praesent euismod enim sed odio pharetra scelerisque id vitae lectus. Nulla tempus turpis ex, fermentum varius arcu molestie eget.
    </p>

    <br>
    
    <h3>
        Conditions
    </h3>

    <p>
        In sagittis purus id purus ullamcorper condimentum a sed sem. Morbi egestas, mauris quis porta convallis, nunc mi euismod mauris, quis tristique leo enim in nisi. Nunc et tellus in tortor congue hendrerit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vitae tortor luctus nulla maximus egestas. Maecenas posuere luctus efficitur. Duis enim enim, semper non quam non, scelerisque commodo justo. In et leo vitae libero aliquam bibendum. Suspendisse potenti. Suspendisse consequat tortor nec justo dignissim, at dignissim ligula feugiat.
    </p>
</div>

@endsection
