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
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4">{{$user->name}}</div>
                    <div class="col-4 permanence_time"><div class="last_login">{{$user->last_login}}</div><div class="last_logout">{{$user->last_logout}}</div></div>
                    <div class="col-4"></div>
                </div>
                @endforeach
            </div>
        </div>
</x-pulse>
</x-layout>