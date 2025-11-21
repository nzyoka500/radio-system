@isset($team_member)
<div class="container">
    <div class="team-member ptb-60">
        <div class="team-member-inner">
            <div class="team-member-image">
                <img src="{{ get_image($team_member->image, 'site-section') }}" alt="{{ $team_member->language->$lang->item_name ?? $team_member->language->$default->item_name }}">
                <div class="team-member-social">
                    @foreach($team_member->social_links as $link)
                        <a target="_blank" href="{{ $link->link }}"><img src="{{ get_image($link->icon_image, 'site-section') }}" alt="{{ $link->id }}"></a>
                    @endforeach
                </div>
            </div>
            <div class="team-member-content">
                <div class="team-member-details">
                    <h3>{{ $team_member->language->$lang->item_name ?? $team_member->language->$default->item_name }}</h3>
                    <p> - {{ $team_member->language->$lang->item_designation ?? $team_member->language->$default->item_designation }}</p>
                </div>
                <p>{{ $team_member->language->$lang->item_about ?? $team_member->language->$default->item_about ?? '' }}</p>
            </div>
        </div>
    </div>
</div>
@endisset
