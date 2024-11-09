<?php defined('BASEPATH') or exit('No direct script access allowed');
$date_formats = get_available_date_formats();
?>
<div class="form-group">
    <label for="dateformat" class="control-label"><?php echo _l('settings_localization_date_format'); ?></label>
    <select name="settings[saas_dateformat]" id="dateformat" class="form-control selectpicker" data-none-selected-text="<?php echo _l('dropdown_non_selected_tex'); ?>">
        <?php foreach($date_formats as $key => $val){ ?>
            <option value="<?php echo $key; ?>" <?php if($key == get_option('saas_dateformat')){echo 'selected';} ?>><?php echo $val; ?></option>
        <?php } ?>
    </select>
</div>
<hr />
<div class="form-group">
    <label for="time_format" class="control-label"><?php echo _l('time_format'); ?></label>
    <select name="settings[saas_time_format]" id="time_format" class="form-control selectpicker" data-none-selected-text="<?php echo _l('dropdown_non_selected_tex'); ?>">
        <option value="24" <?php if('24' == get_option('saas_time_format')){echo 'selected';} ?>><?php echo _l('time_format_24'); ?></option>
        <option value="12" <?php if('12' == get_option('saas_time_format')){echo 'selected';} ?>><?php echo _l('time_format_12'); ?></option>
    </select>
</div>
<hr />
<div class="form-group">
    <label for="timezones" class="control-label"><?php echo _l('settings_localization_default_timezone'); ?></label>
    <select name="settings[saas_default_timezone]" id="timezones" class="form-control selectpicker" data-none-selected-text="<?php echo _l('dropdown_non_selected_tex'); ?>" data-live-search="true">
        <?php foreach(get_timezones_list() as $key => $timezones){ ?>
            <optgroup label="<?php echo $key; ?>">
                <?php foreach($timezones as $timezone){ ?>
                    <option value="<?php echo $timezone; ?>" <?php if(get_option('saas_default_timezone') == $timezone){echo 'selected';} ?>><?php echo $timezone; ?></option>
                <?php } ?>
            </optgroup>
        <?php } ?>
    </select>
</div>
<hr />
<div class="form-group">
    <label for="saas_active_language" class="control-label"><?php echo _l('settings_localization_default_language'); ?></label>
    <select name="settings[saas_active_language]" data-live-search="true" id="saas_active_language" class="form-control selectpicker" data-none-selected-text="<?php echo _l('dropdown_non_selected_tex'); ?>">
        <?php foreach($this->app->get_available_languages() as $availableLanguage){
            $subtext = hooks()->apply_filters('settings_language_subtext', '', $availableLanguage);
            ?>
            <option value="<?php echo $availableLanguage; ?>" data-subtext="<?php echo $subtext; ?>" <?php if($availableLanguage == get_option('saas_active_language')){echo ' selected'; } ?>><?php echo ucfirst($availableLanguage); ?></option>
        <?php } ?>
    </select>
</div>