use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use RonasIT\Support\Traits\MigrationTrait;

class AddDefaultUser extends Migration
{
    use MigrationTrait;

    public function up()
    {
        if (config('app.env') != 'testing') {
            User::create([
                'name'     => '{{$name}}',
                'email'    => '{{$email}}',
                'password' => bcrypt('{{$password}}'),
                'role_id'  => '{{$role}}'
            ]);
        }
    }

    public function down()
    {
        if (config('app.env') != 'testing') {
            User::where('email', '{{$email}}')->delete();
        }
    }
}