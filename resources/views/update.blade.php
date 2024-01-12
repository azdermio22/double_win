<x-layout :profile=$profile>
  <form class="mt-5" method="POST" action="{{route('update',compact('article'))}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-5 d-flex justify-content-center mt-4">
        <div class="mb-3">
          <div class="d-flex justify-content-center"><label for="image" class="form-label d-flex">image:<div class="img_loaded"></div></label></div>
          <div class="img_preview"><i class="bi bi-file-earmark-image"></i><div class="img_preview_slider"></div></div>
          <div class="preview_miniature_container"><div class="miniature_arrow_left d-none"><div class="w-25"><div class="left_arrow"></div></div></div><div class="preview_miniature_slider"></div><div class="miniature_arrow_right d-none"><div class="w-25"><div class="right_arrow"></div></div></div></div>
          <input name="image[]" type="file" class="img_input form-control d-none" multiple>
        </div> 
      </div>
      <div class="col-7 d-flex flex-column justify-content-center align-items-center position-relative overflow-hidden">
        <div class="form_slider">

          <div class="h-100 form_size d-flex justify-content-center align-items-center flex-column">
        <div class="mb-3 w-75">
          <label for="name" class="form-label">name</label>
          <input value="{{$article->name}}" name="name" type="text" class="form-control" id="name">
        </div>
        <div class="mb-3 w-75 d-flex flex-column">
          <label for="description" class="form-label">description</label>
          <textarea class="textarea" value="{{$article->description}}" name="description" id="description" cols="30" rows="10"></textarea>
        </div>
        <div class="mb-3 w-75">
            <label for="price" class="form-label">price</label>
            <input value="{{$article->price}}" name="price" type="number" class="form-control" id="price">
          </div> 
          <div class="d-flex justify-content-evenly w-100 my-3">
            <div>category:</div>
            @foreach ($categoris as $categori)
                <option class="category" value="{{$categori->id}}">{{$categori->categori}}</option>
            @endforeach
          </div>
          <input type="number" name="category" id="category_input" hidden>
        </div>

        <div class="form h-100 d-flex justify-content-center align-items-center flex-column d-none">
          <div class="mb-3 w-75">
            <label for="name" class="form-label">taglia</label>
            <input value="{{old('name')}}" name="size" type="text" class="form-control" id="size" disabled>
          </div>
          <div class="mb-3 w-75">
            <label for="name" class="form-label">marca</label>
            <input value="{{old('name')}}" name="brand" type="text" class="form-control" id="brend" disabled>
          </div>     
            <button type="submit" class="btn btn-primary">load article</button>
        </div>

          <div class="form h-100 d-flex justify-content-center align-items-center flex-column d-none">
            <div class="mb-3 w-75">
              <label for="name" class="form-label">cilindrata</label>
              <input value="{{old('name')}}" name="volume" type="text" class="form-control" id="volume" disabled>
            </div>
            <div class="mb-3 w-75">
              <label for="name" class="form-label">modello</label>
              <input value="{{old('name')}}" name="model" type="text" class="form-control" id="model" disabled>
            </div>
            <div class="mb-3 w-75">
              <label for="name" class="form-label">chilometri</label>
              <input value="{{old('name')}}" name="km" type="text" class="form-control" id="km" disabled>
            </div>
            <div class="mb-3 w-75">
              <label for="name" class="form-label">marca</label>
              <input value="{{old('name')}}" name="brand" type="text" class="form-control" id="brand" disabled>
            </div> 
            <div class="mb-3 w-75">
              <label for="name" class="form-label">alimentazzione</label>
              <input value="{{old('name')}}" name="powering" type="text" class="form-control" id="powering" disabled>
            </div> 
            <div class="mb-3 w-75">
              <label for="name" class="form-label">disposizzione</label>
              <input value="{{old('name')}}" name="displacement" type="text" class="form-control" id="displacement" disabled>
            </div>      
              <button type="submit" class="btn btn-primary">load article</button>
          </div>

          <div class="form h-100 d-flex justify-content-center align-items-center flex-column d-none">
            <div class="mb-3 w-75">
              <label for="name" class="form-label">materiale/i</label>
              <input value="{{old('name')}}" name="material" type="text" class="form-control" id="matirial" disabled>
            </div>
            <div class="mb-3 w-75">
              <label for="name" class="form-label">certificato di autenticità</label>
              <input value="{{old('name')}}" name="certificate" type="text" class="form-control" id="certificate" disabled>
            </div>      
              <button type="submit" class="btn btn-primary">load article</button>
          </div>

        </div>
      </div>
    </div>
  </form>
</x-layout>