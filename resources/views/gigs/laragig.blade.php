<x-layout>
    <x-container>
        <div class="d-flex justify-content-between align-items-center w-100">
            <h1>Latest gigs</h1>
            <form class="d-flex justify-content-end  mb-3 input-group w-50" method="GET" action="/gigs">
                @csrf
                <select class="custom-select" id="inputGroupSelect02" name="search_category">
                    <option selected disabled>Choose category</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary input-group-append">Search</button>
            </form>

        </div>

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
                    <a href={{'/gigs/'.$gig->id}} class="btn btn-primary">View</a>
                </div>
            </div>
        </div>
        @endforeach
        <div class="my-6 p-4 d-flex justify-content-center align-items-center">
            {{$gigs->links()}}
        </div>
    </x-container>
</x-layout>