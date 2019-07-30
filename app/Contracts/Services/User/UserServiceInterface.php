<?php

namespace App\Contracts\Services\User;

interface UserServiceInterface
{
	public function getUser();
	public function store($auth_id, $user);
	public function searchUser($name, $email, $date_from, $date_to);
	public function userDetail($user_id);
	public function update($auth_id, $user);
	public function changePassword($auth_id, $user_id, $old_pwd, $new_pwd);
	public function softDelete($auth_id, $user_id);

}
