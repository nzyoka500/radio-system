@extends('admin.layouts.master')
@push('css')
    <style>
        .fileholder {
            min-height: 150px !important;
        }

        .fileholder-files-view-wrp.accept-single-file .fileholder-single-file-view,
        .fileholder-files-view-wrp.fileholder-perview-single .fileholder-single-file-view {
            height: 150px !important;
        }
    </style>
@endpush

@section('page-title')
    @include('admin.components.page-title', ['title' => __($page_title)])
@endsection

@section('breadcrumb')
    @include('admin.components.breadcrumb', [
        'breadcrumbs' => [
            [
                'name' => __('Dashboard'),
                'url' => setRoute('admin.dashboard'),
            ],
        ],
        'active' => __('Setup Section'),
    ])
@endsection

@section('content')
    <div class="custom-card">
        <div class="card-header">
            <h6 class="title">{{ __($page_title) }}</h6>
        </div>

        <div class="card-body">
            <form class="modal-form" method="POST" action="{{ setRoute('admin.schedule.update') }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="type" value="lang">
                <input type="hidden" name="target" value="{{ $id }}">
                <div class="row mb-10-none mt-3">

                    <div class="col-xl-12 col-lg-12 form-group mt-2">
                        <label for="day">{{ __('Day') }}*</label>
                        <select name="day_id" id="day" class="form--control nice-select" required>
                            @foreach ($days ?? [] as $day)
                                <option value="{{ $day->id }}" {{ $data->day_id == $day->id ? 'selected' : '' }}>
                                    {{ $day->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row mb-10-none">
                        <div class="col-xl-12 col-lg-12 form-group mt-2">
                            @include('admin.components.form.input', [
                                'label' => __('Event Name') . '*',
                                'name' => 'name',
                                'value' => $data->name,
                            ])
                        </div>
                        <div class="col-xl-12 col-lg-12 form-group mt-2">
                            @include('admin.components.form.input', [
                                'label' => __('Host') . '*',
                                'name' => 'host',
                                'value' => $data->host,
                            ])
                        </div>
                        <div class="col-xl-12 col-lg-12 form-group mt-2">
                            @include('admin.components.form.input', [
                                'label' => __('Description') . '*',
                                'name' => 'description',
                                'value' => $data->description,
                            ])
                        </div>
                        <div class="col-xl-12 col-lg-12 form-group mt-2">
                            @include('admin.components.form.input', [
                                'label' => __('Chat Link') . '*',
                                'name' => 'chat_link',
                                'value' => $data->chat_link,
                            ])
                        </div>
                        <div class="col-xl-12 col-lg-12 form-group mt-2">
                            @include('admin.components.form.input', [
                                'label' => __('Radio Link') . '*',
                                'name' => 'radio_link',
                                'value' => $data->radio_link,
                            ])
                        </div>
                        <div class="col-xl-12 col-lg-12 form-group mt-2">
                            @include('admin.components.form.input', [
                                'label' => __('Start Time') . '*',
                                'type' => 'time',
                                'name' => 'start_time',
                                'value' => $data->start_time,
                            ])
                        </div>
                        <div class="col-xl-12 col-lg-12 form-group mt-2">
                            @include('admin.components.form.input', [
                                'label' => __('End Time') . '*',
                                'type' => 'time',
                                'name' => 'end_time',
                                'value' => $data->end_time,
                            ])
                        </div>
                        <div class="col-xl-12 col-lg-12 form-group">
                            @include('admin.components.form.switcher', [
                                'label' => __('Status'),
                                'name' => 'status',
                                'value' => $data->status ?? 1,
                                'options' => ['Enable' => 1, 'Disable' => 0],
                            ])
                        </div>
                        <div class="col-xl-12 col-lg-12 form-group">
                            @include('admin.components.form.input-file', [
                                'label' => __('Image'),
                                'name' => 'image',
                                'class' => 'file-holder',
                                'old_files_path' => files_asset_path('schedule'),
                                'old_files' => $data->image,
                            ])
                        </div>
                        <div class="col-xl-12 col-lg-12 form-group">
                            <button type="submit" class="btn btn--base w-100">{{ __('Update') }}</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>

    <div class="table-area mt-15">
        <div class="table-wrapper">
            <div class="table-header justify-content-end">
                <div class="table-btn-area">
                    <a href="#scheduleItem-add" class="btn--base modal-btn"><i class="fas fa-plus me-1"></i>
                        {{ __('Add Schedule Social Item') }}</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>{{ __('Icon') }}</th>
                            <th>{{ __('Link') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data->social_links ?? [] as $key => $item)
                            <tr data-item="{{ json_encode($item) }}">
                                <td><a href="{{ $item->link ?? '' }}" target="_blank">

                                        <ul class="user-list">
                                            <li><img src="{{ get_image($item->icon_image, 'schedule') }}" alt="product">
                                            </li>
                                        </ul>
                                    </a></td>
                                <td><a href="{{ $item->link ?? '' }}" target="_blank">{{ $item->link ?? '' }}</a></td>
                                <td>
                                    <button class="btn btn--base edit-modal-button"><i
                                            class="las la-pencil-alt"></i></button>
                                    <button class="btn btn--base btn--danger delete-modal-button"><i
                                            class="las la-trash-alt"></i></button>
                                </td>
                            </tr>
                        @empty
                            @include('admin.components.alerts.empty', ['colspan' => 4])
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.components.modals.site-section.add-schedule-social-icon', compact('id'))

    {{-- Schedule Item Edit Modal --}}
    <div id="scheduleItem-edit" class="mfp-hide large">
        <div class="modal-data">
            <div class="modal-header px-0">
                <h5 class="modal-title">{{ __('Edit Schedule Social Icon') }}</h5>
            </div>
            <div class="modal-form-data">
                <form class="modal-form" method="POST" action="{{ setRoute('admin.schedule.update') }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="type" value="noLang">
                    <input type="hidden" name="target" value="{{ $id }}">
                    <input type="hidden" name="target_item" value="{{ old('target') }}">
                    <div class="row mb-10-none mt-3">
                        <div class="form-group">
                            @include('admin.components.form.input', [
                                'label' => __('Link') . '*',
                                'name' => 'link_edit',
                                'value' => old('link_edit', $data->social_links->link ?? ''),
                            ])
                        </div>
                        <div class="form-group">
                            @include('admin.components.form.input-file', [
                                'label' => __('Icon Image'),
                                'name' => 'icon_image',
                                'class' => 'file-holder',
                                'old_files_path' => files_asset_path('schedule'),
                                'old_files' => old('old_image'),
                            ])
                        </div>
                        <div class="col-xl-12 col-lg-12 form-group d-flex align-items-center justify-content-between mt-4">
                            <button type="button" class="btn btn--danger modal-close">{{ __('Cancel') }}</button>
                            <button type="submit" class="btn btn--base">{{ __('Update') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        openModalWhenError("scheduleItem-add", "#scheduleItem-add");
        openModalWhenError("scheduleItem-edit", "#scheduleItem-edit");

        $(".edit-modal-button").click(function() {
            var oldData = JSON.parse($(this).parents("tr").attr("data-item"));
            var editModal = $("#scheduleItem-edit");

            editModal.find("form").first().find("input[name=target_item]").val(oldData.id);
            editModal.find("input[name=link_edit]").val(oldData.link);
            editModal.find("input[name=icon_image]").attr("data-preview-name", oldData.icon_image);

            fileHolderPreviewReInit("#scheduleItem-edit input[name=icon_image]");
            openModalBySelector("#scheduleItem-edit");

        });

        $(".delete-modal-button").click(function() {
            var oldData = JSON.parse($(this).parents("tr").attr("data-item"));
            var actionRoute = "{{ setRoute('admin.schedule.social.item.delete', [$id]) }}";
            var target = oldData.id;
            var message = `Are you sure to <strong>delete</strong> item?`;

            openDeleteModal(actionRoute, target, message);
        });
    </script>
@endpush
