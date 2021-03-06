<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

class tagpost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tagpost';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Displays all posts with this tag';

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
        $input = $this->ask('Enter a tag to find specified post.');
        $tag = Post::GetTagPost($input)->get();
        $head = ['id', 'title', 'content', 'created_at', 'updated_at'];
        $this->table($head, $tag);
    }
}
