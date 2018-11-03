<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Password;
use Spatie\Permission\Models\Role;
use App\Exceptions\MakeUserException;

/**
 * Class MakeUserCommand 
 * 
 * @package App\Console\Command
 */
class MakeUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new application user';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        // Ask for all the needed information
        $email     = $this->ask("What is the new user's email address?");
        $name      = $this->ask("What is the new user's name?") ?: 'unknown user';
        $password  = $this->secret("What is the new user's password? (blank generates a random one)", str_random(32));
        $role      = $this->choice('What role is the user?', $this->getAllRoles());
        $sendReset = $this->confirm('Do you want to send a password reset email?');

        try { // To create a new user in the application. 
            app('db')->beginTransaction();
            
            $this->validateEmail($email);

            app(config('auth.providers.users.model'))->create(compact('email', 'name', 'password'));
                
            if ($sendReset) {
                Password::sendResetLink(compact('email'));
                $this->info("Sent password reset email to {$email}");
            }
    
            $this->info("Created new user for email {$email}");

            app('db')->commit();
        } catch (Exception $exception) { // OOPS! something went wrong. So rollback everything + display error. 
            $this->error($exception->getMessage());
            $this->error('The user was not created');

            app('db')->rollBack();
        }
    }

    /**
     * Function for getting all the roles in the storage 
     * 
     * @return array
     */
    private function getAllRoles(): array 
    {
        foreach (Role::all() as $key => $role) {
            $roles[] = $role->name;
        }

        return $roles;
    }

    /**
     * Determine if the given email address already exists.
     *
     * @param  string $email The given email address for the user. 
     * @return void
     *
     * @throws \App\Exceptions\MakeUserException
     */
    private function validateEmail($email): void
    {
        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw MakeUserException::invalidEmail($email);
        }

        if (app(config('auth.providers.users.model'))->where('email', $email)->exists()) {
            throw MakeUserException::emailExists($email);
        }
    }
}
