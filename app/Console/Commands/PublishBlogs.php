<?php

namespace App\Console\Commands;

use App\Models\Blog;
use Illuminate\Console\Command;

class PublishBlogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'app:publish-blogs';
    protected $signature = 'blogs:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish pending blogs';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $pendingBlogs = Blog::where('state','pending')->get();

        foreach($pendingBlogs as $blog){
            $blog->state = 'published';
            $blog->save();
        }


        $this->info('Pending blogs published successfully');

    }
}
