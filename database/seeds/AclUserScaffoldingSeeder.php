<?php

use App\User;
use Spatie\Permission\Models\{Permission, Role};
use Illuminate\Database\{Eloquent\Collection, Seeder};

/**
 * Class AclUserScaffoldingSeeder
 */
class AclUserScaffoldingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->seedDefaultPermissions();

        if ($this->command->confirm('Create roles for user(s), default is admin and user.', true)) {
            // Confirm and ask for application specific roles for the application. 
            $inputRoles = $this->command->ask('Enter roles in comma spearated format.', 'admin,user');

            $this->createRoleIfNotExist($inputRoles);
        } else {
            $this->createOnlyNormalUser();
        }
    }

    protected function seedDefaultPermissions(): void 
    {
        foreach ($this->defaultPermissions() as $permission) {
           Permission::firstOrCreate(['name' => trim($permission)]); 
        }

        $this->command->info('Default permission added.');
    }

    protected function createOnlyNormalUser(): void 
    {
        Role::firstOrCreate(['name' => 'user']);
        $this->command->info('Added only default user role.');
    }

    protected function defaultPermissions(): array 
    {
        return [];
    }

    protected function getUserPermissions(): Collection
    {
        return Permission::where('name', 'LIKE', 'view_%')->get();
    }

    protected function createRoleIfNotExist(string $roles): void 
    {
        foreach (explode(',', $roles) as $role) {
            $role = Role::firstOrCreate(['name' => trim($role)]);

            if ($this->isAdmin($role->name)) { // Assign all permissions
                $role->syncPermissions(Permission::all());
                $this->command->info('Admin granted all permissions');
            } else { // For others by default only read access
                $role->syncPermissions($this->getUserPermissions());
            }

            $this->createUser($role); // Create one user for each role.
        }
    }

    protected function createUser(Role $role): void 
    {
        $user = factory(User::class)->create(['password' => 'secret'])->assignRole($role->name);

        if ($this->isAdmin($role->name)) {
            $this->command->info('Here are your admin details to login:'); 
            $this->command->warn($user->email); 
            $this->command->warn('Password is "secret"');
        }
    }

    protected function isAdmin(string $role): bool 
    {
        return $role === 'admin'; 
    }
}
