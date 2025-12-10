<?php

namespace App\Helpers;

/**
 * Time Helper - Converts time formats for user-friendly display
 */
class TimeHelper
{
    /**
     * Convert 24-hour time format (HH:MM) to 12-hour format with AM/PM
     *
     * @param string $time Time in 24-hour format (HH:MM)
     * @return string Time in 12-hour format with AM/PM (e.g., "2:30 PM")
     */
    public static function to12HourFormat($time)
    {
        // If time is empty or N/A, return as-is
        if (empty($time) || $time === 'N/A') {
            return $time;
        }

        try {
            // Parse the time string (format: HH:MM)
            $timestamp = strtotime($time);
            if ($timestamp === false) {
                return $time; // Return original if parsing fails
            }
            // Format to 12-hour with AM/PM (e.g., 2:30 PM)
            return date('g:i A', $timestamp);
        } catch (\Exception $e) {
            return $time; // Return original on error
        }
    }
}
