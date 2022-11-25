<?php

namespace Myth\Auth\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel;

class CreateUser extends BaseCommand
{
    protected $group       = 'Auth';
    protected $name        = 'auth:create_user';
    protected $description = 'Adds a new user to the database.';
    protected $usage       = 'auth:create_user [username] [email]';
    protected $arguments   = [
        'username' => 'The username of the new user to create',
        'email'    => 'The email address of the new user to create',
    ];

    public function run(array $params = [])
    {
        // Start with the fields required for the account to be usable
        $row = [
            'active'   => 1,
            'password' => bin2hex(random_bytes(24)),
        ];

        // Consume or prompt for username
        $row['username'] = array_shift($params);
        if (empty($row['username'])) {
            $row['username'] = CLI::prompt('Username', null, 'required');
        }

        // Consume or prompt for email
        $row['email'] = array_shift($params);
        if (empty($row['email'])) {
            $row['email'] = CLI::prompt('Email', null, 'required');
        }

        // Consume or prompt for fullname
        $row['fullname'] = array_shift($params);
        if (empty($row['fullname'])) {
            $row['fullname'] = CLI::prompt('Fullname', null, 'required');
        }

        // Consume or prompt for phone
        $row['no_hp'] = array_shift($params);
        if (empty($row['no_hp'])) {
            $row['no_hp'] = CLI::prompt('Nomor Handphone', null, 'required');
        }

        // Consume or prompt for alamat
        $row['alamat'] = array_shift($params);
        if (empty($row['alamat'])) {
            $row['alamat'] = CLI::prompt('Alamat', null, 'required');
        }

        // Consume or prompt for provider
        $row['provider'] = array_shift($params);
        if (empty($row['provider'])) {
            $row['provider'] = CLI::prompt('Provider', null, 'required');
        }

        // Consume or prompt for hak akses
        $row['hak_akses'] = array_shift($params);
        if (empty($row['hak_akses'])) {
            $row['hak_akses'] = CLI::prompt('Hak Akses', null, 'required');
        }

        // Run the user through the entity and insert it
        $user = new User($row);

        $users = model(UserModel::class);
        if ($userId = $users->insert($user)) {
            CLI::write(lang('Auth.registerCLI', [$row['username'], $userId]), 'green');
        } else {
            foreach ($users->errors() as $message) {
                CLI::write($message, 'red');
            }
        }
    }
}