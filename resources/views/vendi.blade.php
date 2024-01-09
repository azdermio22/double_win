<x-layout :profile=$profile>
<form class="mt-5" method="POST" action="{{route('store')}}" enctype="multipart/form-data">
    @csrf
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
          <div class="h-100 form d-flex justify-content-center align-items-center flex-column">
        <div class="mb-3 w-75">
          <label for="name" class="form-label">name</label>
          <input value="{{old('name')}}" name="name" type="text" class="form-control" id="name">
        </div>
        <div class="mb-3 w-75 d-flex flex-column">
          <label for="description" class="form-label">description</label>
          <textarea class="textarea" value="{{old('description')}}" name="description" id="description" cols="30" rows="10"></textarea>
        </div>
          <input type="text" id="category_input" class="d-none">
        <div class="mb-3 w-75">
            <label for="price" class="form-label">price</label>
            <input value="{{old('price')}}" name="price" type="number" class="form-control" id="price">
          </div> 
          <div class="d-flex justify-content-evenly w-100 my-3">
            <div>category:</div>
            @foreach ($categoris as $categori)
                <option class="category" value="{{$categori->id}}">{{$categori->categori}}</option>
            @endforeach
          </div>
          <div class="change_form"> prova</div>
        </div>
          <div class="form h-100 d-flex justify-content-center align-items-center flex-column">
            <div class="mb-3 w-75">
              <label for="name" class="form-label">cilindrata</label>
              <input value="{{old('name')}}" name="name" type="text" class="form-control" id="name">
            </div>
            <div class="mb-3 w-75">
              <label for="name" class="form-label">modello</label>
              <input value="{{old('name')}}" name="name" type="text" class="form-control" id="name">
            </div>
            <div class="mb-3 w-75">
              <label for="name" class="form-label">chilometri</label>
              <input value="{{old('name')}}" name="name" type="text" class="form-control" id="name">
            </div>
            <div class="mb-3 w-75">
              <label for="name" class="form-label">carburante</label>
              <input value="{{old('name')}}" name="name" type="text" class="form-control" id="name">
            </div>       
              <button type="submit" class="btn btn-primary">load article</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</x-layout>