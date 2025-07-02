<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Plugin administration pages are defined here.
 *
 * @package     tiny_aic
 * @category    admin
 * @copyright   2023 DeveloperCK <developerck@gmail.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {
    if ($ADMIN->fulltree) {


        $settings->add(new admin_setting_configtext(
            'tiny_aic/apikey',
            get_string('apikey', 'tiny_aic'),
            get_string('apikeydesc', 'tiny_aic'),
            '',
            PARAM_TEXT
        ));

        $settings->add(new admin_setting_configcheckbox(
            'tiny_aic/allowed_admin',
            new lang_string('allowed_admin', 'tiny_aic'),
            new lang_string('allowed_admin_desc', 'tiny_aic'),
            '1'

        ));

        // Get roles at system level.
        $roles = get_all_roles(\context_system::instance());

        foreach ($roles as $role) {
            $roles[$role->id] = $role->shortname;
        }

        $settings->add(new admin_setting_pickroles(
            'tiny_aic/allowed_role',
            new lang_string('allowed_role', 'tiny_aic'),
            new lang_string('allowed_role_desc', 'tiny_aic'),
            '',
            $roles
        ));


        // Advanced Settings.

        $settings->add(new admin_setting_heading(
            'tiny_aic/advanced',
            get_string('advanced', 'tiny_aic'),
            get_string('advanceddesc', 'tiny_aic')
        ));

        $settings->add(new admin_setting_configselect(
            'tiny_aic/model',
            get_string('model', 'tiny_aic'),
            get_string('modeldesc', 'tiny_aic'),
            'gpt-3.5-turbo-instruct',
            [

                'text-davinci-003' => 'text-davinci-003',
                'gpt-3.5-turbo-instruct' => 'gpt-3.5-turbo-instruct',

            ]
        ));

        $settings->add(new admin_setting_configtext(
            'tiny_aic/temperature',
            get_string('temperature', 'tiny_aic'),
            get_string('temperaturedesc', 'tiny_aic'),
            0.5,
            PARAM_FLOAT
        ));

        $settings->add(new admin_setting_configtext(
            'tiny_aic/maxlength',
            get_string('maxlength', 'tiny_aic'),
            get_string('maxlengthdesc', 'tiny_aic'),
            200,
            PARAM_INT
        ));

        $settings->add(new admin_setting_configtext(
            'tiny_aic/topp',
            get_string('topp', 'tiny_aic'),
            get_string('toppdesc', 'tiny_aic'),
            1,
            PARAM_FLOAT
        ));

        $settings->add(new admin_setting_configtext(
            'tiny_aic/frequency',
            get_string('frequency', 'tiny_aic'),
            get_string('frequencydesc', 'tiny_aic'),
            1,
            PARAM_FLOAT
        ));

        $settings->add(new admin_setting_configtext(
            'tiny_aic/presence',
            get_string('presence', 'tiny_aic'),
            get_string('presencedesc', 'tiny_aic'),
            1,
            PARAM_FLOAT
        ));
    }
}
