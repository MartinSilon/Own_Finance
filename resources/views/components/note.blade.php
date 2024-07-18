{{-- ---- DETAILS ---- --}}
<div class="spareMoney container bg-white rounded px-md-5 px-2 py-3 mt-1 shadow">
    <div class="row">
        <div class="col-12">
            {{-- FORM --}}
            <form action="{{ route('updateNote', $note->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <textarea class="form-control mb-3" name="note" rows="10" class="w-100">{{ $note->note }}</textarea>
                <button class="btn w-100 mt-3 text-uppercase" type="submit">Upraviť</button>
            </form>
        </div>
    </div>
</div>

<meta name="csrf-token" content="{{ csrf_token() }}">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Nastavte interval na automatické ukladanie (v milisekundách)
        let autoSaveInterval = 1000; // 5000 ms = 5 sekúnd

        // Získajte CSRF token z meta tagu
        let csrfToken = $('meta[name="csrf-token"]').attr('content');

        // Funkcia na automatické ukladanie
        function autoSave() {
            let noteContent = $('textarea[name="note"]').val();
            let noteId = {{ $note->id }};

            $.ajax({
                url: '{{ route('updateNote', $note->id) }}',
                method: 'POST',
                data: {
                    _token: csrfToken,
                    _method: 'PUT',
                    note: noteContent
                },
                success: function(response) {
                    console.log('Note saved successfully');
                },
                error: function(xhr) {
                    console.log('Error saving note');
                }
            });
        }

        setInterval(autoSave, autoSaveInterval);
    });
</script>
