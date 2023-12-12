```
//        Users => 9 (đủ)
//        dd(User::with('posts')->get());
//        dd(User::with('follows')->get());
//        dd(User::with('had_follow')->get());
//        dd(User::with('role')->get());
//        dd(User::with('status')->get());
//        dd(User::with('reviews')->get());
//        dd(User::with('replies')->get());
//        dd(User::with('reports')->get());
//        dd(User::with('user_report')->get());

//        Follows => 2 (đủ)
//        dd(Follow::with('user_follow')->get());
//        dd(Follow::with('user_info')->get());

//        Roles => 1 (đủ)
//        dd(Role::with('users')->get());

//        Statuses => 4 (đủ)
//        dd(Status::with('users')->get());
//        dd(Status::with('reviews')->get());
//        dd(Status::with('posts')->get());
//        dd(Status::with('replies')->get());

//        Replies => 3 (đủ)
//        dd(Reply::with('user')->get());
//        dd(Reply::with('review')->get());
//        dd(Reply::with('status')->get());

//        Reviews => 5 (đủ)
//        dd(Review::with('user')->get());
//        dd(Review::with('replies')->get());
//        dd(Review::with('reports')->get());
//        dd(Review::with('post')->get());
//        dd(Review::with('status')->get());

//        Posts => 6 (đủ)
//        dd(Post::with('user')->get());
//        dd(Post::with('category')->get());
//        dd(Post::with('reports')->get());
//        dd(Post::with('reviews')->get());
//        dd(Post::with('status')->get());
//        dd(Post::with('post_hashtags')->get());

//        Categories => 1 (đủ)
//        dd(Category::with('posts')->get());

//        Post_Hashtag => 2 (đủ)
//        dd(PostHashtag::with('post')->get());
//        dd(PostHashtag::with('hashtag')->get());

//        Hashtags => 1 (đủ)
//        dd(Hashtag::with('post_hashtags')->get());

//         Reports => 4 (đủ)
//        dd(Report::with('post')->get());
//        dd(Report::with('user')->get());
//        dd(Report::with('review')->get());
//        dd(Report::with('user_info')->get());
```
