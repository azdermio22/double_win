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
                <div class="row p-2 justify-content-center align-items-center">
                    <div class="col-3 d-flex align-items-center">
                        <div class="das_img_container">
                        @foreach ($user_image as $image)                     
                        @if ($image->user_id == $user->id)
                        <img class="h-100 w-100 rounded-circle" src="{{Storage::url($image->image)}}" alt="">
                        @endif
                        @endforeach
                    </div>
                </div>
                    <div class="col-3 d-flex justify-content-center align-items-center">{{$user->name}}</div>
                    @if ($time->last_logout != null)
                    <div class="col-3 permanence_time">
                        <div class="last_login">{{$time->last_login}}</div>
                        <div class="last_logout">{{$time->last_logout}}</div>
                    </div>
                        @else
                        <div class="col-3 d-flex justify-content-center align-items-center medium_permanence_time"></div>
                        @endif
                        @if ($time->last_logout != null && $counter == 0)
                        <?php $counter = 1?>                       
                        <div class="col-3 ofline text-danger d-flex justify-content-center align-items-center">{{$time->last_logout}}</div>
                        @elseif ($counter == 0)
                        <?php $counter = 1?>
                        <div class="col-3 text-success d-flex justify-content-center align-items-center">online</div>
                        @else 
                        <div class="col-3 user_purcase">
                            <?php $counter_price = 0?>
                            @if (count($user_buys) > 0)
                            @foreach ($user_buys as $i => $user_buy)
                            @if ($user_buy->user_id == $user->id && $user_buy->created_at > $time->last_login && $user_buy->created_at < $time->last_logout)
                            @foreach ($articles as $article)
                                @if ($article->id == $user_buy->article_id)
                                <?php $couter_price = 1?>
                                <p>{{$article->price}}</p>
                                @endif
                            @endforeach
                            @endif
                            @endforeach
                            @endif                   
                    </div>
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