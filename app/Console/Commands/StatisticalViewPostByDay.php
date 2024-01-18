<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class StatisticalViewPostByDay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'statistical:view-post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '-- Statistical View Post By Day --';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $posts = DB::table('posts')->select(['id', 'views'])->get();
        foreach ($posts as $post) {
            $item = DB::table('date_view_post')
                ->where('post_id', $post->id)
                ->orderBy('created_at', 'DESC')->select('created_at')->first();
            $itemDay = $item->created_at;
            $today = Carbon::today();

            if ($today->eq($itemDay)) {
                DB::table('date_view_post')->where('post_id', $post->id)
                    ->where('created_at', $today)->update(['views' => $post->views]);
            } else {
                DB::table('date_view_post')->insert([
                    'post_id' => $post->id,
                    'views' => $post->views,
                    'created_at' => Carbon::today(),
                ]);
            }
        }
    }
}
