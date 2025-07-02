<?php
defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/externallib.php');

class tiny_aic_external extends external_api {

    /**
     * Returns description of method parameters
     * @return external_function_parameters
     */
    public static function get_generated_text_parameters() {
        return new external_function_parameters(
            array(
                'prompt' => new external_value(PARAM_RAW, 'The prompt for AI generation.')
            )
        );
    }

    /**
     * Get AI generated text based on prompt.
     * @param string $prompt The user's prompt.
     * @return array The generated text.
     * @throws moodle_exception
     */
    public static function get_generated_text($prompt) {
        self::validate_parameters(self::get_generated_text_parameters(),
            ['prompt' => $prompt]);

        // Perform your AI generation logic here based on $prompt.
        // For demonstration:
        $generatedtext =  tiny_aic\ai::generate_text($prompt);

        return ['generatedtext' => $generatedtext];
    }


    /**
     * Returns description of method result value
     * @return external_description
     */
    public static function get_generated_text_returns() {
        return new external_single_structure(
            array(
                'generatedtext' => new external_value(PARAM_RAW, 'The generated text from AI.')
            )
        );
    }
}