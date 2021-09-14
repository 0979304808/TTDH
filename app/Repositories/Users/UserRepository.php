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
        return $this->model->with(['roles', 'permissions']);
    }

    public function ListAdmin()
    {
        return $this->model->where('active', 2)->get(['id', 'name']);
    }

    public function whereActive($active)
    {
        if ($active == 'không'){
            $active = 0;
        }
        return $this->model->active($active)->with(['roles', 'permissions']);
    }

    public function Search($search)
    {
        return $this->model->search($search)->with(['roles', 'permissions']);
    }
}
