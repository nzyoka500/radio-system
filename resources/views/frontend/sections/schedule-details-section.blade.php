@isset($schedule)
<div class="container">
    <div class="row justify-content-center ptb-80">
        <div class="col-lg-6">
            <div class="schedule-details-item">
                <div class="schedule-details-thumb">
                    <img src="{{ get_image($schedule->image, 'schedule') }}" alt="Schedule Image">
                </div>
                <div class="schedule-details-content">
                    <h3>{{ __('Weekend Wake-Up Call') }}</h3>
                    <span>{{ __('Hosted by') }} {{ $schedule->host }}</span>
                    <p>{{ $schedule->description }}</p>
                    <div class="schedule-details-time">
                        <span><b>{{ __('Start Time') }}:</b> {{ $schedule->start_time }}</span>
                        <span><b>{{ __('End Time') }}:</b> {{ $schedule->end_time }}</span>
                    </div>
                    <div class="schedule-details-links">
                        @forelse($schedule->social_links ?? [] as $link)
                            <a href="{{ $link->link }}" target="_blank">
                                <img src="{{ get_image($link->icon_image, 'schedule') }}" alt="Social Icon">
                            </a>
                        @empty
                            <p>{{ __("No social links available") }}</p>
                        @endforelse
                    </div>
                    <div class="schedule-details-button">
                        <a href="{{ $schedule->chat_link }}" class="btn w-50 btn-primary">{{ __('Join Chat') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endisset
