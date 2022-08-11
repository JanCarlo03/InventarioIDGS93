 

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cartItems as $items)
            <tr>
                <td>{{ $items->name }}</td>
                <td>
                    <form action="{{ route('actualizar',['id' => $items->id] ) }}">
                  <input name="quantity" type="number" value="{{ $items->quantity }}">
                  <input type="submit" value="save">
                  </form>
                </td>
                <td>
                  <a href="{{ route('destruir',['id' => $items->id]  ) }}">Borrar</a>
                </td>
            </tr>
        </tbody>
        <a href="{{ route('store') }}">Guardar</a>
    </table>
@endforeach
@include('footer')
</body>
</html>