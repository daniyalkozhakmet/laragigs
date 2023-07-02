<x-layout>
    <x-container>
        <h1>My gigs</h1>
        @if( count($gigs)==0)
        <h2 class="mt-5 text-danger text-center">There are no gig by you</h2>
        @else
        @foreach($gigs as $gig)
        <div class="card my-2">
            <div class="card-header">
                {{$gig->title}}
            </div>
            <div class="card-body">
                <p class="card-text">{{substr($gig->description,0,50)}}...</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        @foreach($gig->categories as $tag)
                        <span class="btn btn-outline-primary">
                            {{$tag->name}}
                        </span>
                        @endforeach
                    </div>
                    <div>
                        <a href={{'/gigs/'.$gig->id}} class="btn btn-primary">View</a>
                        <a href={{'/gigs/edit/'.$gig->id}} class="btn btn-warning">Edit</a>
                    </div>

                </div>
            </div>
        </div>
        @endforeach
        <div class="my-6 p-4 d-flex justify-content-center align-items-center">
            {{$gigs->links()}}
        </div>
        @endif
    </x-container>
</x-layout>