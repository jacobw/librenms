<x-panel class="table-responsive">
    <x-slot name="table">
        <table class="table table-hover table-condensed table-striped">
            <thead>
            <tr>
                <th>{{ __('Summary') }}</th>
                <th><a href="{{ url('devices') }}">{{ __('Devices') }}</a></th>
                <th><a href="{{ url('ports') }}">{{ __('Ports') }}</a></th>
                @if($show_services)
                    <th><a href="{{ url('services') }}">{{ __('Services') }}</a></th>
                @endif
                @if($show_sensors)
                    <th><a href="{{ url('health') }}">{{ __('Health') }}</a></th>
                @endif
            </tr>
            </thead>
            <tbody>
            <tr>
                <th><span class="green">{{ __('Up') }}</span></th>
                <td><a href="{{ url('devices/format=list_detail/state=up') }}"><span class="green"> {{ $devices['up'] }}</span></a></td>
                <td><a href="{{ url('ports/format=list_detail/state=up') }}"><span class="green"> {{ $ports['up'] }}</span></a></td>
                @if($show_services)
                    <td><a href="{{ url('services/view=details/state=ok') }}"><span class="green"> {{ $services['ok'] }}</span></a></td>
                @endif
                @if($show_sensors)
                    <td><a href="{{ url('health') }}"><span class="green"> {{ $sensors['ok'] }}</span></a></td>
                @endif
            </tr>
            <tr>
                <th><span class="red">{{ __('Down') }}</span></th>
                <td><a href="{{ url('devices/format=list_detail/state=down') }}"><span class="red"> {{ $devices['down'] }}</span></a></td>
                <td><a href="{{ url('ports/format=list_detail/state=down') }}"><span class="red"> {{ $ports['down'] }}</span></a></td>
                @if($show_services)
                    <td><a href="{{ url('services/view=details/state=critical') }}"><span class="red"> {{ $services['critical'] }}</span></a></td>
                @endif
                @if($show_sensors)
                    <td><a href="{{ url('health') }}"><span class="red"> {{ $sensors['critical'] }}</span></a></td>
                @endif
            </tr>
            <tr>
                <th><span class="blue">{{ __('Ignored tag') }}</span></th>
                <td><a href="{{ url('devices/format=list_detail/ignore=1') }}"><span class="blue"> {{ $devices['ignored'] }}</span></a></td>
                <td><a href="{{ url('ports/format=list_detail/ignore=1') }}"><span class="blue"> {{ $ports['ignored'] }}</span></a></td>
                @if($show_services)
                    <td><a href="{{ url('services/view=details/ignore=1') }}"><span class="blue"> {{ $services['ignored'] }}</span></a></td>
                @endif
                @if($show_sensors)
                    <td><span class="grey"> -</span></td>
                @endif
            </tr>
            <tr>
                <th><span class="grey">{{ __('Alert disabled') }}</span></th>
                <td><a href="{{ url('devices/format=list_detail/disable_notify=1') }}"><span class="grey"> {{ $devices['disable_notify'] }}</span></a></td>
                <td><span class="grey"> -</span></a></td>
                @if($show_services)
                    <td><span class="grey"> -</span></a></td>
                @endif
                @if($show_sensors)
                    <td><a href="{{ url('health') }}"><span class="grey"> {{ $sensors['disable_notify'] }}</span></a></td>
                @endif
            </tr>
            <tr>
                <th><span class="black">{{ __('Disabled') }}/{{ __('Shutdown') }}</span></th>
                <td><a href="{{ url('devices/format=list_detail/disabled=1') }}"><span class="black"> {{ $devices['disabled'] }}</span></a></td>
                <td><a href="{{ url('ports/format=list_detail/state=admindown') }}"><span class="black"> {{ $ports['shutdown'] }}</span></a></td>
                @if($show_services)
                    <td><a href="{{ url('services/view=details/disabled=1') }}"><span class="black"> {{ $services['disabled'] }}</span></a></td>
                @endif
                @if($show_sensors)
                    <td><span class="grey"> -</span></td>
                @endif
            </tr>
            @if($summary_errors)
            <tr>
                <th><span class="black">{{ __('Errored') }}</span></th>
                <td>-</td>
                <td><a href="{{ url('ports/format=list_detail/errors=1') }}"><span class="black">  {{ $ports['errored'] }}</span></a></td>
                @if($show_services)
                    <td>-</td>
                @endif
                @if($show_sensors)
                    <td><span class="grey"> -</span></td>
                @endif
            </tr>
            @endif
            <tr>
                <th><span class="grey">{{ __('Total') }}</span></th>
                <td><a href="{{ url('devices') }}"><span> {{ $devices['total'] }}</span></a></td>
                <td><a href="{{ url('ports') }}"><span> {{ $ports['total'] }}</span></a></td>
                @if($show_services)
                    <td><a href="{{ url('services') }}"><span> {{ $services['total'] }}</span></a></td>
                @endif
                @if($show_sensors)
                    <td><a href="{{ url('health') }}"><span class="green"> {{ $sensors['total'] }}</span></a></td>
                @endif
            </tr>
            </tbody>
        </table>
    </x-slot>
</x-panel>
