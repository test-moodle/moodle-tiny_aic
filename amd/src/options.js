import {getPluginOptionName} from 'editor_tiny/options';
import {pluginName} from './common';

// Helper variables for the option names.
const allowed = getPluginOptionName(pluginName, 'allowed');

/**
 * Options registration function.
 *
 * @param {tinyMCE} editor
 */
export const register = (editor) => {
    const registerOption = editor.options.register;

    // For each option, register it with the editor.
    // Valid type are defined in https://www.tiny.cloud/docs/tinymce/6/apis/tinymce.editoroptions/
    registerOption(allowed, {
        processor: 'boolean',
        "default": false,
    });
};

/**
 * Fetch the myFirstProperty value for this editor instance.
 *
 * @param {tinyMCE} editor The editor instance to fetch the value for
 * @returns {object} The value of the myFirstProperty option
 */
export const isAllowed = (editor) => editor.options.get(allowed);