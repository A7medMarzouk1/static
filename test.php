<?php


namespace App\Console\Commands;


use App\Models\LoginWay;
use App\Models\Role;
use App\Models\User;
use App\Models\UserLoginWay;
use Illuminate\Console\Command;

class UserLoginWays extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:UserLoginWays';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add login ways to users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $login_ways = [1,5];
        $excluded_groups = [123,124,129,129,151,406,408,266,267,268,269,410,289,291,251];

        $roles_ids = Role::WhereNotIn('id',$excluded_groups)->pluck('id')->toArray();
        $filter['role_ids'] =$roles_ids;

        $users = User::filter($filter)->get();
				dd($users);

            foreach ($users as $user){
                $user->loginWays()->sync($login_ways);
            }

            echo "Active Login Ways Added";
    }
}
