<?php

namespace App\Http\Controllers\Admin\Schedules;

use Exception;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Helpers\Response;
use App\Models\Admin\Language;
use App\Constants\LanguageConst;
use App\Models\Admin\SiteSections;
use App\Constants\SiteSectionConst;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\Schedules\ScheduleDay;
use App\Models\Admin\Schedules\DailySchedule;


class DailySchedulesController extends Controller
{
    protected $languages;

    public function __construct()
    {
        $this->languages = Language::whereNot('code', LanguageConst::NOT_REMOVABLE)->get();
    }

    public function index()
    {
        $page_title = __("Daily Schedules");
        $languages = $this->languages;
        $days = ScheduleDay::where('status', 1)->get();
        $schedules = DailySchedule::orderBy('id', 'asc')->paginate(10);
        $section_slug = Str::slug(SiteSectionConst::DAILY_SCHEDULE_SECTION);
        $data = SiteSections::getData($section_slug)->first();
        return view('admin.sections.schedule.daily-schedule', compact(
            'page_title',
            'languages',
            'days',
            'data',
            'schedules'
        ));
    }
    public function scheduleSectionUpdate(Request $request)
    {
        $basic_field_name = ['section_title' => "required|string|max:100", 'title' => "required|string|max:100", 'section_icon'   => "required|string|max:100"];

        $slug = Str::slug(SiteSectionConst::DAILY_SCHEDULE_SECTION);
        $section = SiteSections::where("key", $slug)->first();

        if ($section != null) {
            $section_data = json_decode(json_encode($section->value), true);
        } else {
            $section_data = [];
        }

        $section_data['language']  = $this->contentValidate($request, $basic_field_name);
        $update_data['value']  = $section_data;
        $update_data['key']    = $slug;

        try {
            SiteSections::updateOrCreate(['key' => $slug], $update_data);
        } catch (Exception $e) {
            return back()->with(['error' => [__('Something went wrong! Please try again.')]]);
        }

        return back()->with(['success' => [__('Schedule Section updated successfully!')]]);
    }
    public function scheduleItemStore(Request $request)
    {
        if ($request->type == "noLang") {
            $request->validate([
                'target'    => "required|string",
            ]);
            $validator = Validator::make($request->all(), [
                'link'            => "required|string|url|max:255",
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput()->with('modal', 'scheduleItem-add');
            }

            $validated = $validator->validate();

            $schedule = DailySchedule::where('id', $request->target)->first();

            if (!$schedule) return back()->with(['error' => [__('Schedule not found!')]]);

            $social_links = $schedule->social_links;

            if ($request->hasFile("icon_image")) {
                $image = upload_file($request->icon_image, 'junk-files');
                $upload_image = upload_files_from_path_dynamic([$image['dev_path']], 'schedule');
                delete_file($image['dev_path']);
            }
            $social_links[] = [
                'id' => uniqid(),
                'icon_image' => $upload_image,
                'link' => $validated['link'],
            ];
            $schedule->social_links = $social_links;
            try {
                $schedule->save();
            } catch (Exception $e) {
                return back()->with(['error' => [__('Something went wrong! Please try again')]]);
            }
        } else {
            $validator = Validator::make($request->all(), [
                'day_id'      => 'required|array',
                'day_id.*'    => 'integer',
                'name'        => 'required|string',
                'host'        => 'required|string',
                'description' => 'required|string',
                'status'     => 'required|boolean',
                'start_time'  => 'required',
                'end_time'    => 'required',
                'chat_link'   => 'required|string|url|max:255',
                'radio_link'  => 'required|string|url|max:255',
                'image'       => 'required|image|mimes:png,jpg,jpeg,svg,webp',
                'icon_image'        => "required|array",
                'icon_image.*'      => "required",
                'link'              => "required|array",
                'link.*'            => "required|string|url|max:255",
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput()->with('modal', 'schedule-add');
            }
            $validated = $validator->validate();
            $slugData = Str::slug($request->name);
            $admin = Auth::user();
            $baseData = [
                'admin_id'      => $admin->id,
                'slug'          => $slugData,
                'start_time'    => Carbon::parse($request->start_time),
                'end_time'      => Carbon::parse($request->end_time),
                'created_at'    => now(),
                'name'          => $validated['name'],
                'host'          => $validated['host'],
                'description'   => $validated['description'],
                'status'        => $validated['status'],
                'chat_link'     => $validated['chat_link'],
                'radio_link'    => $validated['radio_link'],
            ];

            // Handle image upload
            if ($request->hasFile('image')) {
                $image = get_files_from_fileholder($request, 'image');
                $upload = upload_files_from_path_dynamic($image, 'schedule');
                $baseData['image'] = $upload;
            }

            $social_links = [];
            foreach ($validated['icon_image'] as $key => $icon) {

                if ($request->hasFile("icon_image")) {
                    $image = upload_file($icon, 'junk-files');
                    $upload_image = upload_files_from_path_dynamic([$image['dev_path']], 'schedule');
                    delete_file($image['dev_path']);
                }
                $social_links[] = [
                    'id'            => uniqid(),
                    'icon_image'    => $upload_image,
                    'link'          => $validated['link'][$key] ?? "",
                ];
            }

            $baseData['social_links'] = $social_links;
            try {

                foreach ($validated['day_id'] as $dayId) {
                    $scheduleData = array_merge($baseData, ['day_id' => $dayId]);
                    DailySchedule::create($scheduleData);
                }
            } catch (Exception $e) {

                return back()->withErrors($validator)->withInput()->with(['error' => [__('Something went wrong! Please try again')]]);
            }
        }

        return back()->with(['success' => [__('Schedule added successfully!')]]);
    }
    public function scheduleEdit($id)
    {
        $page_title = __("Schedule Edit");
        $data = DailySchedule::findOrFail($id);
        $days = ScheduleDay::where('status', 1)->get();

        return view('admin.components.modals.schedule.edit-schedule-item', compact(
            'page_title',
            'data',
            'days',
            'id'
        ));
    }
    public function scheduleItemUpdate(Request $request)
    {
        $target = $request->target;
        $schedule = DailySchedule::where('id', $target)->first();

        if ($request->type == "noLang") {
            $request->validate([
                'target'    => "required",
                'target_item' => 'required',
            ]);
            $validator = Validator::make($request->all(), [
                'link_edit'            => "required|string|url|max:255",
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput()->with('modal', 'scheduleItem-edit');
            }

            $validated = $validator->validate();


            $social_links = json_decode(json_encode($schedule->social_links), true);

            $id_to_check = $request->target_item;
            $filtered_items = array_filter($social_links, function ($item) use ($id_to_check) {
                return $item['id'] === $id_to_check;
            });

            if (!empty($filtered_items)) {
                $filtered_item = reset($filtered_items);
                if ($request->hasFile("icon_image")) {
                    $image = upload_file($request->icon_image, 'junk-files');
                    $upload_image = upload_files_from_path_dynamic([$image['dev_path']], 'schedule');
                    delete_file($image['dev_path']);
                } else {
                    $upload_image = $filtered_item['icon_image'];
                }
                $social_link_updated = [
                    'id'            => $request->target_item,
                    'icon_image'    => $upload_image,
                    'link'          => $validated['link_edit'] ?? $filtered_item['link'],
                ];

                foreach ($social_links as $key => $social_link) {
                    if ($social_link['id'] === $request->target_item) {
                        $social_links[$key] = $social_link_updated;
                        break;
                    }
                }
                $schedule->social_links = $social_links;
            } else {
                return back()->with(['error' => [__('Social link item not found!')]]);
            }
            try {
                $schedule->save();
            } catch (Exception $e) {
                return back()->with(['error' => [__('Something went wrong! Please try again')]]);
            }
        } else {

            $validator = Validator::make($request->all(), [
                'day_id'      => 'required|integer',
                'status'      => 'required|boolean',
                'name'        => 'required|string',
                'host'        => 'required|string',
                'description' => 'required|string',
                'start_time'  => 'required',
                'end_time'    => 'required',
                'chat_link'   => 'required|string|url|max:255',
                'radio_link'  => 'required|string|url|max:255',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput()->with('modal', 'schedule-edit');
            }
            $validated = $validator->validate();
            $slugData = Str::slug($request->name);
            $admin = Auth::user();

            $validated['admin_id']      = $admin->id;
            $validated['day_id']        = $request->day_id;
            $validated['slug']          = $slugData;

            $validated['created_at']    = now();

            // Check Image File is Available or not
            if ($request->hasFile('image')) {
                $image = get_files_from_fileholder($request, 'image');
                $upload = upload_files_from_path_dynamic($image, 'schedule', $schedule->image);
                $validated['image'] = $upload;
            }

            try {
                $schedule->update($validated);
            } catch (Exception $e) {
                return back()->with(['error' => [__('Something went wrong! Please try again')]]);
            }
        }

        return redirect()->route('admin.schedule.index')->with(['success' => [__('Schedule updated successfully!')]]);
    }

    public function scheduleItemDelete(Request $request)
    {
        $request->validate([
            'target'    => 'required|string',
        ]);

        $schedule = DailySchedule::findOrFail($request->target);
        $image_name = $schedule->image;

        try {
            $schedule->delete();
            $remaining_schedules = DailySchedule::where('image', $image_name)->exists();


            if (!$remaining_schedules) {
                $image_link = get_files_path('schedule') . '/' . $image_name;
                delete_file($image_link);
            }
        } catch (Exception $e) {
            return back()->with(['error' => [__('Something went wrong! Please try again')]]);
        }

        return back()->with(['success' => [__('Schedule deleted successfully!')]]);
    }

    public function scheduleSocialItemDelete(Request $request, $id)
    {
        $request->validate([
            'target' => 'required|string',
        ]);

        $schedule = DailySchedule::findOrFail($id);
        $social_links = json_decode(json_encode($schedule->social_links), true);
        $id_to_check = $request->target;
        $filtered_items = array_filter($social_links, function ($item) use ($id_to_check) {
            return $item['id'] === $id_to_check;
        });
        if (!empty($filtered_items)) {
            $filtered_item = reset($filtered_items);

            try {
                $social_links = array_values(array_filter($social_links, function ($item) use ($id_to_check) {
                    return $item['id'] !== $id_to_check;
                }));

                $schedule->social_links = $social_links;
                $schedule->save();

                $image_links = DailySchedule::where('social_links', 'like', '%' . $filtered_item['icon_image'] . '%')->get();
                foreach ($image_links as $image) {
                    $image_link = get_files_path('schedule') . '/' . $image['icon_image'];
                    delete_file($image_link);
                }
            } catch (Exception $e) {
                return back()->with(['error' => [__('Something went wrong! Please try again')]]);
            }
            return back()->with(['success' => [__('Section Social item deleted successfully!')]]);
        }
    }
    public function scheduleLiveUpdate(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'is_live'                   => 'required|boolean',
            'data_target'               => 'required|string',
        ]);
        if ($validator->stopOnFirstFailure()->fails()) {
            $error = ['error' => $validator->errors()];
            return Response::error($error, null, 400);
        }
        $validated = $validator->safe()->all();
        $schedule_id = $validated['data_target'];

        $schedule = DailySchedule::where('id', $schedule_id)->first();
        if (!$schedule) {
            $error = ['error' => [__('Schedule record not found in our system.')]];
            return Response::error($error, null, 404);
        }

        try {
            $schedule->update([
                'is_live' => ($validated['is_live'] == true) ? false : true,
            ]);
        } catch (Exception $e) {
            $error = ['error' => [__('Something went wrong! Please try again')]];
            return Response::error($error, null, 500);
        }

        $success = ['success' => [__('Schedule Live Status updated successfully!')]];
        return Response::success($success, null, 200);
    }
    /**
     * Method for get languages form record with little modification for using only this class
     * @return array $languages
     */
    public function languages()
    {
        $languages = Language::whereNot('code', LanguageConst::NOT_REMOVABLE)->select("code", "name")->get()->toArray();
        $languages[] = [
            'name'      => LanguageConst::NOT_REMOVABLE_CODE,
            'code'      => LanguageConst::NOT_REMOVABLE,
        ];
        return $languages;
    }

    /**
     * Method for validate request data and re-decorate language wise data
     * @param object $request
     * @param array $basic_field_name
     * @return array $language_wise_data
     */
    public function contentValidate($request, $basic_field_name, $modal = null)
    {
        $languages = $this->languages();

        $current_local = get_default_language_code();
        $validation_rules = [];
        $language_wise_data = [];
        foreach ($request->all() as $input_name => $input_value) {
            foreach ($languages as $language) {
                $input_name_check = explode("_", $input_name);
                $input_lang_code = array_shift($input_name_check);
                $input_name_check = implode("_", $input_name_check);
                if ($input_lang_code == $language['code']) {
                    if (array_key_exists($input_name_check, $basic_field_name)) {
                        $langCode = $language['code'];
                        if ($current_local == $langCode) {
                            $validation_rules[$input_name] = $basic_field_name[$input_name_check];
                        } else {
                            $validation_rules[$input_name] = str_replace("required", "nullable", $basic_field_name[$input_name_check]);
                        }
                        $language_wise_data[$langCode][$input_name_check] = $input_value;
                    }
                    break;
                }
            }
        }
        if ($modal == null) {
            $validated = Validator::make($request->all(), $validation_rules)->validate();
        } else {
            $validator = Validator::make($request->all(), $validation_rules);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput()->with("modal", $modal);
            }
            $validated = $validator->validate();
        }

        return $language_wise_data;
    }

    /**
     * Method for validate request image if have
     * @param object $request
     * @param string $input_name
     * @param string $old_image
     * @return boolean|string $upload
     */
    public function imageValidate($request, $input_name, $old_image)
    {
        if ($request->hasFile($input_name)) {
            $image_validated = Validator::make($request->only($input_name), [
                $input_name         => "image|mimes:png,jpg,webp,jpeg,svg",
            ])->validate();

            $image = get_files_from_fileholder($request, $input_name);
            $upload = upload_files_from_path_dynamic($image, 'site-section', $old_image);
            return $upload;
        }

        return false;
    }
}
