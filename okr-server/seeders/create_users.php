<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
use App\Contract\PassworderInterface;
use App\Model\User;
use Hyperf\Database\Seeders\Seeder;
use Hyperf\DbConnection\Db;

class CreateUsers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $passworder = di()->get(PassworderInterface::class);
        Db::table('user')->insert([
            [
                'email' => 'okr@hyperf.io',
                'username' => 'okr',
                'password' => $passworder->hash(md5('123456')),
                'gender' => User::BOY,
            ],
        ]);
    }
}
