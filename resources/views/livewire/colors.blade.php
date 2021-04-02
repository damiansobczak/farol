<div>
    <table>
        <thead>
            <tr>
                <th>Nazwa</th>
                <th>Kolor</th>
                <th>Akcje</th>
            </tr>
            <thead>
            <tbody>
                @foreach ($colors as $color)
                <tr>
                    <td>{{ $color->name }}</td>
                    <td>{{ $color->color }}</td>
                    <td>
                        <button class="" wire:click.debounce.200ms="delete({{ $color->id }})">Usuń</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th>Nazwa</th>
                <th>Kolor</th>
            </tr>
            <thead>
            <tbody>
                <tr>
                    <td>
                        <input type="text" name="name" id="name" placeholder="Niebieski..." wire:model="name">
                    </td>
                    <td>
                        <input type="text" name="color" id="color" placeholder="#ffffff" wire:model="color">
                    </td>
                </tr>
            </tbody>
    </table>

    <button class="" wire:click.debounce.200ms="add">Dodaj</button>


</div>