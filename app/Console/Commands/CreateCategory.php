<?php

namespace App\Console\Commands;

use App\Category;
use Illuminate\Console\Command;

class CreateCategory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:category';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a new category in the database';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $categoryName = $this->ask("Tell me the category name");

        Category::create(['category_name' => $categoryName]);

        $this->info("The following category was added into our database: ${categoryName}");
    }
}
