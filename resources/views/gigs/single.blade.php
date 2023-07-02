<x-layout>
    <x-container>
        <h1 class="font-weight-bold text-uppercase">{{$gig->title}}</h1>
        <p><span class="font-weight-bold text-uppercase">Description: </span>{{$gig->description}} </p>
        <p><span class="font-weight-bold text-uppercase">Categories: </span>
            @foreach($gig->categories as $tag)
            <span class="btn btn-outline-primary">
                {{$tag->name}}
            </span>
            @endforeach
        </p>
        <p><span class="font-weight-bold text-uppercase">Location: </span>{{$gig->location}} </p>
        <p><span class="font-weight-bold text-uppercase">Email: </span>{{$gig->email}} </p>
        <p><span class="font-weight-bold text-uppercase">Website: </span>{{$gig->website}} </p>
        <a href="/gigs" class="btn btn-primary">Back</a>
    </x-container>

</x-layout>