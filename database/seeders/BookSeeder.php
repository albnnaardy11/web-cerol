<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing books
        Book::truncate();

        $categories = Category::all();

        foreach ($categories as $category) {
            $this->command->info("Fetching books for category: {$category->name}");

            // Fetch from Open Library Search API
            // We search for the category name as a subject
            $response = Http::get('https://openlibrary.org/search.json', [
                'q' => 'subject:' . strtolower($category->name),
                'limit' => 10,
                'language' => 'ind'
            ]);

            if ($response->successful()) {
                $docs = $response->json()['docs'] ?? [];

                foreach ($docs as $doc) {
                    // Extract data
                    $title = $doc['title'] ?? 'Unknown Title';
                    $author = $doc['author_name'][0] ?? 'Unknown Author';
                    $description = $doc['first_sentence'][0] ?? ($doc['subtitle'] ?? "A wonderful book about {$category->name}.");
                    
                    // Cover image URL
                    $coverId = $doc['cover_i'] ?? null;
                    $imageUrl = $coverId ? "https://covers.openlibrary.org/b/id/{$coverId}-L.jpg" : null;

                    // Create the book
                    Book::create([
                        'title' => $title,
                        'author' => $author,
                        'category_id' => $category->id,
                        'description' => $description,
                        'image' => $imageUrl, // We'll handle this in the view to display either storage or external URL
                        'stock' => rand(1, 20),
                    ]);
                }
            } else {
                $this->command->error("Failed to fetch books for category: {$category->name}");
                
                // Fallback to local data if API fails
                for ($i = 1; $i <= 5; $i++) {
                    Book::create([
                        'title' => "{$category->name} Book {$i}",
                        'author' => "Author {$i}",
                        'category_id' => $category->id,
                        'description' => "This is a placeholder description for a book in the {$category->name} category.",
                        'stock' => rand(1, 20),
                    ]);
                }
            }
        }
    }
}
