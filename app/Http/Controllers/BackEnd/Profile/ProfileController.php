<?php

namespace App\Http\Controllers\BackEnd\Profile;
use App\Core\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Users\Contract\UserRepositoryInterface;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use ApiResponser;
    private $user; 
    public function __construct(UserRepositoryInterface $user){
        $this->user = $user;
    }

    // View detail profile
    public function detail(User $user){
        $views = view('backend.profile.profile');
        $views->with('user', $user);
        return $views;
    }

    // Update user
    public function updateProfile(Request $request, User $user)
    {
        if (Auth::id() == $user->id) {
            $attributes = $request->only('name', 'password');
            if (!empty($attributes)) {
                $user->update($attributes);
                return redirect()->back()->with('success', 'Thành công');
            }
            return redirect()->back()->with('errors', 'Update không thành công');
        }
        return $this->error('Không có quyền truy cập', 401);

    }

    // Update Image
    public function updateImage(Request $request, User $user)
    {
        if (Auth::id() == $user->id) {
            if ($request->hasFile('image')) {
                $this->user->updateImage($request->file('image'), $user->id);
            }
            return redirect()->back()->with('success','Cập nhật ảnh thành công');
        }
        return $this->error('Không có quyền truy cập', 401);
    }
}
