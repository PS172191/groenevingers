<form action="{{ route('language.switch') }}" method="POST" class="inline-block">
    @csrf
    <select name="language" onchange="this.form.submit()" class="p-2 rounded bg-gray-100 text-gray-800">
        <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
        <option value="fr" {{ app()->getLocale() === 'fr' ? 'selected' : '' }}>French</option>
        <option value="ar" {{ app()->getLocale() === 'ar' ? 'selected' : '' }}>Arabic</option>
    </select>
</form>
