<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\NewsPost;
use App\Models\Subcategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class NewsPostController extends Controller
{
    public function allNewsPost()
    {
        $all_news_post = NewsPost::latest()->get();
        return view('backend.news.all_news_post', compact('all_news_post'));
    }

    public function addNewsPost()
    {
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        $admin_user = User::where('role','admin')->latest()->get();

        return view('backend.news.add_news_post', compact('categories', 'subcategories', 'admin_user'));
    }

    public function storeNewsPost(Request $request)
    {
        $request->validate([
            'news_title' => 'required',
            'news_details' => 'required',
            'category_id' => 'required',
            'user_id' => 'required',
            'image' => 'required',
            'tags' => 'required'
        ]);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(784,436)->save('upload/news/'.$name_gen);
        $save_url = 'upload/news/'.$name_gen;

        NewsPost::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'user_id' => $request->user_id,
            'news_title' => $request->news_title,
            'news_title_slug' => strtolower(str_replace(' ','-', $request->news_title_slug)),
            'image' => $save_url,
            'news_details' => $request->news_details,
            'tags' => $request->tags,
            'breaking_news' => $request->breaking_news,
            'top_slider' => $request->top_slider,
            'first_section_three' => $request->first_section_three,
            'first_section_nine' => $request->first_section_nine,
            'post_date' => date('d-m-Y'),
            'post_month' => date('F'),
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'News Post Inserted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.news.post')->with($notification);
    }

    public function editNewsPost($id)
    {
        $news_post = NewsPost::findOrFail($id);

        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        $admin_user = User::where('role','admin')->latest()->get();

        return view('backend.news.edit_news_post', compact('news_post', 'categories', 'subcategories', 'admin_user'));
    }

    public function updateNewsPost(Request $request)
    {
        $request->validate([
            'news_title' => 'required',
            'news_details' => 'required',
            'category_id' => 'required',
            'user_id' => 'required',
            'tags' => 'required'
        ]);

        $news_post = NewsPost::findOrFail($request->id);
        $old_image = $news_post->image;

        if($request->file('image')) {
            // Upload and update logic for a new image
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(784,436)->save('upload/news/'.$name_gen);
            $save_url = 'upload/news/'.$name_gen;

            // Update the news post with the new image
            $news_post->update([
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'user_id' => $request->user_id,
                'news_title' => $request->news_title,
                'news_title_slug' => strtolower(str_replace(' ','-', $request->news_title_slug)),
                'image' => $save_url,
                'news_details' => $request->news_details,
                'tags' => $request->tags,
                'breaking_news' => $request->breaking_news,
                'top_slider' => $request->top_slider,
                'first_section_three' => $request->first_section_three,
                'first_section_nine' => $request->first_section_nine,
                'post_date' => date('d-m-Y'),
                'post_month' => date('F'),
                'updated_at' => Carbon::now(),
            ]);

            // Delete the old image if it exists
            if ($old_image) {
                unlink($old_image); // This deletes the old image
            }

        } else {
            $news_post->update([
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'user_id' => $request->user_id,
                'news_title' => $request->news_title,
                'news_title_slug' => strtolower(str_replace(' ','-', $request->news_title_slug)),
                'news_details' => $request->news_details,
                'tags' => $request->tags,
                'breaking_news' => $request->breaking_news,
                'top_slider' => $request->top_slider,
                'first_section_three' => $request->first_section_three,
                'first_section_nine' => $request->first_section_nine,
                'post_date' => date('d-m-Y'),
                'post_month' => date('F'),
                'updated_at' => Carbon::now(),
            ]);
        }

        $notification = [
            'message' => 'News Post Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.news.post')->with($notification);
    }

    public function deleteNewsPost($id)
    {
        $post_image = NewsPost::findOrFail($id);
        $img = $post_image->image;
        unlink($img);

        NewsPost::findOrFail($id)->delete();

        $notification = [
            'message' => 'News Post Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function inactiveNewsPost($id)
    {
        NewsPost::findOrFail($id)->update([
            'status' => 0
        ]);

        $notification = [
            'message' => 'News Post Inactive',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function activeNewsPost($id)
    {
        NewsPost::findOrFail($id)->update([
            'status' => 1
        ]);

        $notification = [
            'message' => 'News Post Active',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
