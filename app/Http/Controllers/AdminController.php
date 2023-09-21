<?php

namespace App\Http\Controllers;

use App\Services\GameService;
use Illuminate\Http\Request;
use App\Models\User;


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

            $query = User::where('role_type', USER_ROLES['USER']);

            if ($request->has('search') && !empty($request->input('search')['value'])) {
                $searchTerm = $request->input('search')['value'];

                $query->where(function ($query) use ($searchTerm) {
                    $query->where('email', 'like', "%$searchTerm%")
                        ->orWhere('referral_key', 'like', "%$searchTerm%");
                });
            }

            $totalRows = $query->count();
            $offset = $request->input('start');

            $users = $query->skip($request->input('start'))
                ->take($request->input('length'))
                ->get();


            $users = $query->skip($request->input('start'))
                ->take($request->input('length'))
                ->get();

            return DataTables()::of($users)
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
                ->setTotalRecords($totalRows)
                ->setFilteredRecords($totalRows)
                ->setOffset($offset)
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
