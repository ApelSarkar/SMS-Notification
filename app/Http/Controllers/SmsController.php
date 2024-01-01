<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Twilio\Rest\Client;

class SmsController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function sendSms(Request $request)
    {
        $validatedData = $request->validate([
            'phone_number' => 'required|numeric',
            'message' => 'required|string',
        ]);

        try {
            $account_sid = "AC6bad48e*******************";
            $auth_token = "ff2b***************";
            $twilio_number = "+16565445";

            $client = new Client($account_sid, $auth_token);
            $client->messages->create('+88' . $validatedData['phone_number'], [
                'from' => $twilio_number,
                'body' => $validatedData['message']]);

            // Log success or return a response
            Log::info('SMS sent successfully!');
            return response()->json(['message' => 'SMS sent successfully!'], 200);

        } catch (Exception $e) {
            // Log the error
            dd($e->getMessage());
            Log::error("Error sending SMS: " . $e->getMessage());

            // Return an error response
            return response()->json(['error' => 'Failed to send SMS. Please try again.'], 500);

        }
    }

}
