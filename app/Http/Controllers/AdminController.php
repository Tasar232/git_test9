<?php

namespace App\Http\Controllers;

use App\Models\Ppe_worker;
use App\Models\Coordinator;
use App\Models\Education_organization;
use App\Models\Expert;
use App\Models\Municipalities;
use App\Models\Position_worker;
use App\Models\Student;
use App\Models\Subject;
use Experts;
use Illuminate\Http\Request;

function active_buttons($type, $request)
{
    return [
        "users" => $type == "users",
        "test" => $type == "test",
        "stats" => $type == "stats",
        "employers" => $request->query("category") == "employers",
        "students" => $request->query("category") == "students",
        "coordinators" => $request->query("category") == "coordinators",
        "experts" => $request->query("category") == "experts",
        "technical_spec" => $request->query("post") == "technical_spec",
        "boss" => $request->query("post") == "boss",
        "organiser" => $request->query("post") == "organiser",
        "nabludatel" => $request->query("post") == "nabludatel",
    ];
}

class AdminController extends Controller
{


    public static function users(Request $request)
    {
        $ppe_workers = Ppe_worker::query();
        $experts = Expert::query()->get();
        $students = Student::query()->get();
        $coordinators = Coordinator::query()->get();
        $all_users = [];
        if (!$request->get('category')) {
            $ppe_workers = $ppe_workers->get();
            $all_users = [
                'ppe_workers' => $ppe_workers,
                'experts' => $experts,
                'students' => $students,
                'coordinators' => $coordinators
            ];
        } else {
            switch ($request->query("category")) {
                case 'employers':
                    // if ($request->query("post")) {
                    //     $ppe_workers = $ppe_workers->where("position", $request->query("post"));
                    // }
                    $ppe_workers=$ppe_workers->get();
                    $all_users = [
                        'ppe_workers' => $ppe_workers,
                    ];
                    break;
                case 'experts':
                    $all_users = [
                        'experts' => $experts
                    ];
                    break;
                case 'student':
                    $all_users = [
                        'students' => $students
                    ];
                    break;
                case 'coordinators':
                    $all_users = [
                        'coordinators' => $coordinators
                    ];
                    break;
            }
        }
        //dd($all_users);
        //$objects=TestUser::query();
        // if ($request->query("category")) {
        //     $objects=$objects->where("category", $request->query("category"));
        //     if ($request->query("post")) {
        //         $objects=$objects->where("post", $request->query("post"));
        //     }
        // }

        //$objects=$objects->get();
        return view(
            'admin.admin_users',
            [
                "href" => "?part=users&",
                'all_users' => $all_users
            ],
            active_buttons("users", $request)
        );
    }

    public static function test(Request $request)
    {
        $positions = Position_worker::query()->get();
        $subjects = Subject::query()->get();
        $all_catigory = [];
        if (!$request->get('category')) {
            
        } else {
            switch ($request->query("category")) {
                case 'employers':
                    
                    break;
                case 'experts':
                    
                    break;
                case 'student':
                    
                    break;
                case 'coordinators':
                    
                    break;
            }
        }
        //$objects = TestUser::query();
        // if ($request->query("category")) {
        //     $objects = $objects->where("category", $request->query("category"));
        // }
        // $objects = $objects->get();

        return view(
            'admin.admin_test',
            [
                "href" => "?part=test&",
                'position' => $positions
            ],
            active_buttons("test", $request)
        );
    }

    public static function stats(Request $request)
    {
        if (!($request->get('category')) || ($request->get('category') == 'employers')) {
            // $objects = TestUser::query();
            // if ($request->query("category")) {
            //     $objects = $objects->where("category", $request->query("category"));
            //     if ($request->query("post")) {
            //         $objects = $objects->where("post", $request->query("post"));
            //     }
            // }
            // $objects = $objects->get();

            $html = 'admin.admin_stats_employers';
        } elseif ($request->get('category') == 'experts') {
            // $objects = TestUser::query();
            // if ($request->query("category")) {
            //     $objects = $objects->where("category", $request->query("category"));
            // }
            // $objects = $objects->get();


            $html = 'admin.admin_stats_experts';
        } elseif ($request->get('category') == 'students') {
            // $objects = TestUser::query();
            // if ($request->query("category")) {
            //     $objects = $objects->where("category", $request->query("category"));
            // }
            // $objects = $objects->get();


            $html = 'admin.admin_stats_students';
        }
        return view(
            $html,
            [
                "href" => "?part=stats&",
            ],
            active_buttons("stats", $request)
        );
    }

    public static function add_empl_view()
    {
        $position_workers = Position_worker::query()->get();
        $municipalities = Municipalities::query()->get();
        $ed_org = Education_organization::query()->get();
        //dd($position_workers);
        return view('admin.add_employer', [
            'positions' => $position_workers,
            'municipals' => $municipalities,
            'ed_orgs' => $ed_org
        ]);
    }
    public static function add_empl(Request $request)
    {
        return redirect('/admin?part=users&category=employers');
    }
}
