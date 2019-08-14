<?php
//
//namespace App\Http\Controllers;
//
//use Illuminate\Http\Request;
//
//class Messages extends Controller
//{
//    public function postMessage(Request $request)
//    {
//        DB::table('student.jazminbelmonte_feed')->insert(
//            [
//                'message' => e($request->input('chat_message')),
//                'create_dttm' => (time()*1000),
//                'user' => e($request->input('chat_user')),
//                'user_ip' => request()->ip()
//            ]
//        );
//    }
//
//    public function getMessage()
//    {
//        return response()->json(['data'=>DB::table('student.jazminbelmonte_feed')->get()]);
//    }
//
//}

