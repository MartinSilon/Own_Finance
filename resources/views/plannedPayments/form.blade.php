{{-- ---- FORM FOR ADDING EXPENSE  ---- --}}
<div class="formulars container rounded px-md-5 px-4 pt-4 py-md-5 payment mt-2 shadow">
    <div class="row justify-content-start">
        <div class="col-md-6 mb-md-0 mb-2">
            <h3 class="text-uppercase mb-4">Pridať mesačnú platbu:</h3>

            {{-- FORM --}}
            <form action="{{ route('expenses.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                <input class="form-control mb-3 date" type="text" name="name" placeholder="Netflix" value="{{ old('name') }}" required>

                <div class="form-group d-flex gap-2">
                    <div class="w-100">
                        <label>Cena:</label>
                        <input class="form-control" type="text" name="price" placeholder="8.99" value="{{ old('price') }}" required>
                    </div>
                    <div class="w-100">
                        <label>Deň v mesiaci:</label>
                        <input class="form-control " type="number" name="date" value="null" min="0" max="30" placeholder="10">
                    </div>
                </div>


                <button class="btn w-100 mt-3 text-uppercase" type="submit">Odoslať</button>
            </form>
        </div>

        {{-- ---- TABLE OF ALL EXPENSES  ---- --}}
        <div class="col-md-6 mt-3">
            <table class="table table-striped table-hover text-center rounded">

                <thead class="thead-dark">
                <tr class="head-row">
                    <th>Meno</th>
                    <th>Suma</th>
                    <th>Deň</th>
                    <th>Akcie</th>
                </tr>
                </thead>

                <tbody>
                @foreach($expenses as $item)
                    <tr class="h-100">
                        <td class="align-middle">{{ $item->name }}</td>
                        <td class="date align-middle">{{ $item->price }} €</td>
                        <td class="date align-middle">{{ $item->date ? $item->date."." : "-" }}</td>

                        {{-- Edit and Delete buttons --}}
                        <td class="align-middle d-flex align-items-center h-100 py-3">
                            <a href="{{ route('expenses.edit', $item->id) }}" class="btn-outline-secondary btn-sm text-uppercase py-2">Upraviť</a>
                            <form action="{{ route('expenses.destroy', $item->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-sm border-0">
                                    {{-- SVG ikona pre tlačidlo zmazania --}}
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
