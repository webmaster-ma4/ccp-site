@extends('layouts.admin')

@section('title', __('Éditer la Publication'))

@section('content')

<div style="max-width: 900px; margin: 0 auto;">
    <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-navy btn-sm" style="margin-bottom: 2rem; display: inline-flex; align-items: center; gap: 0.4rem;">
        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        {{ __('Retour aux publications') }}
    </a>

    @if(session('success'))
        <div style="background: #ECFDF5; color: #059669; padding: 1rem 1.25rem; border-radius: 8px; border: 1px solid #10B981; font-family: 'Inter', sans-serif; font-size: 0.9rem; margin-bottom: 2rem;">
            {{ session('success') }}
        </div>
    @endif

    <div style="background: #FFFFFF; border: 1px solid #E0E6ED; border-radius: 12px; padding: 2.5rem; box-shadow: 0 4px 12px rgba(8, 28, 58, 0.03);">
        <form method="POST" action="{{ route('admin.posts.update', $post) }}" id="post-form">
            @csrf
            @method('PUT')

            <div class="form-grid-2" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div class="form-group" style="margin-bottom: 0; grid-column: 1/-1;">
                    <label class="form-label" for="title">{{ __('Titre de l\'article') }} <span style="color:#C8A04D;">*</span></label>
                    <input type="text" id="title" name="title" class="form-input" value="{{ old('title', $post->title) }}" required>
                    @error('title')<p style="color:#DC2626; font-size:0.75rem; margin-top:0.25rem;">{{ $message }}</p>@enderror
                </div>
                
                <div class="form-group" style="margin-bottom: 0;">
                    <label class="form-label" for="slug">{{ __('Slug URL') }} <span style="color:#C8A04D;">*</span></label>
                    <input type="text" id="slug" name="slug" class="form-input" value="{{ old('slug', $post->slug) }}" required>
                    @error('slug')<p style="color:#DC2626; font-size:0.75rem; margin-top:0.25rem;">{{ $message }}</p>@enderror
                </div>
                
                <div class="form-group" style="margin-bottom: 0;">
                    <label class="form-label" for="category_id">{{ __('Catégorie') }}</label>
                    <select id="category_id" name="category_id" class="form-select">
                        <option value="">{{ __('Aucune catégorie') }}</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="excerpt">{{ __('Chapeau / Extrait') }}</label>
                <textarea id="excerpt" name="excerpt" class="form-textarea" rows="3">{{ old('excerpt', $post->excerpt) }}</textarea>
                @error('excerpt')<p style="color:#DC2626; font-size:0.75rem; margin-top:0.25rem;">{{ $message }}</p>@enderror
            </div>

            {{-- ÉDITEUR CMS POUR LE CONTENU --}}
            <div class="form-group">
                <label class="form-label" for="content">{{ __('Contenu de l\'article (Éditeur CMS)') }} <span style="color:#C8A04D;">*</span></label>
                
                <div id="editor-wrapper">
                    <div id="editor-container"></div>
                </div>

                <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 0.5rem; font-family: 'Inter', sans-serif; font-size: 0.78rem; color: #5E7590;">
                    <span>💡 Utilisez la barre d'outils pour modifier la mise en forme et téléverser des images.</span>
                    <button type="button" id="btn-upload-img" style="background: #F1F5F9; border: 1px solid #CBD5E1; padding: 0.35rem 0.85rem; border-radius: 6px; color: #081C3A; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; gap: 0.4rem; transition: 0.2s;">
                        📷 Téléverser & Insérer une Image
                    </button>
                </div>

                <textarea id="content" name="content" style="display: none;" required>{{ old('content', $post->content) }}</textarea>
                @error('content')<p style="color:#DC2626; font-size:0.75rem; margin-top:0.25rem;">{{ $message }}</p>@enderror
            </div>

            <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label" for="published_at">{{ __('Date & Heure de publication') }}</label>
                <input type="datetime-local" id="published_at" name="published_at" class="form-input"
                    value="{{ old('published_at', $post->published_at?->format('Y-m-d\TH:i')) }}"
                    style="max-width: 320px;">
                <p style="font-family: 'Inter', sans-serif; font-size: 0.75rem; color: #8FA0B4; margin-top: 0.4rem;">{{ __('Effacer pour dépublier et enregistrer comme brouillon.') }}</p>
            </div>

            <div style="margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid #EEF1F5; display: flex; align-items: center; gap: 1rem;">
                <button type="submit" class="btn btn-gold">
                    {{ __('Enregistrer les modifications') }}
                </button>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-navy">{{ __('Annuler') }}</a>
                
                @if($post->published_at)
                <a href="{{ route('post', ['locale' => app()->getLocale(), 'slug' => $post->slug]) }}" target="_blank" class="btn btn-sm" style="margin-left: auto; background: #EEF1F5; color: #5E7590; border: 1px solid #E0E6ED;">
                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    {{ __('Voir sur le site') }}
                </a>
                @endif
            </div>
        </form>
    </div>
