@if (admin_permission_by_name('admin.schedule.store'))
    <div id="schedule-add" class="mfp-hide large">
        <div class="modal-data">
            <div class="modal-header px-0">
                <h5 class="modal-title">{{ __('Add Schedule') }}</h5>
            </div>
            <div class="modal-form-data">
                <form class="modal-form" method="POST" action="{{ setRoute('admin.schedule.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-10-none mt-3">

                        <div class="col-xl-12 col-lg-12 form-group mt-2">
                            <label for="day">{{ __('Day') }}*</label>
                            <select name="day_id[]" id="day" class="form--control select2-multi-select" required
                                multiple data-placeholder="{{ __('Select Day') }}">
                                @foreach ($days ?? [] as $key => $day)
                                    <option value="{{ $day->id }}">{{ $day->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-12 col-lg-12 form-group mt-2">
                            @include('admin.components.form.input', [
                                'label' => __('Event Name') . '*',
                                'name' => 'name',
                                'value' => old('name'),
                            ])
                        </div>
                        <div class="col-xl-12 col-lg-12 form-group mt-2">
                            @include('admin.components.form.input', [
                                'label' => __('Host') . '*',
                                'name' => 'host',
                                'value' => old('host'),
                            ])
                        </div>
                        <div class="col-xl-12 col-lg-12 form-group mt-2">
                            @include('admin.components.form.input', [
                                'label' => __('Description') . '*',
                                'name' => 'description',
                                'value' => old('description'),
                            ])
                        </div>
                        <div class="col-xl-12 col-lg-12 form-group mt-2">
                            @include('admin.components.form.input', [
                                'label' => __('Chat Link') . '*',
                                'name' => 'chat_link',
                                'value' => old('chat_link'),
                            ])
                        </div>
                        <div class="col-xl-12 col-lg-12 form-group mt-2">
                            @include('admin.components.form.input', [
                                'label' => __('Radio Link') . '*',
                                'name' => 'radio_link',
                                'value' => old('radio_link'),
                            ])
                        </div>
                        <div class="col-xl-12 col-lg-12 form-group mt-2">
                            @include('admin.components.form.input', [
                                'label' => __('Start Time') . '*',
                                'type' => 'time',
                                'name' => 'start_time',
                                'value' => old('start_time'),
                            ])
                        </div>
                        <div class="col-xl-12 col-lg-12 form-group mt-2">
                            @include('admin.components.form.input', [
                                'label' => __('End Time') . '*',
                                'type' => 'time',
                                'name' => 'end_time',
                                'value' => old('end_time'),
                            ])
                        </div>
                        <div class="col-xl-12 col-lg-12 form-group">
                            @include('admin.components.form.switcher', [
                                'label' => __('Status'),
                                'name' => 'status',
                                'value' => old('status', '1'),
                                'options' => ['Enable' => '1', 'Disable' => '0'],
                            ])
                        </div>
                        <div class="col-xl-12 col-lg-12 form-group">
                            @include('admin.components.form.input-file', [
                                'label' => __('Image'),
                                'name' => 'image',
                                'class' => 'file-holder',
                                'old_files_path' => files_asset_path('site-section'),
                                'old_files' => $data->value->items->image ?? '',
                            ])
                        </div>
                        <div class="col-xl-12 col-lg-12 form-group">
                            <div class="custom-inner-card input-field-generator"
                                data-source="setup_section_footer_social_link_input">
                                <div class="card-inner-header">
                                    <h6 class="title">{{ __('Social Links') }}</h6>
                                    <button type="button" class="btn--base add-row-btn"><i class="fas fa-plus"></i>
                                        {{ __('Add') }}</button>
                                </div>
                                <div class="card-inner-body">
                                    <div class="results">
                                        @php
                                            $social_links = $data->value->contact->social_links ?? [];
                                        @endphp
                                        @forelse ($social_links as $item)
                                            <div class="row align-items-end">
                                                <div class="col-xl-3 col-lg-3 form-group">
                                                    @include('admin.components.form.input-file', [
                                                        'label' => __('Icon Image'),
                                                        'name' => 'icon_image[]',
                                                        'class' => 'avatar-preview',
                                                    ])
                                                </div>
                                                <div class="col-xl-3 col-lg-3 form-group">
                                                    <img class="preview-container" src="{{ get_image($item) }}">
                                                </div>
                                                <div class="col-xl-4 col-lg-4 form-group">
                                                    @include('admin.components.form.input', [
                                                        'label' => __('Link') . '*',
                                                        'name' => 'link[]',
                                                        'value' => $item->link ?? '',
                                                    ])
                                                </div>
                                                <div class="col-xl-1 col-lg-1 form-group">
                                                    <button type="button"
                                                        class="custom-btn btn--base btn--danger row-cross-btn w-100"><i
                                                            class="las la-times"></i></button>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="row align-items-end">
                                                <div class="col-xl-3 col-lg-3 form-group">
                                                    @include('admin.components.form.input-file', [
                                                        'label' => __('Icon Image'),
                                                        'name' => 'icon_image[]',
                                                        'class' => 'avatar-preview',
                                                    ])
                                                </div>
                                                <div class="col-xl-3 col-lg-3 form-group">
                                                    <img class="preview-container" src="">
                                                </div>
                                                <div class="col-xl-4 col-lg-4 form-group">
                                                    @include('admin.components.form.input', [
                                                        'label' => __('Link') . '*',
                                                        'name' => 'link[]',
                                                    ])
                                                </div>
                                                <div class="col-xl-1 col-lg-1 form-group">
                                                    <button type="button"
                                                        class="custom-btn btn--base btn--danger row-cross-btn w-100"><i
                                                            class="las la-times"></i></button>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-xl-12 col-lg-12 form-group d-flex align-items-center justify-content-between mt-4">
                            <button type="button" class="btn btn--danger modal-close">{{ __('Cancel') }}</button>
                            <button type="submit" class="btn btn--base">{{ __('Add') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif

@push('script')
<script>

    $(document).ready(function() {
        $(document).on('change', '.avatar-preview', function() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var imageDataUrl = e.target.result;
                    console.log(imageDataUrl);
                    $(input).closest('.row').find('.preview-container').attr('src', imageDataUrl);
                }
                reader.readAsDataURL(input.files[0]);
            }
        });
    });

    </script>
@endpush
