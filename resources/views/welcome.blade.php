<x-layout>
    <header class="d-flex justify-content-center align-items-center text-center">
        <div class="title_container">
        <h2 class="header_title">trova prezzi incredibili<br>su un ampia gamma di prodotti<br>provenienti da tutto il mondo</h2>
        <form method="POST" action="">
            @csrf
            <input class="w-50" type="search" name="search" id="">
            <button type="submit"><i class="bi bi-search"></i></button>
        </form>
        </div>
    </header>
    <main>
        <div class="container-fluid">
            <div class="row justify-content-evenly">
                @foreach ($articles as $article)
                <div class="card col-3 p-0 my-3 text-center" style="width: 18rem;">
                    <img src="{{Storage::url($article->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{$article->name}}</h5>
                      <p class="card_text">{{$article->description}}</p>
                      <h5>{{$article->price}}</h5>
                      <a href="#" class="btn btn-primary">dettagli</a>
                    </div>
                </div>
                @endforeach
              </div>
        </div>
    </main>
    <footer></footer>
</x-layout>