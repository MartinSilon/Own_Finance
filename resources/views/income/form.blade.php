{{-- ---- FORM FOR ADDING INCOME ---- --}}
<div class="formulars container rounded px-md-5 px-4 pt-4 py-md-5 payment mt-2 shadow">
    <div class="row justify-content-start">
        <div class="col-md-6">
            <h3 class="text-uppercase mb-4">Pridať príjem:</h3>

            {{-- FORM --}}
            <form action="{{ route('income.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user_id }}">

                <input class="form-control mb-3 date" type="text" name="name" placeholder="Praca" value="{{ old('name') }}" required>
                <input class="form-control mb-3 date" type="text" name="income" placeholder="150" value="{{ old('income') }}" required>

                <button class="btn w-100 mt-3 text-uppercase" type="submit">Odoslať</button>
            </form>
        </div>

        {{-- ---- TABLE OF ALL INCOMES ---- --}}
        <div class="col-md-6 mt-md-3">
            <table class="table table-striped table-hover text-center">

                <thead class="thead-dark">
                <tr class="head-row">
                    <th>Meno</th>
                    <th>Suma</th>
                    <th>Deň</th>
                    <th>Akcie</th>
                </tr>
                </thead>

                <tbody>
                @foreach($income as $item)
                    <tr class="h-100">
                        <td class="align-middle">{{ $item->name }}</td>
                        <td class="date align-middle">{{ $item->income }} €</td>
                        <td class="date align-middle">{{ $item->date }}.</td>

                        {{-- Edit and Delete buttons --}}
                        <td class="align-middle d-flex align-items-center h-100 py-3">
                            <a href="{{ route('income.edit', $item->id) }}" class="btn-outline-secondary btn-sm text-uppercase py-2">Upraviť</a>
                            <form action="{{ route('income.destroy', $item->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="border-0 btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                    </svg>
                                </button>
                            </form>
                            <form action="{{ route('sentPayment') }}" method="post" class="d-inline">
                                @csrf
                                <input type="hidden" name="name" value="Príjem: {{ $item->name }}">
                                <input type="hidden" name="price" value="+{{ $item->income }}">
                                <button type="submit" class="border-0 btn-sm ms-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                        <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73z"/>
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
