<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }

    public function login(LoginRequest $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $member = Member::query()
            ->where('username', $username)
            ->where('password', $password)->first()->makeHidden(['password'])->toArray();

        $member['user'] = [
            'date' => $member['date'],
            'money' => $member['money'],
        ];

        if ($member){
            return Response()->json([
                'success' => true,
                'message' => '登录成功',
                'data' => $member
            ]);
        }else{
            return Response()->json([
                'success' => false,
                'message' => '账号或密码错误',
                'data' => []
            ]);
        }
    }

    public function register(RegisterRequest $request)
    {
        $member = $request->input('json');
        $member = json_decode($member, true);
        $member['created_at'] = now();
        $member['date'] = date('Y-m-d', time());
        $member['money'] = 1000;
        $member['user'] = [
            'date' => $member['date'],
            'money' => $member['money'],
        ];
        $member['token'] = md5($member['username'].$member['password'].time());
        $result = Member::query()->insert($member);

        if ($result) {
            return Response()->json([
                'success' => true,
                'message' => '注册成功',
                'data' => $member
            ]);
        }else{
            return Response()->json([
                'success' => false,
                'message' => '注册失败',
                'data' => []
            ]);
        }
    }
}
