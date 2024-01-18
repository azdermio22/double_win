<x-layout :profile=$profile>
    <header class="d-flex flex-column justify-content-center align-items-center text-center header">
        <div class="lens"><div class="background"></div><div class="lens_body"></div></div>
        <h2>cerca e trova prodotti in tutto il mondo</h2>
        <div class="title_container">
            <div class="d-flex justify-content-evenly">
            <div class="header_div">prodotti:<div class="number">10.000+</div></div>
            <div class="header_div">utenti:<div class="number">5.000+</div></div>
            <div class="header_div">partner:<div class="number">500+</div></div>
        </div>
        <form method="POST" action="">
            @csrf
            <input class="header_search" type="search" name="search" id="">
            <button class="header_search_button" type="submit"><i class="bi bi-search"></i></button>
        </form>
        </div>
    </header>
    <main>
        <div class="categori_title">abbigliamento</div>
        <div class="card_row row justify-content-evenly">
            @foreach ($articles as $article)
            @if ($article->categori_id == 1)
            <x-card :article="$article" :images="$images"></x-card>
            @endif
            @endforeach
          </div>
        <div class="container-fluid p-0">
            <div class="categori_title">veicoli</div>
            <div class="card_row row justify-content-evenly">
                @foreach ($articles as $article)
                @if ($article->categori_id == 2)
                <x-card :article="$article" :images="$images"></x-card>
                @endif
                @endforeach
              </div>
              <div class="categori_title">gioglielli</div>
              <div class="card_row row justify-content-evenly">
                  @foreach ($articles as $article)
                  @if ($article->categori_id == 3)
                  <x-card :article="$article" :images="$images"></x-card>
                  @endif
                  @endforeach
                </div>
        </div>
    </main>
    <footer></footer>
</x-layout>