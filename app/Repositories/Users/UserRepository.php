<?php

namespace App\Repositories\Users;

use App\Core\Repositories\BaseRepository;
use App\Repositories\Users\Contract\UserRepositoryInterface;
use App\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $model;

    public function __construct(User $user)
    {
        parent::__construct($user);
        $this->model = $user;
    }

    public function updateImage($file, $id)
    {
        $user = $this->model->find($id);
        $this->Unlink($user->image); // Hàm xóa ảnh cũ.
        $filename = 'Thumb_image_' . time() . '.' . $file->getClientOriginalExtension();
        $path = $this->saveImage($file, $filename);
        return $user->update(['image' => $path]);
    }

    public function WithRolePermissions()
    {
        return $this->model->with(['roles', 'permissions'])->latest()->paginate(self::_limit, ['id', 'username', 'email', 'image', 'active']);
    }
}