<?php

namespace App\Http\Controllers;

//use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use App\Models\Skills;
use Illuminate\Support\Facades\Gate;
use App\Policies\UpdatePolicy;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Events\eventskills;


class SkillController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request ,Skills $Skills) {

        $query = $Skills::query();

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }
        if ($request->has('level')) {
            $query->where('level', 'like', '%' . $request->input('level') . '%');
        }

        $userid = auth()->id();
        $query->where("user_id", $userid)->get();

        $Skills = $query->paginate(3);

        return view('Skill.Index', compact('Skills'));
    }

    public function SkillCreate() {
        return view('Skill.Create');
    }

    public function SkillStore(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'level' => 'required',
        ]);

        $data['user_id'] = auth()->id();

        $user = auth()->user();
        $skill = Skills::create($data);

        event(new eventskills($user,$skill));
        return redirect()->route('SkillIndex');
    }

    public function SkillShow(Skills $Skill) {
        if (Gate::denies('skill', $Skill)) {
            abort(403);
        }
        return view('Skill.show', compact('Skill'));
    }

    public function SkillEdit(Skills $Skill) {
        $this->authorize('update', $Skill);

        return view('Skill.Update', compact('Skill'));
    }

    public function Skillupdate(Request $request, Skills $Skill) {
        if (Gate::denies('update', $Skill)) {
            abort(403);
        }
        $data = $request->validate([
            'name' => 'required',
            'level' => 'required',
        ]);
        $Skill->update($data);
        return redirect()->route('SkillIndex');
    }

    public function SkillDelete(Skills $Skill) {
        $Skill->delete();
        return redirect()->route('SkillIndex');
    }
}
