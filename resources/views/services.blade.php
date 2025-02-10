@include('header')

<h2> Services </h2>

<ul>
    @foreach($services as $service)
        <li>{{ $service->name }}</li>
    @endforeach
</ul>

@include('footer')
