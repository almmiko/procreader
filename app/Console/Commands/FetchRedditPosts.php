<?php

namespace App\Console\Commands;

use App\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;

class FetchRedditPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:reddit {number_of_posts}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch posts from reddit';

    /**
     * Create a new command instance.
     *
     * @internal param Post $post
     */
    public function __construct()
    {
        parent::__construct();


    }

    /**
     * Execute the console command.
     *
     * @param Post $post
     * @return mixed
     */
    public function handle(Post $post)
    {

        $email = $this->ask('Type your email');
        $password = $this->secret('Type your password');

        Auth::attempt(['email' => $email, 'password' => $password]);

        if (! Auth::check()) {
            $this->line('Your must login to perform this action');
            return;
        }

        $posts_number = $this->argument('number_of_posts');
        $post->createRedditPosts($posts_number);
        $this->line('Successfully created '. $posts_number . ' posts from reddit');
    }
}
