<x-layout :profile=$profile>
    <x-pulse>
        <livewire:pulse.servers />
        <livewire:pulse.usage type="requests" />
    <livewire:pulse.usage type="slow_requests" />
    <livewire:pulse.usage type="jobs" />
    <livewire:pulse.exceptions />
    <livewire:pulse.queues />
    <livewire:pulse.slow-requests />
    <livewire:pulse.slow-jobs />
    <livewire:pulse.slow-queries />
    <livewire:pulse.slow-outgoing-requests />
    <livewire:pulse.cache />
        <div class="user_dashboard overflow-y-scroll">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center align-items-center text-secondary">
                    <div class="col-3 d-flex fs-3 justify-content-center align-items-center text-secondary"><i class="bi bi-person-circle"></i><p class="user_title">user data</p></div>
                    <div class="col-3">user name</div>
                    <div class="col-3">last session duration</div>
                    <div class="col-3">last time online</div>
                </div>
                @foreach ($users as $user)
                <div class="user_container">
                    <?php $counter = 0?>
                    <div class="user_expand position-absolute w-100">
                @foreach ($user_time as $i => $time)
                    @if ($time->user_id == $user->id)            
                <div class="row p-2 justify-content-center">
                    @foreach ($user_image as $image)                     
                    @if ($image->user_id == $user->id)
                    <div class="col-3"><div class="das_img_container"><img class="h-100 w-100 rounded-circle" src="{{Storage::url($image->image)}}" alt=""></div></div>
                    @else
                    <div class="col-3"><div class="das_img_container"><img class="h-100 w-100 rounded-circle" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Windows_10_Default_Profile_Picture.svg/2048px-Windows_10_Default_Profile_Picture.svg.png" alt=""></div></div>
                    @endif
                    @endforeach
                    <div class="col-3">{{$user->name}}</div>
                    @if ($time->last_logout != null)
                    <div class="col-3 permanence_time">
                        <div class="last_login">{{$time->last_login}}</div>
                        <div class="last_logout">{{$time->last_logout}}</div>
                    </div>
                        @else
                        <div class="col-3"></div>
                        @endif
                        @if ($time->last_logout != null && $counter == 0)
                        <?php $counter = 1?>                       
                        <div class="col-3 ofline text-danger">{{$time->last_logout}}</div>
                        @elseif ($counter == 0)
                        <?php $counter = 1?>
                        <div class="col-3 text-success">online</div>
                        @else                       
                        @foreach ($articles as $article)
                            @if ($user_buy[0]->article_id == $article->id)
                            <div class="col-3">{{$article->price}}$</div>
                            @endif
                        @endforeach
                        @endif
                    </div>
                    @endif
                @endforeach
            </div>
            </div>
                @endforeach
            </div>
        </div>
</x-pulse>
</x-layout>