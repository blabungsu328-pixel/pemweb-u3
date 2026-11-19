<?php
namespace App\Http\Controllers;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('user')->latest()->paginate(10);

        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        // Simpan gambar jika pengguna mengunggah file
        $imagePath = $request->file('image')
            ? $request->file('image')->store('articles', 'public')
            : null;

        $request->user()->articles()->create([
            'title' => $data['title'],
            'slug'  => $this->makeSlug($data['title']),
            'body'  => $data['body'],
            'image' => $imagePath,
        ]);

        return redirect()
            ->route('articles.index')
            ->with('success', 'Catatan berhasil dibuat.');
    }

    public function show(Article $article)
    {
        $article->load('user');

        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        $this->authorizeOwner($article);

        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $this->authorizeOwner($article);

        $data = $this->validated($request);

        // Pertahankan gambar lama jika tidak ada upload baru
        $imagePath = $article->image;

        if ($request->hasFile('image')) {

            // Hapus gambar lama jika tersimpan di storage Laravel
            if (
                $article->image &&
                !filter_var($article->image, FILTER_VALIDATE_URL)
            ) {
                Storage::disk('public')->delete($article->image);
            }

            // Simpan gambar baru
            $imagePath = $request->file('image')
                ->store('articles', 'public');
        }

        $article->update([
            'title' => $data['title'],
            'body'  => $data['body'],
            'image' => $imagePath,
        ]);

        return redirect()
            ->route('articles.index')
            ->with('success', 'Catatan berhasil diperbarui.');
    }

    public function destroy(Article $article)
    {
        $this->authorizeOwner($article);

        // Hapus file gambar jika berasal dari storage Laravel
        if (
            $article->image &&
            !filter_var($article->image, FILTER_VALIDATE_URL)
        ) {
            Storage::disk('public')->delete($article->image);
        }

        $article->delete();

        return redirect()
            ->route('articles.index')
            ->with('success', 'Catatan berhasil dihapus.');
    }

    /* ---------- helper ---------- */

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body'  => ['required', 'string'],
            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ]);
    }

    private function makeSlug(string $title): string
    {
        return Str::slug($title) . '-' . Str::lower(Str::random(6));
    }

    private function authorizeOwner(Article $article): void
    {
        abort_unless(
            $article->user_id === Auth::id(),
            403,
            'Kamu tidak berhak mengubah artikel ini.'
        );
    }
}