<x-layout :profile=$profile>
<form class="mt-5" method="POST" action="{{route('store')}}" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-5 d-flex justify-content-center">
        <div class="mb-3">
          <label for="image" class="form-label">image</label>
          <div class="img_preview"><div class="img_preview_slider"><i class="bi bi-file-earmark-image"></i></div></div>
          <div class="preview_miniature_container"><div class="preview_miniature_slider d-flex position-absolute"></div></div>
          <input name="image[]" type="file" class="img_input form-control d-none" multiple>
        </div> 
      </div>
      <div class="col-7 d-flex flex-column justify-content-center align-items-center">
        <div class="mb-3 w-75">
          <label for="name" class="form-label">name</label>
          <input value="{{old('name')}}" name="name" type="text" class="form-control" id="name">
        </div>
        <div class="mb-3 w-75 d-flex flex-column">
          <label for="description" class="form-label">description</label>
          <textarea class="textarea" value="{{old('description')}}" name="description" id="description" cols="30" rows="10"></textarea>
        </div>
        <div class="d-flex justify-content-evenly w-100 my-3">
          @foreach ($categoris as $categori)
              <option class="category" value="{{$categori->id}}">{{$categori->categori}}</option>
          @endforeach
        </div>
          <input type="text" id="category_input" class="d-none">
        <div class="mb-3 w-75">
            <label for="price" class="form-label">price</label>
            <input value="{{old('price')}}" name="price" type="number" class="form-control" id="price">
          </div> 
        <button type="submit" class="btn btn-primary">load article</button>
      </div>
    </div>
  </form>
</x-layout>