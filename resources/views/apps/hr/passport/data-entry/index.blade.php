<!-- start passport content -->
<x-app-layout>
    @php
        $url = '/apps/hr/passport/data-entry/{id}/edit/';
        $action_icons = [
            "icon:pencil | click:redirect('{$url}')",
        ];
    @endphp

    @include('apps.hr.passport.data-entry.partials.submenu')
    <div class="flex justify-left">
        <div class="w-30">
            <x-bladewind::table 
                compact="true" 
                divider="thin" 
                :data="$passportDataEntries"
                include_columns="id, file_name"
                no_data_message="The passport data is empty"
                :action_icons="$action_icons"
                >
        
            </x-bladewind::table>
        </div>
    </div>
</x-app-layout>



<!-- end passport content -->