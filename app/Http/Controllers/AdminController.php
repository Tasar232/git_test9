<?php

namespace App\Http\Controllers;

use App\Models\ClearLoginUser;
use App\Models\User;
use App\Models\Ppe_worker;
use App\Models\Coordinator;
use App\Models\Education_organization;
use App\Models\Expert;
use App\Models\Municipality;
use App\Models\Position_worker;
use App\Models\Student;
use App\Models\Subject;
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
        "technical_spec" => $request->query("post") == "2",
        "boss" => $request->query("post") == "1",
        "organiser" => $request->query("post") == "3",
        "nabludatel" => $request->query("post") == "4",
    ];
}

class AdminController extends Controller
{


    public static function users(Request $request)
    {
        $position_workers = Position_worker::query()->get();
        $positions = array();
        $positions_id = array();
        foreach ($position_workers as $pos) {
            $positions[] = $pos->name;
            $positions_id[] = $pos->id;
        }

        $ppe_workers = Ppe_worker::query();
        $experts = Expert::query()->get();
        $students = Student::query()->get();
        $coordinators = Coordinator::query()->get();

        //dd($ppe_workers);
        if (!$request->get('category')) {
            return redirect('/admin?part=users&category=employers&post=1');
        } else {
            switch ($request->query("category")) {
                case 'employers':
                    if ($request->query("post")) {
                        $ppe_workers = $ppe_workers->where("position", $request->query("post"));
                    }
                    $ppe_workers = $ppe_workers->get();
                    $users = $ppe_workers;
                    $who = 'workers';
                    break;
                case 'experts':
                    $users = $experts;
                    $who = 'experts';
                    break;
                case 'students':
                    $users = $students;
                    $who = 'students';
                    break;
                case 'coordinators':
                    $users =  $coordinators;
                    $who = 'coordinators';
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
                'users' => $users,
                'who' => $who
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
        $positions = array();
        $positions_id = array();
        foreach ($position_workers as $pos) {
            $positions[] = $pos->name;
            $positions_id[] = $pos->id;
        }

        //dd($positions);
        //$json = json_encode($positions);


        $municipalities = Municipality::query()->get();
        $MOname = array();
        $MOid = array();
        foreach ($municipalities as $mun) {
            $MOname[] = $mun->name_municipality;
            $MOid[] = $mun->id_municipality;
        }

        $ed_org = Education_organization::query()->get();
        $OOname = array();
        $OOid = array();
        foreach ($ed_org as $oo) {
            $OOname[] = $oo->name_education_org;
            $OOid[] = $oo->id_municipality;
        }

        return view('admin.add_employer', [
            'positions' => $positions,
            'MOname' => $MOname,
            'MOid' => $MOid,
            'OOname' => $OOname,
            'OOid' => $OOid,
        ]);
    }
    public static function add_empl(Request $request)
    {
        $position_workers = Position_worker::query()->get();
        $positions = array();
        $positions_id = array();
        foreach ($position_workers as $pos) {
            $positions[] = $pos->name;
            $positions_id[] = $pos->id;
        }
        $municipalities = Municipality::query()->get();
        $MOname = array();
        $MOid = array();
        foreach ($municipalities as $mun) {
            $MOname[] = $mun->name_municipality;
            $MOid[] = $mun->id_municipality;
        }
        $ed_org = Education_organization::query()->get();
        $OOname = array();
        $OOid = array();
        foreach ($ed_org as $oo) {
            $OOname[] = $oo->name_education_org;
            $OOid[] = $oo->id_municipality;
        }

        $surname = $request->input('surname');
        $name = $request->input('name');
        $secondname = $request->input('secondname');
        $id_mun = $MOid[$request->input('selectMO') - 1];
        $id_oo = $OOid[$request->input('selectOO')];


        //Генерация пароля
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $pas_rand = substr(str_shuffle($chars), 0, 8);
        //Генерация логина
        $last_id = User::query()->get()->last()->id + 1;
        $user_login = "user_{$last_id}";

        $user = new User;
        $user->type = 'worker';
        $user->login = $user_login;
        $user->password = $pas_rand;
        $user->save();

        $clear_user = new ClearLoginUser;
        $clear_user->type = 'worker';
        $clear_user->surname = $surname;
        $clear_user->name = $name;
        $clear_user->second_name = $secondname;
        $clear_user->login = $user_login;
        $clear_user->password = $pas_rand;
        $clear_user->save();


        $pos_n = $request->input('multiSelect');
        foreach ($pos_n as $n) {
            $worker = new Ppe_worker;
            $worker->id_login = $user->id;
            $worker->surname = $surname;
            $worker->name = $name;
            $worker->second_name = $secondname;
            $worker->id_municipality = $id_mun;
            if ($request->input('cdOO') == "on") {
                $worker->other_place_of_work = $request->input('anotherJobI');
            } else {
                $worker->id_education_org = $id_oo;
            }
            $worker->position = $positions_id[$n - 1];
            $worker->save();
        }


        //dd($worker);
        return view('admin.add_employer_info', [
            'login' => $user_login,
            'password' => $pas_rand
        ]);
    }

    public static function add_coordinator()
    {
        $coordinators = Coordinator::query()->get();
        if (count($coordinators) == 0) {
            $coordinators_type = array();
            $coordinators_type_text = array();
            $coordinators_login = array();
            $coordinators_password = array();


            //Генерация пароля
            $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

            $municipalities = Municipality::query()->get();
            foreach ($municipalities as $mun) {
                $pas_rand = substr(str_shuffle($chars), 0, 8);
                $last_id = User::query()->get()->last()->id + 1;
                $user_login = "coordinator_{$last_id}";

                $user = new User;
                $user->type = 'coordinator';
                $user->login = $user_login;
                $user->password = $pas_rand;
                $user->save();

                $coordinators_login[] = $user_login;
                $coordinators_password[] = $pas_rand;

                $clear_user = new ClearLoginUser;
                $clear_user->type = 'coordinator';
                $clear_user->surname = "Координатор";
                $clear_user->name = 'Координатор';
                $clear_user->second_name = 'Координатор';
                $clear_user->login = $user_login;
                $clear_user->password = $pas_rand;
                $clear_user->save();

                $coordinator = new Coordinator;
                $coordinator->id = $user->id;
                $coordinator->type = 'Ответственный за МО';
                $coordinator->attribute_type = $mun->id_municipality;
                $coordinator->attribute_type_text = $mun->name_municipality;
                $coordinator->save();

                $coordinators_type[] = 'Ответственный за МО';
                $coordinators_type_text[] = $mun->name_municipality;
            }


            $subjects = Subject::query()->get();
            foreach ($subjects as $sub) {
                $pas_rand = substr(str_shuffle($chars), 0, 8);
                $last_id = User::query()->get()->last()->id + 1;
                $user_login = "coordinator_{$last_id}";

                $user = new User;
                $user->type = 'coordinator';
                $user->login = $user_login;
                $user->password = $pas_rand;
                $user->save();

                $clear_user = new ClearLoginUser;
                $clear_user->type = 'coordinator';
                $clear_user->surname = "Координатор";
                $clear_user->name = 'Координатор';
                $clear_user->second_name = 'Координатор';
                $clear_user->login = $user_login;
                $clear_user->password = $pas_rand;
                $clear_user->save();

                $coordinators_login[] = $user_login;
                $coordinators_password[] = $pas_rand;

                $coordinator = new Coordinator;
                $coordinator->id = $user->id;
                $coordinator->type = 'Ответственный за Экспертов';
                $coordinator->attribute_type = $sub->id_subject;
                $coordinator->attribute_type_text = $sub->subject_name;
                $coordinator->save();

                $coordinators_type[] = 'Ответственный за Экспертов';
                $coordinators_type_text[] = $sub->subject_name;;
            }

            $coordinators = Coordinator::query()->get();

            return view('admin.add_coordinator_info', [
                'coordinators_type' => $coordinators_type,
                'coordinators_type_text' => $coordinators_type_text,
                'coordinators_login' => $coordinators_login,
                'coordinators_pas' => $coordinators_password
            ]);
        } else {
            return redirect('/admin?part=users&category=coordinators');
        }
    }

    public static function edit(Request $request)
    {
        $municipalities = Municipality::query()->get();
        $MOname = array();
        $MOid = array();
        foreach ($municipalities as $mun) {
            $MOname[] = $mun->name_municipality;
            $MOid[] = $mun->id_municipality;
        }
        $ed_org = Education_organization::query()->get();
        $OOname = array();
        $OOid = array();
        foreach ($ed_org as $oo) {
            $OOname[] = $oo->name_education_org;
            $OOid[] = $oo->id_municipality;
        }

        $position_workers = Position_worker::query()->get();
        $positions = [];
        foreach ($position_workers as $pos) {
            $positions[] = [
                 'name' => $pos->name,
                 'id' => $pos->id,
            ];
        }

        switch ($request->get('edit')) {
            case 'employer':
                $id_login = $request->get('id');
                $user_login = ClearLoginUser::where('id', $id_login)->get()->first();
                $user_info = Ppe_worker::where('id_login', $id_login)->get();
                return view('admin.edit_employer', [
                    'user_login' => $user_login,
                    'user_info' => $user_info,
                    'MOname' => $MOname,
                    'MOid' => $MOid,
                    'OOname' => $OOname,
                    'OOid' => $OOid,
                    'positions' => $positions
                ]);
                break;
        }
    }
}
