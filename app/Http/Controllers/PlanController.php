<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Events\eventtask;

class PlanController extends Controller
{
    use AuthorizesRequests;


    public function PlanIndex(Request $request) {
        $query = task::query();

        if ($request->has('title')) {
            $query->where('title', 'like', '%' . $request->input('title') . '%');
        }

        if ($request->has('description')) {
            $query->where('description', 'like', '%' . $request->input('description') . '%');
        }

        $userid = auth()->id();
        $query->where('user_id', $userid);

        $Tasks = $query->paginate(3);

        return view('plan.PlanIndex', compact('Tasks'));
    }

    public function PlanCreatePage() {
        return view('plan.PlanCreatePage');
    }

    public function planStore(Request $request) {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $data['user_id'] = auth()->id();

        $user = auth()->user();
        $task = task::create($data);

        event(new eventtask($task, $user));
        return redirect()->route('PlanIndex');
    }

    public function PlanShow(task $Task)
    {
        return view('plan.PlanShow', compact('Task'));
    }

    public function Planedit(task $Task) {
        $this->authorize('update_plan', $Task);

        return view('plan.PlanEdit', compact('Task'));
    }

    public function PlanUpdate(Request $request, task $Task) {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $Task->update($data);
        return redirect()->route('PlanIndex');
    }

    public function PlanDelete(task $Task) {

        $Task->delete();
        return redirect()->route('PlanIndex');
    }

}
