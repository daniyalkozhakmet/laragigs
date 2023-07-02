<x-layout>
    <x-container>
        <h1>Edit the gig</h1>
        <form action="/gigs/edit/{{{$gig->id}}}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group my-2">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{$gig->title}}">
                @error('title')
                <p class="form-text  text-danger">{{$message}}</p>
                @enderror
            </div>
            <!-- Logo -->
            <!-- <div class="form-group my-2">
                <label for="Tags">Tags</label>
                <input type="text" class="form-control" id="tags" name="tags" placeholder="Tags" value="{{old('tags')}}">
                @error('tags')
                <p class="form-text  text-danger">{{$message}}</p>
                @enderror
            </div> -->
            <div class="form-group my-2">
                <label for="Tags">Tags</label>
                <select class="form-select" multiple='multiple' aria-label="Default select example" name="tags[]">
                    <option>Select the tag</option>

                    @foreach ($tags as $key=>$tag)

                    @if($gig->categories->contains('id', $tag->id ))
                    <option value="{{$tag->id}}" selected>{{$tag->name}}</option>
                    @else
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endif

                    @endforeach
                </select>

                @error('tags')
                <p class="form-text  text-danger">{{$message}}</p>
                @enderror

            </div>

            <div class="form-group my-2">
                <label for="company">Company</label>
                <input type="text" class="form-control" id="company" name="company" placeholder="Company" value="{{$gig->company}}">
                @error('company')
                <p class="form-text  text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" placeholder="Location" value="{{$gig->location}}">
                @error('location')
                <p class="form-text  text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$gig->email }}">
                @error('email')
                <p class="form-text  text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="title">Website</label>
                <input type="text" class="form-control" id="website" name="website" placeholder="Website" value="{{$gig->website}}">
                @error('website')
                <p class="form-text  text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3">{{$gig->description}}</textarea>
                @error('description')
                <p class="form-text  text-danger">{{$message}}</p>
                @enderror
            </div>
            <button class="btn btn-primary" type="submit">Edit</button>
        </form>
    </x-container>
</x-layout>