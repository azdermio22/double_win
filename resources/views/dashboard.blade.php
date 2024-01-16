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
        <div class="user_dashboard">
            <div class="container-fluid">
                @foreach ($users as $user)
                <div class="user_container">
                    <div class="user_expand position-absolute w-100">
                @foreach ($user_time as $i => $time)
                    @if ($time->user_id == $user->id)            
                <div class="row">
                    <div class="col-3"><button class="expand">espandi</button></div>
                    <div class="col-3">{{$user->name}}</div>
                    @if ($time->last_logout != null)
                    <div class="col-3 permanence_time">
                        <div class="last_login">{{$time->last_login}}</div>
                        <div class="last_logout">{{$time->last_logout}}</div>
                    </div>
                        @else
                        <div class="col-3"></div>
                        @endif
                        @if ($time->last_logout != null)                       
                        <div class="col-3 ofline">{{$time->last_logout}}</div>
                        @else
                        <div class="col-3">online</div>
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