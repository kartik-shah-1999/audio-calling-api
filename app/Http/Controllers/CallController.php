<?php

namespace App\Http\Controllers;

use App\Models\Call;
use Illuminate\Http\Request;

class CallController extends Controller
{
    public function start(Request $request) {
        $request->validate(['receiver_id' => 'required|exists:users,id']);

        $userId = $request->user()->id;
        if (Call::where('caller_id', $userId)->where('status', '!=', 'ended')->exists()) {
            return response()->json(['message' => 'You have an active call'], 400);
        }

        $call = Call::create([
            'caller_id' => $userId,
            'receiver_id' => $request->receiver_id,
            'status' => 'initiated'
        ]);

        return response()->json($call);
    }

    public function respond(Request $request) {
            $request->validate(['call_id' => 'required|exists:calls,id', 'response' => 'required|in:accepted,rejected']);

            $call = Call::findOrFail($request->call_id);
            $call->status = $request->response;
            $call->started_at = now();
            $call->save();

            return response()->json($call);
        }

    public function end(Request $request) {
            $request->validate(['call_id' => 'required|exists:calls,id']);

            $call = Call::findOrFail($request->call_id);
            $call->status = 'ended';
            $call->ended_at = now();
            $call->save();

            return response()->json(['message' => 'Call ended']);
        }

}
