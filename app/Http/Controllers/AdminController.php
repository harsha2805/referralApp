<?php

namespace App\Http\Controllers;

use App\Services\GameService;
use Illuminate\Http\Request;
use App\Models\User;

use DataTables;

class AdminController extends Controller
{
    protected $gameService;

    public function __construct(GameService $gameService)
    {
        $this->gameService = $gameService;
        $this->middleware('verify.admin_user');
    }

    public function dashboard(Request $request)
    {
        if ($request->ajax()) {
            $users = User::where('role_type', USER_ROLES['USER'])->get();
            return Datatables::of($users)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" class="edit btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                })
                ->addColumn('current_position', function ($row) {
                    $userEmail = $row->email;
                    return $this->gameService->currentPosition($userEmail);
                })
                ->addColumn('referrers', function ($row) {
                    return $this->gameService->calculateReferrersCount($row);
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.dashboard');
    }

    public function deleteUser(Request $request)
    {
        try {
            $userId = $request->user;
            $user = User::find($userId);

            if ($user) {
                $user->delete();
                return ['response' => 'true'];
            }
            return ['error' => 'true'];
        } catch (\Exception $ex) {
            return ['error' => 'true'];
        }
    }
}
