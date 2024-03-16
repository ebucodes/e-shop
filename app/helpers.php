<?php

use App\Helpers\ResponseStatusCodes;
use App\Models\Activity;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\JWTGuard;

if (!function_exists('logAction')) {
    function logAction($email, $action, $description, $ipAddress, $userAgent)
    {
        Activity::create([
            'user' => $email,
            'action' => $action,
            'description' => $description,
            'ip' => $ipAddress,
            'userAgent' => $userAgent
        ]);
    }
}


if (!function_exists('prettifyJson')) {
    function prettifyJson(array $data)
    {

        // Format JSON for better readability
        $formattedJson = json_encode($data, JSON_PRETTY_PRINT);

        // Remove curly braces
        $formattedJson = str_replace(['{', '}'], '', $formattedJson);

        return nl2br($formattedJson);
    }
}

if (!function_exists('formatDate')) {
    function formatDate($inputDate)
    {
        if (!$inputDate) {
            return '';
        }

        try {
            $dateTime = new DateTime($inputDate);
            return $dateTime->format('F j, Y');
        } catch (\Throwable $th) {
            return $inputDate;
        }
    }
}

if (!function_exists('formatTime')) {
    function formatTime($inputTime)
    {
        if (!$inputTime) {
            return '';
        }

        try {
            $dateTime = new DateTime($inputTime);
            return $dateTime->format('g A');
        } catch (\Throwable $th) {
            return $inputTime;
        }
    }
}


if (!function_exists('formatNumber')) {
    function formatNumber($amount)
    {
        return number_format($amount, 2);
    }
}
