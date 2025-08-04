<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\user;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Events\eventproject;

class ProjController extends Controller
{
    use AuthorizesRequests;

    public function dashboard() {
        return view('projects.index');
    }

    public function ProjPage(Request $request) {

        $query = Project::query();

        if ($request->has('title')) {
            $query->where('title', 'like', '%'.$request->input('title').'%');
        }

        if ($request->has('description')) {
            $query->where('description', 'like', '%'.$request->input('description').'%');
        }

        if ($request->has('skills')) {
            $query->where('skills', 'like', '%'.$request->input('skills').'%');
        }

        if ($request->has('additions')) {
            $query->where('additions', 'like', '%'.$request->input('additions').'%');
        }

        $userid = auth()->id();
        $query->where('user_id', $userid);

        $Projects = $query->paginate(3);

        return view('projects.projPage', compact('Projects'));
    }

    public function ProjCreate() {
        return view('projects.ProjCreate');
    }

    public function ProjStore(Request $request) {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'skills' => 'required',
            'additions' => 'required',
        ]);
        $data['user_id'] = auth()->id();

        $user = auth()->user();
        $project = Project::create($data);

        event(new eventproject($user, $project));
        return redirect()->route('ProjPage');
    }

    public function ProjShow(Project $Project) {
        if (Gate::denies('project', $Project)) {
            abort(403);
        }

        return view('projects.ProjShow', compact('Project'));
    }

    public function ProjUpdate(Project $Project) {
        $this->authorize('update', $Project);

        return view('projects.ProjUpdate', compact('Project'));
    }

    public function ProjEdit(Request $request ,Project $Project) {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'skills' => 'required',
            'additions' => 'required',

        ]);

        $Project->update($data);
        return redirect()->route('ProjPage');
    }

    public function ProjDelete(Project $Project) {
        $Project->delete();
        return redirect()->route('ProjPage');
    }
}
