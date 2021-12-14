<?php

namespace App\Http\Controllers\BackEnd\Posts;

use App\Core\Traits\ApiResponser;
use App\Core\Traits\UploadTable;
use App\Models\Comments\Comment;
use App\Models\Posts\Post;
use App\Repositories\Categories\CategoryRepository;
use App\Repositories\Posts\Contract\PostRepositoryInterface;
use App\Repositories\Users\Contract\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JavaScript;

class PostController extends Controller
{
    use UploadTable;
    use ApiResponser;

    private $category;
    private $post;
    private $user;

    public function __construct(PostRepositoryInterface $post, CategoryRepository $category, UserRepositoryInterface $user)
    {
        $this->post = $post;
        $this->category = $category;
        $this->user = $user;
    }

    public function index(Request $request)
    {
        $category = $request->get('category', 'all');
        $author = $request->get('author', 'all');
        $search = $request->get('search');
        if ($search != null) {
            $post = $this->post->searchAll($search);
        } else {
            $post = $this->post->whereCatAuthor($category, $author);
        }
        $posts = $post->paginate();
        $categories = $this->category->all(['id', 'name']);
        $author = $this->user->ListAdmin();
        JavaScript::put([
            'posts' => $posts,
            'url_list_post' => route('backend.posts'),
            'link_update_categories_post' => route('backend.update.categories.post'),
            'url_delete_post' => route('backend.delete.post')
        ]);
        $view = view('backend.posts.index');
        $view->with('posts', $posts);
        $view->with('categories', $categories);
        $view->with('author', $author);
        return $view;
    }

    // View create
    public function create()
    {
        $categories = $this->category->all(['id', 'name']);
        $view = view('backend.posts.form');
        if (request('id')) {
            $post = $this->post->find(request('id'));
            $view->with('post', $post);
            foreach ($post->categories as $category) {
                $categories_name[$category->name] = $category->name;
            }
            if (isset($categories_name) != null) {
                $view->with('categories_name', $categories_name);
            }
        }
        $view->with('categories', $categories);
        return $view;
    }

    // Create post
    public function store(Request $request)
    {
        $attribute = $request->all();
        $file = $request->file('image');
        $filename = 'Thumb_image_' . time() . '.' . $file->getClientOriginalExtension();
        $post = Post::create([
            'user_id' => 1,
            'title' => $attribute['title'],
            'slug' => create_slug($attribute['title']),
            'image' => $this->saveImage($file, $filename),
            'description' => $attribute['description'],
            'content' => $attribute['content'],
        ]);
        if (request('categories') != null) {
            $post->categories()->attach(request('categories'));
        }
        return redirect()->route('backend.posts');
    }

    // Update post
    public function update(Request $request)
    {
        $attribute = $request->only(['title', 'image', 'description', 'content']);
        $post = $this->post->find(request('id'));
        if (request('image')) {
            $file = $request->file('image');
            $filename = 'Thumb_image_' . time() . '.' . $file->getClientOriginalExtension();
            $attribute['image'] = $this->saveImage($file, $filename);
            $this->post->Unlink($post->image); // Xóa ảnh cũ trong public/uploads/images
        }
        $post->update($attribute);
        $post->categories()->sync(request('categories'));
        return redirect()->back();

    }

    public function detail()
    {
        $post = $this->post->whereCatAuthor('all', 'all')->find(request('post'));
        $listPost = $this->post->ListPost(request('post'));
        JavaScript::put([
            'post' => $post,
            'link_comment_create' => route('backend.comments.create'),
            'link_update_package' => route('backend.comments.update')
        ]);
        $view = view('backend.posts.detail');
        $view->with('post', $post);
        $view->with('listPost', $listPost);
        return $view;
    }

    // Update Categories for Post
    public function UpdateCatePost()
    {
        $post = $this->post->find(request('id'));
        if ($post) {
            $post->categories()->sync(request('categories'));
            return $this->success('Thành công', 200);
        }
    }

    public function delete()
    {
        $id = request('id');
        if ($this->post->find($id)->delete()) {
            return $this->success('Thành công', 200);
        }
    }

    public function reviewComment($slug)
    {
        $post = $this->post->whereSlugPost($slug);
        $comments = Comment::where('post_id', $post->id)->paginate(15);
        JavaScript::put([
            'link_reviewAll_comment' => route('backend.comments.reviewAll')
        ]);
        $view = view('backend.posts.reviewComment');
        $view->with('post', $post);
        $view->with('comments', $comments);
        return $view;
    }
}
