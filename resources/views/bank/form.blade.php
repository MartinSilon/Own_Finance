{{-- ---- FORM FOR ADDING INCOME ---- --}}
<div class="formulars container rounded px-md-5 px-4 pt-4 py-md-5 payment mt-2 shadow">
    <div class="row justify-content-start">
        <div class="col-md-6 pe-md-5">
            <h3 class="text-uppercase mb-4">Pridať banku:</h3>

            {{-- FORM --}}
            <form action="{{ route('bank.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user_id }}">
                <input class="form-control mb-3 date" type="text" name="name" placeholder="Tatra Banka" value="{{ old('name') }}" required>
                <label>Cieľ sporenia:</label>
                <input class="form-control mb-3 date" type="number" name="goal" placeholder="1200" value="{{ old('goal') }}">

                <button class="btn w-100 mt-3 text-uppercase" type="submit">Odoslať</button>
            </form>
        </div>

        {{-- ---- TABLE OF ALL INCOMES ---- --}}
        <div class="col-md-6 mt-md-3">
            <table class="table table-striped table-hover text-center">

                <thead class="thead-dark">
                <tr class="head-row">
                    <th>Meno</th>
                    <th>Akcie</th>
                </tr>
                </thead>

                <tbody>
                @foreach($banks as $item)
                    <tr>
                        <td class="align-middle">{{ $item->name }}</td>

                        {{-- Edit and Delete buttons --}}
                        <td class="align-middle d-flex align-items-center justify-content-center">
                            <a href="{{ route('bank.edit', $item->id) }}" class="btn-outline-secondary btn-sm text-uppercase py-2">Upraviť</a>
                            <form action="{{ route('bank.destroy', $item->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="border-0 btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>
    </div>
</div>
