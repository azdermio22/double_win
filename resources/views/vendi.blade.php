<x-layout :profile=$profile>
<form class="mt-5" method="POST" action="{{route('store')}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">name</label>
      <input value="{{old('name')}}" name="name" type="text" class="form-control" id="name">
    </div>
    <div class="mb-3 d-flex flex-column">
      <label for="description" class="form-label">description</label>
      <textarea value="{{old('description')}}" name="description" id="description" cols="30" rows="10"></textarea>
    </div>
    <select name="category" id="">
      @foreach ($categoris as $categori)
          <option value="{{$categori->id}}">{{$categori->categori}}</option>
      @endforeach
    </select>
    <div class="mb-3">
        <label for="price" class="form-label">price</label>
        <input value="{{old('price')}}" name="price" type="number" class="form-control" id="price">
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">image</label>
        <input name="image[]" type="file" class="form-control" multiple>
      </div>  
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</x-layout>