</div>

@endsection

@push('head')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
<style>
.ql-toolbar.ql-snow {
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
    border-color: #CBD5E1;
    background: #F8FAFC;
    padding: 10px;
}
.ql-container.ql-snow {
    border-bottom-left-radius: 8px;
    border-bottom-right-radius: 8px;
    border-color: #CBD5E1;
    min-height: 400px;
    font-family: 'Inter', sans-serif;
    font-size: 1rem;
}
.ql-editor {
    min-height: 400px;
    line-height: 1.8;
    color: #162235;
}
.ql-editor h1 { font-family: 'Cormorant Garamond', serif; font-size: 2.2rem; color: #081C3A; font-weight: 700; margin: 1.5rem 0 0.75rem; }
.ql-editor h2 { font-family: 'Cormorant Garamond', serif; font-size: 1.8rem; color: #081C3A; font-weight: 700; margin: 1.5rem 0 0.75rem; }
.ql-editor h3 { font-family: 'Inter', sans-serif; font-size: 1.3rem; color: #162235; font-weight: 700; margin: 1.25rem 0 0.5rem; }
.ql-editor blockquote { border-left: 4px solid #C8A04D; padding-left: 1rem; font-style: italic; color: #4A5E75; background: #F8FAFC; padding-top: 0.5rem; padding-bottom: 0.5rem; border-radius: 0 6px 6px 0; }
.ql-editor img { max-width: 100%; height: auto; border-radius: 8px; margin: 1.25rem 0; box-shadow: 0 4px 12px rgba(0,0,0,0.06); }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const hiddenContentInput = document.getElementById('content');
    
    function triggerImageUpload() {
        const fileInput = document.createElement('input');
        fileInput.setAttribute('type', 'file');
        fileInput.setAttribute('accept', 'image/*');
        fileInput.click();

        fileInput.onchange = async () => {
            const file = fileInput.files[0];
            if (!file) return;

            const formData = new FormData();
            formData.append('image', file);
            formData.append('_token', '{{ csrf_token() }}');

            try {
                let range = quill.getSelection(true);
                if (!range) range = { index: quill.getLength() };

                quill.insertText(range.index, '⌛ Téléversement de l\'image...', 'user');

                const response = await fetch('{{ route("admin.posts.upload-image") }}', {
                    method: 'POST',
                    body: formData,
                    headers: { 'Accept': 'application/json' }
                });

                const data = await response.json();
                quill.deleteText(range.index, 32);

                if (response.ok && data.url) {
                    quill.insertEmbed(range.index, 'image', data.url);
                    quill.setSelection(range.index + 1);
                } else {
                    alert(data.error || 'Erreur lors du téléversement.');
                }
            } catch (err) {
                console.error(err);
                alert('Échec de la connexion lors du téléversement.');
            }
        };
    }

    const quill = new Quill('#editor-container', {
        theme: 'snow',
        placeholder: 'Rédigez ici le contenu de votre article...',
        modules: {
            toolbar: {
                container: [
                    [{ 'header': [1, 2, 3, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'align': [] }],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    ['blockquote', 'code-block'],
                    ['link', 'image'],
                    ['clean']
                ],
                handlers: {
                    image: triggerImageUpload
                }
            }
        }
    });

    document.getElementById('btn-upload-img').addEventListener('click', triggerImageUpload);

    if (hiddenContentInput.value) {
        quill.clipboard.dangerouslyPasteHTML(hiddenContentInput.value);
    }

    document.getElementById('post-form').addEventListener('submit', function() {
        const html = quill.root.innerHTML;
        hiddenContentInput.value = (html === '<p><br></p>') ? '' : html;
    });
});
</script>
@endpush